<template>
  <div v-if="isOpen" class="fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="$emit('close')"></div>

    <div class="relative bg-white w-full max-w-2xl rounded-3xl shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
      <div class="p-8 md:p-12">
        <div class="flex justify-between items-center mb-8">
          <h2 class="text-3xl font-black text-gray-800 uppercase tracking-tight">Candidature <span class="text-">Spontanée</span></h2>
          <button @click="$emit('close')" class="text-gray-400 hover:text-black text-2xl">✕</button>
        </div>

        <form @submit.prevent="submitForm" class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <input type="text" placeholder="Nom complet" class="w-full border-b-2 border-gray-200 py-3 focus:border-primary outline-none transition-colors" required>
            <input type="email" placeholder="Email" class="w-full border-b-2 border-gray-200 py-3 focus:border-primary outline-none transition-colors" required>
          </div>

          <input type="text" placeholder="Poste souhaité" class="w-full border-b-2 border-gray-200 py-3 focus:border-primary outline-none transition-colors">

          <textarea placeholder="Votre message de motivation..." rows="4" class="w-full border-b-2 border-gray-200 py-3 focus:border-primary outline-none transition-colors resize-none"></textarea>

          <div class="flex items-center justify-between gap-4 p-4 border-2 border-dashed border-gray-200 rounded-xl hover:border-primary cursor-pointer transition-all">
            <span class="text-gray-500 font-bold uppercase text-xs">Télécharger votre CV (PDF)</span>
            <input type="file" class="hidden" id="cv-upload">
            <label for="cv-upload" class="bg-gray-100 px-4 py-2 rounded font-bold text-xs cursor-pointer">Choisir</label>
          </div>

          <button type="submit" class="w-full bg-primary text-white py-4 rounded-full font-bold text-xl hover:bg-red-700 transition-all shadow-lg uppercase">
            Envoyer ma candidature
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{ isOpen: boolean }>();
defineEmits(['close']);

const submitForm = () => {
  alert('Candidature envoyée avec succès !');
};
</script>
