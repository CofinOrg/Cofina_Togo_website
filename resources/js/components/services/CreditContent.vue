<template>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto">
    <div v-for="credit in creditsData" :key="credit.name"
         class="bg-white rounded-2xl shadow-xl overflow-hidden group">
      <div class="h-64 overflow-hidden">
        <img :src="credit.image ?? undefined" :alt="credit.name" class="w-full h-full object-cover transition-transform group-hover:scale-110" />
      </div>
      <div class="p-8">
        <h3 class="text-xl font-bold text-gray-900 mb-4">{{ credit.name }}</h3>
        <p class="text-gray-600 mb-6 text-sm leading-relaxed">
          {{ credit.desc }}
        </p>
        <a @click="goToDetail(credit.id)" class="text-primary font-bold text-sm underline underline-offset-4 decoration-2 cursor-pointer">
          Voir les conditions d'éligibilité →
        </a>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
  import { computed } from 'vue';
  import { allServices } from '@/data/services';
  import { useRouter } from 'vue-router';

  const router = useRouter();

  const creditsData = computed(() =>
    allServices.filter(service => service.category === 'credits')
  );

  const goToDetail = (id: string) => {
    router.push({ name: 'serviceDetail', params: { id: id } });
  };
</script>
