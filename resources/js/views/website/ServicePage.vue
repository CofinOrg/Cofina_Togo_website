<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import api from '../../utils/api';

const router = useRouter();

// Services chargés depuis l'API
const services = ref([]);
const loading = ref(false);

const fetchServices = async () => {
  loading.value = true;
  try {
    const response = await api.get('/services');
    const data = response.data.data || response.data;
    services.value = data;
  } catch (error) {
    console.error('Erreur lors du chargement des services', error);
  } finally {
    loading.value = false;
  }
};

// Naviguer vers la page des produits du service
const openService = (service) => {
  router.push({ name: 'serviceProducts', params: { id: service.id }, query: { name: service.name } });
};

onMounted(() => {
  fetchServices();
});
</script>

<template>
  <main class="min-h-screen bg-white">
    <section class="relative h-75 flex items-center bg-[#333] overflow-hidden">
      <div class="absolute inset-0 opacity-40">
        <img src="../../assets/images/hero_produits.png" alt="Produits COFINA" class="w-full h-full object-cover" />
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold text-white tracking-tight">Nos produits & services</h1>
      </div>
    </section>

    <section class="py-20 bg-gray-50">
      <div class="container mx-auto px-6">
        <!-- Loading -->
        <div v-if="loading" class="flex justify-center -mt-32 relative z-20">
          <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary"></div>
        </div>

        <!-- Services grid -->
        <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-8 -mt-32 relative z-20">
          <div v-for="service in services" :key="service.id"
               class="bg-white rounded-lg overflow-hidden shadow-2xl hover:shadow-xl transition-shadow duration-300 flex flex-col">
     <!--        <div class="h-64 overflow-hidden bg-gray-200">
              <img v-if="service.image_path" :src="service.image_path" :alt="service.name" class="w-full h-full object-cover" />
              <div v-else class="w-full h-full flex items-center justify-center text-gray-400">
                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </div>
            </div> -->
            <div class="px-5 pt-2 pb-5 flex flex-col items-center text-center grow">
              <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ service.name }}</h3>
              <p class="text-gray-600 mb-4 leading-relaxed">{{ service.description }}</p>
              <button @click="openService(service)"
                      class="mt-auto bg-[#D10000] hover:bg-red-700 text-white font-bold py-3 px-8 rounded transition-colors duration-200 uppercase text-sm tracking-widest">
                Cliquez pour découvrir
              </button>
            </div>
          </div>
        </div>

        <!-- Message si aucun service -->
        <div v-if="!loading && services.length === 0" class="text-center py-12 -mt-20 relative z-20">
          <p class="text-gray-500 text-lg">Aucun service disponible pour le moment.</p>
        </div>
      </div>
    </section>
  </main>
</template>
