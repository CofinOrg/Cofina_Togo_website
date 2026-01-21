

<template>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto">
    <div v-for="epargne in epargnesData" :key="epargne.name"
         class="bg-white rounded-2xl shadow-xl overflow-hidden group">
      <div class="h-64 overflow-hidden">
                <img :src="epargne.image ?? undefined" :alt="epargne.name" class="w-full h-full object-cover transition-transform group-hover:scale-110" />
      </div>
      <div class="p-8">
        <h3 class="text-xl font-bold text-gray-900 mb-4">{{ epargne.name }}</h3>
        <p class="text-gray-600 mb-6 text-sm leading-relaxed">
          {{ epargne.desc }}
        </p>
        <a @click="goToDetail(epargne.id)" class="text-primary font-bold text-sm underline underline-offset-4 decoration-2">
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


  const epargnesData = computed(() =>
    allServices.filter(epargne => epargne.category === 'epargnes')
  );

    const router = useRouter();

  const goToDetail = (id: string) => {
    router.push({ name: 'serviceDetail', params: { id: id } });
  };


</script>


