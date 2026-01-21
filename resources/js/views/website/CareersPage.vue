<script setup lang="ts">
import { ref } from 'vue';
import { PcCaseIcon, SendHorizonalIcon } from 'lucide-vue-next';
import CandidatureModal from '@/components/career/CandidatureModal.vue';
const activeTab = ref('offers');
const isModalOpen = ref(false);

const jobs = ref([
  { id: 1, title: 'Chargé d\'affaire', description: 'Le Groupe COFINA est une institution panafricaine spécialisée dans la mésofinance...', date: '02 Août 2025' },
  { id: 2, title: 'Chargé d\'affaire', description: 'Le Groupe COFINA est une institution panafricaine spécialisée dans la mésofinance...', date: '02 Août 2025' },
  { id: 3, title: 'Chargé d\'affaire', description: 'Le Groupe COFINA est une institution panafricaine spécialisée dans la mésofinance...', date: '02 Août 2025' },
  // ... copier pour les 9 cartes de la maquette
]);

</script>


<template>
  <main class="min-h-screen bg-white">
     <section class="relative h-[500px] bg-[#333] flex items-center">
      <div class="absolute inset-0">
        <img src="../../assets/images/career/employment-opportunity-hiring-jobs-icon.jpg" alt="Produits COFINA" class="w-full h-full object-cover" />
      </div>
      <div class="container mx-auto px-6 relative z-10">

      </div>
    </section>

    <section class="relative z-30 -mt-16 mb-20">
      <div class="container mx-auto px-4 flex justify-center gap-6">
        <button
          @click="activeTab = 'offers'"
          :class="activeTab === 'offers' ? 'bg-[#7a7a7a] text-white' : 'bg-white text-gray-500'"
          class="w-64 py-8 rounded-2xl shadow-2xl transition-all flex flex-col items-center gap-2 group"
        >
          <span class="text-3xl"><PcCaseIcon/></span>
          <span class="font-bold text-lg uppercase">Nos offres</span>
        </button>

        <button
          @click="isModalOpen = true"
          class="w-64 py-8 rounded-2xl bg-white text-gray-500 shadow-2xl hover:bg-gray-50 transition-all flex flex-col items-center gap-2"
        >
          <span class="text-3xl text-primary"><SendHorizonalIcon/> </span>
          <span class="font-bold text-lg uppercase">Candidature spontanée</span>
        </button>
      </div>
    </section>

    <section class="container mx-auto px-6 pb-20">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div v-for="job in jobs" :key="job.id"
             class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden flex flex-col">
          <div class="p-8">
            <h3 class="text-xl font-black text-gray-700 uppercase mb-4">{{ job.title }}</h3>
            <p class="text-gray-500 text-sm leading-relaxed mb-6">
              {{ job.description }}
            </p>
            <a href="#" class="text-primary text-sm font-bold underline underline-offset-4">Lire la suite →</a>
          </div>
          <div class="mt-auto bg-gray-50 border-t px-8 py-3 text-xs text-gray-400 font-bold">
            {{ job.date }}
          </div>
        </div>
      </div>
    </section>

    <Teleport to="body">
      <CandidatureModal :is-open="isModalOpen" @close="isModalOpen = false" />
    </Teleport>
  </main>
</template>

