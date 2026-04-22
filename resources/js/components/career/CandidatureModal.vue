<template>
  <div v-if="isOpen" class="fixed inset-0 z-100 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="$emit('close')"></div>

    <div class="relative bg-white w-full max-w-2xl rounded-3xl shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
      <div class="p-8 md:p-12">
        <div class="flex justify-between items-center mb-8">
          <h2 class="text-3xl font-black text-gray-800 uppercase tracking-tight">Candidature <span class="text-primary">Spontanée</span></h2>
          <button @click="$emit('close')" class="text-gray-400 hover:text-black text-2xl">&times;</button>
        </div>

        <form @submit.prevent="submitForm" class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <input
              v-model="formData.name"
              type="text"
              placeholder="Nom complet *"
              class="w-full border-b-2 border-gray-200 py-3 focus:border-primary outline-none transition-colors"
              required
            >
            <input
              v-model="formData.email"
              type="email"
              placeholder="Email *"
              class="w-full border-b-2 border-gray-200 py-3 focus:border-primary outline-none transition-colors"
              required
            >
          </div>

          <input
            v-model="formData.desired_position"
            type="text"
            placeholder="Poste souhaité *"
            class="w-full border-b-2 border-gray-200 py-3 focus:border-primary outline-none transition-colors"
            required
          >

          <textarea
            v-model="formData.motivation_message"
            placeholder="Votre message de motivation... *"
            rows="4"
            class="w-full border-b-2 border-gray-200 py-3 focus:border-primary outline-none transition-colors resize-none"
            required
          ></textarea>

          <div
            class="flex items-center justify-between gap-4 p-4 border-2 border-dashed rounded-xl cursor-pointer transition-all"
            :class="cvFile ? 'border-green-500 bg-green-50' : 'border-gray-200 hover:border-primary'"
          >
            <div class="flex-1">
              <span v-if="!cvFile" class="text-gray-500 font-bold uppercase text-xs">Importer votre CV (PDF uniquement) *</span>
              <span v-else class="text-green-600 font-bold text-xs flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ cvFile.name }}
              </span>
            </div>
            <input
              type="file"
              class="hidden"
              id="cv-upload"
              accept=".pdf"
              @change="onFileChange"
              required
            >
            <label for="cv-upload" class="bg-gray-100 px-4 py-2 rounded font-bold text-xs cursor-pointer hover:bg-gray-200 transition-colors">
              {{ cvFile ? 'Changer' : 'Choisir' }}
            </label>
          </div>

          <!-- Message de succès -->
          <div v-if="submitSuccess" class="p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            <p class="font-semibold">Votre candidature a été envoyée avec succès !</p>
            <p class="text-sm mt-1">Nous vous contacterons dans les plus brefs délais.</p>
          </div>

          <!-- Message d'erreur -->
          <div v-if="submitError" class="p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            <p class="font-semibold">Une erreur est survenue</p>
            <p class="text-sm mt-1">{{ submitError }}</p>
          </div>

          <button
            type="submit"
            :disabled="isSubmitting"
            class="w-full bg-primary text-white py-4 rounded-full font-bold text-xl hover:bg-red-700 transition-all shadow-lg uppercase disabled:bg-gray-400 disabled:cursor-not-allowed"
          >
            <span v-if="isSubmitting">Envoi en cours...</span>
            <span v-else>Envoyer ma candidature</span>
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, watch } from 'vue';
import api from '../../utils/api';

const props = defineProps<{ isOpen: boolean }>();
const emit = defineEmits(['close']);

// Données du formulaire
const formData = ref({
  name: '',
  email: '',
  desired_position: '',
  motivation_message: '',
  source: 'spontaneous'
});

const cvFile = ref<File | null>(null);

// États
const isSubmitting = ref(false);
const submitSuccess = ref(false);
const submitError = ref('');

// Gestion du fichier CV
const onFileChange = (event: Event) => {
  const target = event.target as HTMLInputElement;
  cvFile.value = target.files?.[0] || null;
};

// Réinitialiser le formulaire
const resetForm = () => {
  formData.value = {
    name: '',
    email: '',
    desired_position: '',
    motivation_message: '',
    source: 'spontaneous'
  };
  cvFile.value = null;
  submitSuccess.value = false;
  submitError.value = '';

  // Réinitialiser l'input file
  const fileInput = document.getElementById('cv-upload') as HTMLInputElement;
  if (fileInput) fileInput.value = '';
};

// Soumission du formulaire
const submitForm = async () => {
  if (!cvFile.value) {
    submitError.value = 'Veuillez importer votre CV';
    return;
  }

  isSubmitting.value = true;
  submitSuccess.value = false;
  submitError.value = '';

  try {
    const payload = new FormData();
    payload.append('name', formData.value.name);
    payload.append('email', formData.value.email);
    payload.append('desired_position', formData.value.desired_position);
    payload.append('motivation_message', formData.value.motivation_message);
    payload.append('source', formData.value.source);
    payload.append('cv_path', cvFile.value);

    console.log("🚀 Envoi de la candidature spontanée...");
    const response = await api.post('/cvs', payload);

    console.log("✅ Status:", response.status);
    console.log("✅ Data:", response.data);

    submitSuccess.value = true;

    // Fermer le modal après 2 secondes
    setTimeout(() => {
      resetForm();
      emit('close');
    }, 2000);

  } catch (error: any) {
    console.error('❌ Erreur lors de l\'envoi:', error);
    console.error('Status:', error.response?.status);
    console.error('Code erreur:', error.code);
    console.error('Data:', JSON.stringify(error.response?.data, null, 2));

    // Gérer les différents types d'erreurs
    if (error.code === 'ECONNABORTED' || error.message?.includes('timeout')) {
      submitError.value = 'Le serveur met trop de temps à répondre (scoring en cours). Veuillez réessayer dans quelques instants. Votre candidature est en cours de traitement.';
    } else if (error.code === 'ERR_NETWORK' || error.message?.includes('Network')) {
      submitError.value = 'Erreur de connexion. Veuillez vérifier votre connexion internet.';
    } else if (error.response?.data?.errors) {
      const errors = error.response.data.errors;
      submitError.value = Object.values(errors).flat().join(', ');
    } else if (error.response?.data?.message) {
      submitError.value = error.response.data.message;
    } else {
      submitError.value = 'Une erreur est survenue. Veuillez réessayer.';
    }
  } finally {
    isSubmitting.value = false;
  }
};

// Réinitialiser quand le modal se ferme
watch(() => props.isOpen, (newVal) => {
  if (!newVal) {
    resetForm();
  }
});
</script>
