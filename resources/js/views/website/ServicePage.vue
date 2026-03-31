<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import api from '../../utils/api';

const router = useRouter();

const services = ref([]);
const loading = ref(false);
const selectedService = ref(null);
const products = ref([]);
const loadingProducts = ref(false);

const fetchServices = async () => {
  loading.value = true;
  try {
    const response = await api.get('/services');
    const data = response.data.data || response.data;

    const filteredData = data.filter(service => service.type === 'pack');
    services.value = filteredData;


    // Sélectionner le premier service par défaut
    if (filteredData.length > 0) {
      selectService(filteredData[0]);
    }
  } catch (error) {
    console.error('Erreur lors du chargement des services', error);
  } finally {
    loading.value = false;
  }
};

const fetchProducts = async (serviceId) => {
  loadingProducts.value = true;
  products.value = [];
  try {
    const response = await api.get(`/service_products?service_id=${serviceId}`);
    const data = response.data.data || response.data;
    products.value = data;
  } catch (error) {
    console.error('Erreur lors du chargement des produits', error);
  } finally {
    loadingProducts.value = false;
  }
};

const selectService = (service) => {
  selectedService.value = service;
  fetchProducts(service.id);
};

const goToSubscribe = (productId) => {
  router.push({ name: 'pack-form', params: { productId } });
};

onMounted(() => {
  fetchServices();
});
</script>

<template>
  <main class="min-h-screen bg-white">

    <!-- Hero -->
    <section class="relative h-80 flex items-end bg-[#1E1E1E] overflow-hidden">
      <div class="absolute inset-0">
        <img src="../../assets/images/hero_produits.png" alt="Produits COFINA"
             class="w-full h-full object-cover opacity-30" />
        <div class="absolute inset-0 bg-linear-to-r from-[#1E1E1E]/90 to-transparent"></div>
      </div>
      <div class="container mx-auto px-6 relative z-10 pb-16">
        <h1 class="text-4xl md:text-5xl font-black text-white leading-tight">
          Nos produits <br/><span class="text-primary">&amp; services</span>
        </h1>
      </div>
    </section>

    <!-- Boutons de navigation des services (style image) -->
    <section class="relative z-30 -mt-16 mb-20">
      <div class="container mx-auto px-4 flex justify-center flex-wrap gap-6">

        <div v-if="loading" class="flex justify-center py-10 w-full">
          <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-primary"></div>
        </div>

        <button
          v-for="service in services"
          :key="service.id"
          @click="selectService(service)"
          :class="selectedService?.id === service.id
            ? 'bg-primary text-white'
            : 'bg-white text-gray-500 hover:bg-gray-50'"
          class="w-52 py-8 rounded-2xl shadow-2xl transition-all flex flex-col items-center gap-2"
        >
          <!-- Icône générique pack -->
          <svg class="w-7 h-7" :class="selectedService?.id === service.id ? 'text-white' : 'text-primary'"
               fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
          </svg>
          <span class="font-bold text-sm uppercase text-center px-2">{{ service.name }}</span>
        </button>

      </div>
    </section>

    <!-- Produits du service sélectionné -->
    <section class="container mx-auto px-6 pb-20">

      <!-- Loading produits -->
      <div v-if="loadingProducts" class="flex justify-center py-20">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary"></div>
      </div>

      <!-- Titre section -->
      <div v-else-if="products.length > 0">
        <h2 class="text-2xl font-black text-gray-800 uppercase mb-8 text-center">
          {{ selectedService?.name }}
        </h2>

        <!-- Grille produits -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="product in products" :key="product.id"
               class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

            <div class="h-1.5 bg-primary w-full"></div>

            <div class="p-8 flex flex-col h-full">
              <h3 class="text-xl font-black text-gray-700 uppercase mb-4">{{ product.name }}</h3>

              <div v-if="product.advantage" class="mb-4">
                <p class="text-xs font-semibold text-gray-400 uppercase mb-1">Avantages</p>
                <p class="text-gray-600 text-sm leading-relaxed">{{ product.advantage }}</p>
              </div>

              <div v-if="product.deposit_at_opening" class="mb-6">
                <p class="text-xs font-semibold text-gray-400 uppercase mb-1">Dépôt à l'ouverture</p>
                <p class="text-primary font-black text-xl">
                  {{ Number(product.deposit_at_opening).toLocaleString('fr-FR') }} FCFA
                </p>
              </div>

              <button
                @click="goToSubscribe(product.id)"
                class="mt-auto w-full text-center border border-primary text-primary py-3 rounded-lg font-bold hover:bg-primary hover:text-white transition-colors uppercase text-sm cursor-pointer"
              >
                Pré-souscrire
              </button>
            </div>

          </div>
        </div>
      </div>

      <!-- Aucun produit -->
      <div v-else-if="selectedService && !loadingProducts" class="text-center py-20">
        <p class="text-gray-500 text-lg">Aucun produit disponible pour ce service.</p>
      </div>

    </section>
  </main>
</template>

<style scoped>
.line-clamp-3 {
  display: -webkit-box;
  line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
