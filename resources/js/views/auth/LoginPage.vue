<template>
  <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-purple-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">

      <!-- Logo et titre -->
      <div class="text-center">
            <div  class="flex items-center justify-center">
          <img
            src="../../assets/images/accueil/COFINA Logo.png"
            alt="Cofina Togo"
            class="h-10 lg:h-12 w-auto"
          />
      </div>
        <h2 class="mt-6 text-3xl font-bold text-gray-900">
          Bienvenue
        </h2>
        <p class="mt-2 text-sm text-gray-600">
          Connectez-vous à votre compte administrateur
        </p>
      </div>

      <!-- Formulaire -->
      <form @submit.prevent="handleLogin" class="mt-8 space-y-6">
        <div class="bg-white rounded-2xl shadow-xl p-8 space-y-6">

          <!-- Alert erreur -->
          <div v-if="errorMessage" class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-start gap-3">
            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
            <div class="flex-1">
              <p class="text-sm font-medium">{{ errorMessage }}</p>
            </div>
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
              Adresse email
            </label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
              </div>
              <input
                id="email"
                v-model="form.email"
                type="email"
                required
                autocomplete="email"
                class="appearance-none block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/100 focus:border-transparent transition-colors"
                placeholder="vous@exemple.com"
                :disabled="isLoading"
              />
            </div>
          </div>

          <!-- Mot de passe -->
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
              Mot de passe
            </label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
              </div>
              <input
                id="password"
                v-model="form.password"
                :type="showPassword ? 'text' : 'password'"
                required
                autocomplete="current-password"
                class="appearance-none block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/100 focus:border-transparent transition-colors"
                placeholder="••••••••"
                :disabled="isLoading"
              />
              <button
                type="button"
                @click="showPassword = !showPassword"
                class="absolute inset-y-0 right-0 pr-3 flex items-center"
                :disabled="isLoading"
              >
                <svg v-if="!showPassword" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <svg v-else class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
              </button>
            </div>
          </div>

          <!-- Se souvenir de moi + Mot de passe oublié -->
          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <input
                id="remember-me"
                v-model="form.rememberMe"
                type="checkbox"
                class="h-4 w-4 text-primary focus:ring-primary/100 border-gray-300 rounded cursor-pointer"
                :disabled="isLoading"
              />
              <label for="remember-me" class="ml-2 block text-sm text-gray-700 cursor-pointer">
                Se souvenir de moi
              </label>
            </div>

            <div class="text-sm">
              <a href="#" class="font-medium text-primary hover:text-primary/100 transition-colors">
                Mot de passe oublié ?
              </a>
            </div>
          </div>

          <!-- Bouton de connexion -->
          <button
            type="submit"
            :disabled="isLoading"
            class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-primary to-background/100 hover:from-primary hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
          >
            <svg v-if="isLoading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span v-if="!isLoading">Se connecter</span>
            <span v-else>Connexion en cours...</span>
          </button>
        </div>
      </form>

      <!-- Lien d'inscription (optionnel) -->
      <p class="text-center text-sm text-gray-600">
        Vous n'avez pas de compte ?
        <a href="#" class="font-medium text-primary hover:text-primary/100 transition-colors">
          Contactez l'administrateur
        </a>
      </p>

      <!-- Footer -->
      <div class="text-center text-xs text-gray-500 mt-8">
        <p>&copy; 2026 COFINA. Tous droits réservés.</p>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import api from '../../utils/api'
import { useAuthStore } from '../../stores/auth'

const router = useRouter()
const route = useRoute()
const authStore = useAuthStore()

// État du formulaire
const form = ref({
  email: '',
  password: '',
  rememberMe: false
})

const showPassword = ref(false)
const isLoading = ref(false)
const errorMessage = ref('')

// Gestion de la connexion
const handleLogin = async () => {
  errorMessage.value = ''
  isLoading.value = true

  try {
    const response = await api.post('/auth/login', {
      email: form.value.email,
      password: form.value.password
    })

    console.log('Réponse API:', response.data)

    if (response.data.status === 200) {
        const { userToken, user } = response.data.data

        // Stocker via le store Pinia (gère localStorage/sessionStorage)
        authStore.setAuth(user, userToken, form.value.rememberMe)

      // Rediriger vers la page demandée ou le dashboard par défaut
      const redirectPath = route.query.redirect as string || '/Cofinoistg@admin/home'
      router.push(redirectPath)
      return
    }

    // Gérer les erreurs
    if (response.data.status === 400 || response.data.errors) {
      const errors = response.data.errors
      if (errors?.password) {
        errorMessage.value = 'Mot de passe incorrect'
      } else if (errors?.email) {
        errorMessage.value = 'Email invalide'
      } else {
        errorMessage.value = 'Email ou mot de passe incorrect'
      }
      return
    }

    // Cas inattendu
    errorMessage.value = 'Une erreur inattendue est survenue'
  } catch (error: any) {
    console.error('Erreur de connexion:', error)

    if (error.response?.status === 400) {
      const errors = error.response.data?.data
      if (errors?.password) {
        errorMessage.value = 'Mot de passe incorrect'
      } else if (errors?.email) {
        errorMessage.value = 'Email invalide'
      } else {
        errorMessage.value = 'Email ou mot de passe incorrect'
      }
    } else if (error.response?.status === 404) {
      errorMessage.value = 'Utilisateur non trouvé'
    } else {
      errorMessage.value = 'Une erreur est survenue. Veuillez réessayer.'
    }
  } finally {
    isLoading.value = false
  }
}
</script>

<style scoped>
/* Animation pour l'input focus */
input:focus {
  transform: translateY(-1px);
  transition: transform 0.2s ease;
}

/* Animation du bouton au hover */
button[type="submit"]:hover:not(:disabled) {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4);
}
</style>
