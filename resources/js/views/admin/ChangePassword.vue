<template>
  <div class="min-h-screen bg-linear-to-br from-gray-50 to-gray-100 py-12 px-4">
    <div class="max-w-2xl mx-auto">

      <!-- En-tête -->
      <div class="mb-8 flex items-center justify-between">
        <div>
          <h1 class="text-4xl font-bold text-gray-900 mb-2">Changement de mot de passe</h1>
          <p class="text-gray-600">Pour des raisons de sécurité, vous devez définir un nouveau mot de passe avant de continuer.</p>
        </div>
      </div>

      <!-- Formulaire -->
      <div class="bg-white rounded-2xl shadow-xl p-8 space-y-8">

        <div>
          <h2 class="text-xl font-bold text-gray-900">Nouveau mot de passe</h2>
          <p class="text-gray-600 mt-1">Renseignez votre mot de passe actuel et choisissez un nouveau mot de passe</p>
        </div>

        <!-- Messages d'erreur -->
        <div v-if="formErrors.length > 0" class="bg-red-50 border border-red-200 rounded-xl p-4">
          <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
            <li v-for="(error, idx) in formErrors" :key="idx">{{ error }}</li>
          </ul>
        </div>

        <!-- Message succès -->
        <div v-if="successMessage" class="bg-green-50 border border-green-200 rounded-xl p-4 flex items-center gap-3">
          <svg class="w-5 h-5 text-green-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
          <p class="text-sm font-medium text-green-700">{{ successMessage }}</p>
        </div>

        <!-- Mot de passe actuel -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">
            Mot de passe actuel
          </label>
          <div class="relative">
            <input
              v-model="form.current_password"
              :type="showCurrent ? 'text' : 'password'"
              :disabled="isLoading"
              class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg pr-12"
              placeholder="Votre mot de passe actuel"
            />
            <button
              type="button"
              @click="showCurrent = !showCurrent"
              class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600"
            >
              <svg v-if="!showCurrent" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              <svg v-else class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Nouveau MDP et Confirmation -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <!-- Nouveau mot de passe -->
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">
              Nouveau mot de passe
            </label>
            <div class="relative">
              <input
                v-model="form.new_password"
                :type="showNew ? 'text' : 'password'"
                :disabled="isLoading"
                class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg pr-12"
                placeholder="Minimum 8 caractères"
              />
              <button
                type="button"
                @click="showNew = !showNew"
                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600"
              >
                <svg v-if="!showNew" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <svg v-else class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
              </button>
            </div>
            <!-- Indicateur de force -->
            <div v-if="form.new_password" class="mt-2">
              <div class="flex gap-1 mb-1">
                <div
                  v-for="i in 4"
                  :key="i"
                  class="h-1 flex-1 rounded-full transition-all duration-300"
                  :class="passwordStrength >= i ? strengthColor : 'bg-gray-200'"
                />
              </div>
              <p class="text-xs" :class="strengthTextColor">{{ strengthLabel }}</p>
            </div>
          </div>

          <!-- Confirmation -->
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">
              Confirmer le nouveau mot de passe
            </label>
            <div class="relative">
              <input
                v-model="form.new_password_confirmation"
                :type="showConfirm ? 'text' : 'password'"
                :disabled="isLoading"
                class="w-full px-5 py-3 border-2 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg pr-12"
                :class="form.new_password_confirmation && form.new_password !== form.new_password_confirmation
                  ? 'border-red-300'
                  : 'border-gray-200'"
                placeholder="Répétez le mot de passe"
              />
              <button
                type="button"
                @click="showConfirm = !showConfirm"
                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600"
              >
                <svg v-if="!showConfirm" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <svg v-else class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
              </button>
            </div>
            <p
              v-if="form.new_password_confirmation && form.new_password !== form.new_password_confirmation"
              class="mt-1 text-xs text-red-500"
            >
              Les mots de passe ne correspondent pas
            </p>
          </div>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t">
          <button
            @click="handleSubmit"
            :disabled="isLoading || !isFormValid"
            class="flex-1 px-6 py-3 bg-primary text-white rounded-xl transition-all font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed"
          >
            <svg v-if="isLoading" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>

            <span v-if="!isLoading">Enregistrer le nouveau mot de passe</span>
            <span v-else>Enregistrement...</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'
import api from '../../utils/api'
import { useAuthStore } from '../../stores/auth'

const router = useRouter()
const authStore = useAuthStore()

const form = ref({
  current_password: '',
  new_password: '',
  new_password_confirmation: ''
})

const showCurrent = ref(false)
const showNew = ref(false)
const showConfirm = ref(false)
const isLoading = ref(false)
const formErrors = ref<string[]>([])
const successMessage = ref('')

// --- Force du mot de passe ---
const passwordStrength = computed(() => {
  const p = form.value.new_password
  if (!p) return 0
  let score = 0
  if (p.length >= 8) score++
  if (/[A-Z]/.test(p)) score++
  if (/[0-9]/.test(p)) score++
  if (/[^A-Za-z0-9]/.test(p)) score++
  return score
})

const strengthColor = computed(() => {
  return ['bg-red-400', 'bg-orange-400', 'bg-yellow-400', 'bg-green-500'][passwordStrength.value - 1] || 'bg-gray-200'
})

const strengthTextColor = computed(() => {
  return ['text-red-500', 'text-orange-500', 'text-yellow-600', 'text-green-600'][passwordStrength.value - 1] || 'text-gray-400'
})

const strengthLabel = computed(() => {
  return ['Très faible', 'Faible', 'Moyen', 'Fort'][passwordStrength.value - 1] || ''
})

// --- Validation ---
const isFormValid = computed(() => {
  return (
    form.value.current_password.length > 0 &&
    form.value.new_password.length >= 8 &&
    form.value.new_password === form.value.new_password_confirmation
  )
})

// --- Soumission ---
const handleSubmit = async () => {
  formErrors.value = []
  successMessage.value = ''

  if (!form.value.current_password) formErrors.value.push('Le mot de passe actuel est requis')
  if (!form.value.new_password) formErrors.value.push('Le nouveau mot de passe est requis')
  if (form.value.new_password.length < 8) formErrors.value.push('Le nouveau mot de passe doit contenir au moins 8 caractères')
  if (form.value.new_password !== form.value.new_password_confirmation) formErrors.value.push('La confirmation ne correspond pas')

  if (formErrors.value.length > 0) return

  isLoading.value = true

  try {
    await api.put('/users/update-password', {
      current_password: form.value.current_password,
      new_password: form.value.new_password,
      new_password_confirmation: form.value.new_password_confirmation
    })

    authStore.updateUser({ password_change_required: false })

    successMessage.value = 'Mot de passe mis à jour avec succès. Redirection...'

    setTimeout(() => {
      router.push('/Cofinoistg@admin/home')
    }, 1500)
  } catch (error: any) {
    console.error('Erreur changement mot de passe:', error)

    if (error.response?.data?.errors) {
      const serverErrors = error.response.data.errors
      formErrors.value = Object.values(serverErrors).flat() as string[]
    } else {
      formErrors.value = ['Une erreur est survenue. Veuillez réessayer.']
    }
  } finally {
    isLoading.value = false
  }
}
</script>
