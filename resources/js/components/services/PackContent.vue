<script setup>
import { computed } from 'vue';
import { goToDetail} from '@/utils/functions';
import { allServices } from '@/data/services';
import { useRouter } from 'vue-router';

const router = useRouter();

// On filtre dynamiquement pour n'afficher que les packs
const packsData = computed(() =>
  allServices.filter(service => service.category === 'packs')
);


</script>

<template>
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <div v-for="pack in packsData" :key="pack.id"
         class="relative p-8 border rounded-xl flex flex-col items-center text-center transition-all hover:border-primary"
         :class="pack.special ? 'bg-[#FFF4E0] border-orange-200' : 'bg-white border-gray-200'">

      <div v-if="pack.popular" class="absolute -top-4 left-1/2 -translate-x-1/2 bg-primary text-white px-6 py-1 rounded-full text-xs font-bold uppercase">
        Populaire
      </div>

      <h3 class="text-xl font-black text-gray-800 mb-6 uppercase">{{ pack.name }}</h3>
      <p class="text-sm text-gray-500 mb-8 leading-relaxed flex-grow italic">
        {{ pack.desc }}
      </p>

      <button @click="goToDetail(pack.id, router)"
              class="w-full border border-primary text-primary py-2 rounded font-bold hover:bg-primary hover:text-white transition-colors uppercase text-xs">
        Souscrire
      </button>
    </div>
  </div>
</template>
