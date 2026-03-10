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
  <main class="min-h-screen bg-gray-50">

    <!-- Hero -->
    <section class="relative h-80 flex items-end bg-[#1E1E1E] overflow-hidden">
      <div class="absolute inset-0">
        <img src="../../assets/images/hero_produits.png" alt="Produits COFINA"
             class="w-full h-full object-cover opacity-30" />
        <div class="absolute inset-0 bg-linear-to-r from-[#1E1E1E]/90 to-transparent"></div>
      </div>
      <div class="container mx-auto px-6 relative z-10 pb-16">
        <!-- <p class="text-accent text-sm font-bold uppercase tracking-widest mb-2">COFINA Sénégal</p> -->
        <h1 class="text-4xl md:text-5xl font-black text-white leading-tight">
          Nos produits <br/><span class="text-primary">&amp; services</span>
        </h1>
      </div>
      <!-- Vague en bas -->
     <!--  <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 60" preserveAspectRatio="none" class="w-full h-16 fill-gray-50">
          <path d="M0,60 C360,0 1080,60 1440,20 L1440,60 Z"/>
        </svg>
      </div> -->
    </section>

    <!-- Contenu -->
    <section class="py-16">
      <div class="container mx-auto px-6">

        <!-- Intro -->
        <div class="text-center mb-12">
          <p class="text-secondary text-lg max-w-2xl mx-auto">
            Découvrez l'ensemble de nos solutions financières pensées pour accompagner
            votre croissance personnelle et professionnelle.
          </p>
        </div>

        <!-- Loading -->
        <div v-if="loading" class="flex justify-center py-20">
          <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-primary"></div>
        </div>

        <!-- Grille des services -->
        <div v-else-if="services.length > 0"
             class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="(service, index) in services" :key="service.id"
               class="group bg-white rounded-2xl overflow-hidden shadow-md
                      hover:shadow-2xl hover:-translate-y-1 transition-all duration-300
                      flex flex-col">
            <!-- Barre colorée -->
            <div class="h-1.5 bg-primary w-full"></div>

            <div class="p-4 flex flex-col grow">
              <!-- Badge numéroté -->
              <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center mb-6">
                <span class="text-primary font-black text-lg">
                  {{ String(index + 1).padStart(2, '0') }}
                </span>
              </div>

              <h3 class="text-xl font-black text-gray-900 uppercase mb-3
                         group-hover:text-primary transition-colors">
                {{ service.name }}
              </h3>
              <p class="text-secondary text-sm leading-relaxed mb-8 grow">
                {{ service.description }}
              </p>

              <!-- Lien flèche -->
              <button @click="openService(service)"
                      class="flex items-center gap-2 text-primary font-bold text-sm
                             uppercase tracking-wider hover:gap-4 transition-all duration-200 cursor-pointer">
                Découvrir
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Aucun service -->
        <div v-else class="text-center py-20">
          <p class="text-secondary text-lg">Aucun service disponible pour le moment.</p>
        </div>

      </div>
    </section>
  </main>
</template>
