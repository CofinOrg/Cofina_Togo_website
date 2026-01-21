<script setup>
import { ref, watch, onMounted } from 'vue';
import image_pack from '../../assets/images/accueil/findone.jpg';
import { useRouter, useRoute } from 'vue-router';

const router = useRouter();
const route = useRoute();

// Import de ton composant de vue détaillée (celui avec les onglets arrondis)
import ServiceTypesPage from './ServiceTypesPage.vue';

// État pour savoir si on affiche la liste ou le détail
const currentView = ref('list');
const activeServiceId = ref('packs');

const services = [
  {
    id: 'packs',
    title: 'Packs',
    image: image_pack,
    description: 'Les packs de COFINA sont de services et avantages financiers qui vous permettent de développer vos actifs en toute confiance',
  },
  {
    id: 'credits',
    title: 'Crédits',
    image: image_pack,
    description: "Nous vous proposons des crédits avec des taux d'intérêts très compétitifs",
  },
  {
    id: 'epargne',
    title: 'Epargne',
    image: image_pack,
    description: "Nos plans d'épargne vous permettent de faire fructifier votre argent en toute tranquillité",
  }
];

// Fonction déclenchée au clic sur "Cliquez pour découvrir"
const openService = (serviceId) => {
  activeServiceId.value = String(serviceId);
  currentView.value = 'detail';
  window.scrollTo({ top: 0, behavior: 'smooth' });
  router.push({ query: { type: serviceId } });
};

// Détecte si on arrive avec un paramètre ?type= dans l'URL
watch(() => route.query.type, (newType) => {
  if (newType && ['packs', 'credits', 'epargne'].includes(newType)) {
    // On a un type valide dans l'URL → afficher le détail
    activeServiceId.value = String(newType);
    currentView.value = 'detail';
  } else {
    // Pas de type ou type invalide → afficher la liste
    currentView.value = 'list';
  }
}, { immediate: true }); // immediate: true pour exécuter au montage

</script>

<template>
  <div v-if="currentView === 'detail'">
    <ServiceTypesPage :initialTab="activeServiceId" />
  </div>

  <main v-else class="min-h-screen bg-white">
    <section class="relative h-[300px] flex items-center bg-[#333] overflow-hidden">
      <div class="absolute inset-0 opacity-40">
        <img src="../../assets/images/hero_produits.png" alt="Produits COFINA" class="w-full h-full object-cover" />
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold text-white tracking-tight">Nos produits & services</h1>
      </div>
    </section>

    <section class="py-20 bg-gray-50">
      <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 -mt-32 relative z-20">
          <div v-for="service in services" :key="service.id"
               class="bg-white rounded-lg overflow-hidden shadow-2xl hover:shadow-xl transition-shadow duration-300 flex flex-col">
            <div class="h-64 overflow-hidden">
              <img :src="service.image" :alt="service.title" class="w-full h-full object-cover" />
            </div>
            <div class="px-5 pt-2 pb-5 flex flex-col items-center text-center flex-grow">
              <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ service.title }}</h3>
              <p class="text-gray-600 mb-4 leading-relaxed">{{ service.description }}</p>
              <button @click="openService(service.id)"
                      class="mt-auto bg-[#D10000] hover:bg-red-700 text-white font-bold py-3 px-8 rounded transition-colors duration-200 uppercase text-sm tracking-widest">
                Cliquez pour découvrir
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>
