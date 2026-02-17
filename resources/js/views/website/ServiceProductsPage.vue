<script setup>
import { ref, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import api from '../../utils/api';

const route = useRoute();
const router = useRouter();

const serviceId = route.params.id;
const serviceName = ref(route.query.name || '');
const products = ref([]);
const loading = ref(false);

const fetchProducts = async () => {
  loading.value = true;
  try {
    const response = await api.get(`/service_products?service_id=${serviceId}`);
    const data = response.data.data || response.data;
    products.value = data;
  } catch (error) {
    console.error('Erreur lors du chargement des produits', error);
  } finally {
    loading.value = false;
  }
};

const goBack = () => {
  router.push({ name: 'services' });
};

onMounted(() => {
  fetchProducts();
});
</script>

<template>
  <main class="min-h-screen bg-white">
    <!-- Hero -->
    <section class="relative h-75 flex items-center bg-[#333] overflow-hidden">
      <div class="absolute inset-0 opacity-40">
        <img src="../../assets/images/hero_produits.png" alt="Produits COFINA" class="w-full h-full object-cover" />
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <h1 class="text-white text-3xl font-light italic">
          <router-link :to="{ name: 'services' }" class="hover:underline">Services</router-link>
          > <span class="font-bold not-italic">{{ serviceName }}</span>
        </h1>
      </div>
    </section>

    <!-- Bouton retour -->
    <section class="relative z-30 -mt-6 mb-8">
      <div class="container mx-auto px-6">
        <button @click="goBack"
                class="bg-white shadow-lg rounded-full px-6 py-3 text-sm font-bold text-gray-700 hover:text-primary transition-colors">
          &larr; Retour aux services
        </button>
      </div>
    </section>

    <!-- Produits -->
    <section class="pb-20">
      <div class="container mx-auto px-6">
        <!-- Loading -->
        <div v-if="loading" class="flex justify-center py-20">
          <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary"></div>
        </div>

        <!-- Grille des produits -->
        <div v-else-if="products.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="product in products" :key="product.id"
               class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow duration-300">
            <div class="p-6 flex flex-col h-full">
              <h3 class="text-xl font-bold text-gray-900 mb-3">{{ product.name }}</h3>

              <div v-if="product.advantage" class="mb-4">
                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Avantages</p>
                <p class="text-gray-600 text-sm leading-relaxed">{{ product.advantage }}</p>
              </div>

              <div v-if="product.deposit_at_opening" class="mb-4">
                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Dépôt à l'ouverture</p>
                <p class="text-primary font-bold text-lg">{{ Number(product.deposit_at_opening).toLocaleString('fr-FR') }} FCFA</p>
              </div>

              <div v-if="product.credit_access" class="mb-4">
                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Accès au crédit</p>
                <p class="text-gray-600 text-sm">{{ product.credit_access }}</p>
              </div>

              <router-link
                :to="{ name: 'pack-form', params: { productId: product.id } }"
                class="mt-auto block w-full text-center border border-primary text-primary py-3 rounded-lg font-bold hover:bg-primary hover:text-white transition-colors uppercase text-sm">
                Souscrire
              </router-link>
            </div>
          </div>
        </div>

        <!-- Aucun produit -->
        <div v-else class="text-center py-20">
          <p class="text-gray-500 text-lg">Aucun produit disponible pour ce service.</p>
        </div>
      </div>
    </section>
  </main>
</template>
