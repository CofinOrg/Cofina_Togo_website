<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4">
    <div class="max-w-3xl mx-auto">
      <!-- En-tête -->
      <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Mon profil</h1>
        <p class="text-gray-600">Consultez vos informations et changez votre mot de passe</p>
      </div>

      <!-- Section Informations -->
      <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Informations personnelles</h2>

        <div class="flex items-center gap-6 mb-8">
          <!-- Avatar avec initiales -->
          <div class="w-15 h-15 rounded-full bg-gradient-to-br from-background/50 to-primary flex items-center justify-center text-white font-bold text-2xl flex-shrink-0">
            {{ userInitials }}
          </div>
          <div>
            <p class="text-2xl font-bold text-gray-900">{{ authStore.user?.name }}</p>
            <p class="text-gray-500">{{ authStore.user?.email }}</p>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div class="p-4 bg-gray-50 rounded-xl">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Nom complet</p>
            <p class="text-lg font-medium text-gray-900">{{ authStore.user?.name }}</p>
          </div>
          <div class="p-4 bg-gray-50 rounded-xl">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Email</p>
            <p class="text-lg font-medium text-gray-900">{{ authStore.user?.email }}</p>
          </div>
          <div class="p-4 bg-gray-50 rounded-xl">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Profil</p>
            <p class="text-lg font-medium text-gray-900">{{ profileLabel }}</p>
          </div>
        </div>
      </div>

      <!-- Section Changement de mot de passe -->
      <div class="bg-white rounded-2xl shadow-xl p-8 space-y-8">
        <div>
          <h2 class="text-xl font-bold text-gray-900">Changer le mot de passe</h2>
          <p class="text-gray-600 mt-1">Mettez à jour votre mot de passe pour sécuriser votre compte</p>
        </div>

        <!-- Message de succès -->
        <div v-if="successMessage" class="bg-green-50 border border-green-200 rounded-xl p-4">
          <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <p class="text-sm text-green-700 font-medium">{{ successMessage }}</p>
          </div>
        </div>

        <!-- Messages d'erreur -->
        <div v-if="passwordErrors.length > 0" class="bg-red-50 border border-red-200 rounded-xl p-4">
          <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
            <li v-for="(error, idx) in passwordErrors" :key="idx">{{ error }}</li>
          </ul>
        </div>

        <!-- Mot de passe actuel -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">
            Mot de passe actuel
          </label>
          <input
            v-model="passwordForm.current_password"
            type="password"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg"
            placeholder="Votre mot de passe actuel"
          />
        </div>

        <!-- Nouveau mot de passe -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">
            Nouveau mot de passe
          </label>
          <input
            v-model="passwordForm.new_password"
            type="password"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg"
            placeholder="Minimum 8 caractères"
          />
        </div>

        <!-- Confirmation -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">
            Confirmer le nouveau mot de passe
          </label>
          <input
            v-model="passwordForm.new_password_confirmation"
            type="password"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg"
            placeholder="Retapez le nouveau mot de passe"
          />
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t">
          <button
            @click="changePassword"
            :disabled="isSubmitting"
            class="flex-1 px-6 py-3 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2 disabled:opacity-50"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
            {{ isSubmitting ? 'Modification en cours...' : 'Changer le mot de passe' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import { useAuthStore } from '../../stores/auth'
import api from '../../utils/api'

const authStore = useAuthStore()

const profileLabels: Record<string, string> = {
  admin: 'Administrateur',
  rh: 'Ressources Humaines',
  marketing: 'Marketing'
}

const profileLabel = computed(() => profileLabels[authStore.user?.profile || ''] || authStore.user?.profile || '')

const userInitials = computed(() => {
  const name = authStore.user?.name || ''
  const parts = name.trim().split(/\s+/)
  if (parts.length >= 2) return (parts[0][0] + parts[1][0]).toUpperCase()
  return name.substring(0, 2).toUpperCase()
})

// État du formulaire de mot de passe
const passwordForm = ref({
  current_password: '',
  new_password: '',
  new_password_confirmation: ''
})

const passwordErrors = ref<string[]>([])
const successMessage = ref('')
const isSubmitting = ref(false)

const changePassword = async () => {
  passwordErrors.value = []
  successMessage.value = ''

  // Validation côté client
  if (!passwordForm.value.current_password) passwordErrors.value.push('Le mot de passe actuel est requis')
  if (!passwordForm.value.new_password) passwordErrors.value.push('Le nouveau mot de passe est requis')
  if (passwordForm.value.new_password && passwordForm.value.new_password.length < 8) {
    passwordErrors.value.push('Le nouveau mot de passe doit contenir au moins 8 caractères')
  }
  if (passwordForm.value.new_password !== passwordForm.value.new_password_confirmation) {
    passwordErrors.value.push('La confirmation du mot de passe ne correspond pas')
  }

  if (passwordErrors.value.length > 0) return

  isSubmitting.value = true

  try {
    const response = await api.put('/users/update-password', passwordForm.value)

    successMessage.value = 'Mot de passe modifié avec succès'

    // Mettre à jour password_change_required dans le store
    if (authStore.user) {
      authStore.user.password_change_required = false

      // Mettre à jour le storage
      const storageKey = 'user'
      const savedInLocal = localStorage.getItem(storageKey)
      const storage = savedInLocal ? localStorage : sessionStorage
      storage.setItem(storageKey, JSON.stringify(authStore.user))
    }

    // Réinitialiser le formulaire
    passwordForm.value = {
      current_password: '',
      new_password: '',
      new_password_confirmation: ''
    }
  } catch (error: any) {
    console.error('Erreur lors du changement de mot de passe', error)
    if (error.response?.data?.errors) {
      const serverErrors = error.response.data.errors
      passwordErrors.value = Object.values(serverErrors).flat() as string[]
    } else {
      passwordErrors.value = ['Une erreur est survenue lors du changement de mot de passe']
    }
  } finally {
    isSubmitting.value = false
  }
}
</script>
