<script setup lang="ts">
import { useRoute, useRouter } from 'vue-router';
import { computed } from 'vue';
import { allServices } from '@/data/services';

const route = useRoute();
const router = useRouter();
// On récupère l'ID depuis l'URL (ex: /services/detail/pack-woezon)
const serviceId = computed(() => route.params.id as string);
const data = computed(() =>
  allServices.filter(service => service.id === serviceId.value)[0]
);

console.log(data.value)
// Fonction pour changer de catégorie via les gros boutons blancs/rouges
const changeCategory = (cat: string) => {
  router.push({ path: '/services', query: { type: cat } });
};
</script>

<template>
  <main v-if="data" class="min-h-screen">
    <section class="relative h-75 bg-[#333] flex items-center">
      <div class="absolute inset-0 opacity-40">
        <img src="../../assets/images/hero_produits.png" alt="Produits COFINA" class="w-full h-full object-cover" />
      </div>
      <div class="container mx-auto px-6 relative z-10">

        <h1 class="text-white text-3xl font-light italic">
          Services > {{ data.category }} > <span class="font-bold not-italic">{{ data.name }}</span>
        </h1>
      </div>
    </section>

    <section class="relative z-30 -mt-12 mb-16">
      <div class="container mx-auto px-4 flex justify-center gap-4">
        <button @click="changeCategory('packs')"
          :class="data.category === 'packs' ? 'bg-primary text-white' : 'bg-white text-primary border border-gray-200'"
          class="w-48 py-8 rounded-2xl shadow-xl transition-all duration-300 font-bold text-xl text-center">
          Nos packs
        </button>

        <button @click="changeCategory('credits')"
          :class="data.category === 'credits' ? 'bg-primary text-white' : 'bg-white text-primary border border-gray-200'"
          class="w-48 py-8 rounded-2xl shadow-xl transition-all duration-300 font-bold text-xl text-center">
          Crédit
        </button>

        <button @click="changeCategory('epargne')"
          :class="data.category === 'epargne' ? 'bg-primary text-white' : 'bg-white text-primary border border-gray-200'"
          class="w-48 py-8 rounded-2xl shadow-xl transition-all duration-300 font-bold text-xl text-center">
          Epargne
        </button>
      </div>
    </section>


    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-start pb-20">
      <img :src="data.image ?? '/assets/images/accueil/finedone.jpg'"
        class="rounded-xl shadow-lg w-full object-cover h-100" />

      <div class="space-y-10">
        <div>
          <h3 class="text-primary font-bold underline mb-4 uppercase">Avantages</h3>
          <ul class="space-y-3">
            <li v-for="item in data.avantages" :key="item" class="flex items-center gap-3 text-gray-700">
              <span class="text-red-600 font-bold">✓</span> {{ item }}
            </li>
          </ul>
        </div>

        <div>
          <h3 class="text-primary font-bold underline mb-4 uppercase">Documents à fournir</h3>
          <ul class="space-y-3">
            <li v-for="doc in data.documents" :key="doc" class="flex items-center gap-3 text-gray-700">
              <span class="text-red-600 font-bold">✓</span> {{ doc }}
            </li>
          </ul>
        </div>

        <button
          class="bg-primary text-white w-full py-4 rounded-full font-bold text-xl hover:bg-red-700 transition-all uppercase shadow-lg">
          Pré-souscrire
        </button>
      </div>
    </div>
  </main>
</template>

<style scoped>
/* .btn-active { @apply bg-primary text-white w-48 py-8 rounded-2xl shadow-xl font-bold text-xl; }
.btn-inactive { @apply bg-white text-primary border border-gray-100 w-48 py-8 rounded-2xl shadow-xl font-bold text-xl; } */
</style>
