<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()
</script>

<template>
  <div class="min-h-screen bg-background flex flex-col items-center justify-center px-6 text-center">

    <div class="text-primary font-bold leading-none select-none" style="font-size: clamp(8rem, 25vw, 18rem);">
      404
    </div>

    <h1 class="text-lightText text-3xl md:text-4xl font-bold mt-4">
      Page introuvable
    </h1>

    <p class="text-secondary text-lg mt-4 max-w-md">
      La page que vous recherchez n'existe pas ou a été déplacée.
    </p>

    <div class="flex flex-col sm:flex-row gap-4 mt-10">
      <button
        @click="router.push('/')"
        class="bg-primary hover:bg-red-700 text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-300 cursor-pointer"
      >
        Retour à l'accueil
      </button>

      <button
        @click="router.back()"
        class="border border-secondary text-secondary hover:border-accent hover:text-accent font-semibold px-8 py-3 rounded-lg transition-colors duration-300 cursor-pointer"
      >
        Page précédente
      </button>
    </div>

  </div>
</template>
