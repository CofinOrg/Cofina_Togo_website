<template>
  <main class="min-h-screen bg-white">
    <section class="relative h-[300px] flex items-center bg-[#333] overflow-hidden">
      <div class="absolute inset-0 opacity-50">
        <img src="../../assets/images/hero_produits.png" class="w-full h-full object-cover" alt="Services" />
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <h1 class="text-white text-3xl font-light italic">
          Services > <span class="font-bold not-italic">{{ currentTabLabel }}</span>
        </h1>
      </div>
    </section>

    <section class="relative z-30 -mt-12 mb-16">
      <div class="container mx-auto px-4 flex justify-center gap-4">
        <button @click="updateUrl('packs')"
          :class="activeComponent === 'packs' ? 'bg-primary text-white' : 'bg-white text-primary border border-gray-200'"
          class="w-48 py-8 rounded-2xl shadow-xl transition-all duration-300 font-bold text-xl text-center">
          Nos packs
        </button>

        <button @click="updateUrl('credits')"
          :class="activeComponent === 'credits' ? 'bg-primary text-white' : 'bg-white text-primary border border-gray-200'"
          class="w-48 py-8 rounded-2xl shadow-xl transition-all duration-300 font-bold text-xl text-center">
          Crédit
        </button>

        <button @click="updateUrl('epargne')"
          :class="activeComponent === 'epargne' ? 'bg-primary text-white' : 'bg-white text-primary border border-gray-200'"
          class="w-48 py-8 rounded-2xl shadow-xl transition-all duration-300 font-bold text-xl text-center">
          Epargne
        </button>
      </div>
    </section>

    <div class="container mx-auto px-6 pb-20">
      <transition name="fade" mode="out-in">
        <component :is="tabs[activeComponent]" />
      </transition>
    </div>

    <div class="h-64 bg-gray-200 mt-20"></div>
  </main>
</template>

<script setup>
import { ref, computed } from 'vue';
import PackContent from '@/components/services/PackContent.vue';
import CreditContent from '@/components/services/CreditContent.vue'
import EpargneContent from '@/components/services/EpargneContent.vue'
import { useRouter, useRoute } from 'vue-router';
import { watch } from 'vue';

const router = useRouter();
const route = useRoute();

// for breadcrum
const currentTabLabel = computed(() => {
  const type = route.query.type;

  switch (type) {
    case 'credits': return 'Crédits';
    case 'epargne': return 'Épargne';
    case 'packs': return 'Packs';
    default: return 'Packs'; // Valeur par défaut
  }
});


// 1. Définition de la Prop
const props = defineProps({
  initialTab: {
    default: 'packs' // Si rien n'est passé, on affiche 'packs'
  }
});

// 2. L'état réactif est initialisé avec la prop
const activeComponent = ref(props.initialTab);

const tabs = {
  packs: PackContent,
  credits: CreditContent,
  epargne: EpargneContent
};

const updateUrl = (type) => {
  // On met à jour l'URL. Le watch détectera le changement et modifiera activeComponent
  router.push({ query: { type: type } });
};

// Ton watch existant est parfait, il assure la cohérence
watch(() => route.query.type, (newType) => {
  if (newType) {
    activeComponent.value = newType;
  } else {
    // Optionnel : si on efface le paramètre type de l'URL, on revient aux packs
    activeComponent.value = props.initialTab;
  }
}, { immediate: true });
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
