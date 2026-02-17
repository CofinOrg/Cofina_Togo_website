<template>
  <main class="min-h-screen bg-gradient-to-br from-[#0A1628] via-[#0F1E33] to-[#0A1628]">
    <!-- Hero -->
    <section class="relative h-[260px] flex items-center overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-r from-[#0A1628] to-[#1a2a44] opacity-90" />
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#D4AF37] rounded-full blur-3xl" />
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#D4AF37] rounded-full blur-3xl" />
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <div class="flex items-center gap-3 mb-3">
          <Star :size="28" fill="#D4AF37" stroke="none" />
          <span class="text-[#D4AF37] text-sm font-semibold uppercase tracking-wider">Espace premium</span>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-white tracking-tight">
          Rejoindre Cofina Business Touch
        </h1>
        <p class="text-gray-300 mt-3 max-w-xl">
          Intégrez un cercle exclusif de clients d'affaires et profitez d'avantages uniques.
        </p>
      </div>
    </section>

    <!-- Description -->
    <section class="py-10">
      <div class="container mx-auto px-6 max-w-5xl">
        <p class="text-gray-400 leading-relaxed mb-3">
          Remplissez le formulaire ci-dessous pour soumettre votre demande d'adhésion au club <span class="text-[#D4AF37] font-bold">Cofina Business Touch</span>.
          Notre équipe vous contactera pour finaliser votre inscription.
        </p>
        <p class="text-gray-500 leading-relaxed text-sm">
          Toutes les informations fournies sont confidentielles et sécurisées.
        </p>
      </div>
    </section>

    <!-- Formulaire -->
    <section class="pb-20 container mx-auto px-6">
      <div class="max-w-4xl mx-auto">
        <div class="bg-gradient-to-br from-[#D4AF37]/40 to-[#D4AF37]/5 backdrop-blur-sm p-8 md:p-12 rounded-3xl border border-[#D4AF37]/30">

          <form :key="formKey" @submit.prevent="handleSubmit">
            <div class="mb-10">
              <h2 class="text-xl font-black text-[#D4AF37] mb-6">Informations personnelles</h2>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                  <label class="block text-sm font-bold text-gray-300 mb-3">Nom complet *</label>
                  <input
                    v-model="formData.name"
                    type="text"
                    required
                    placeholder="Votre nom et prénom"
                    class="w-full p-3 bg-white/10 border border-[#D4AF37]/30 rounded-lg text-white placeholder-gray-500 outline-none focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition-all"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-300 mb-3">Email *</label>
                  <input
                    v-model="formData.email"
                    type="email"
                    required
                    placeholder="votre@email.com"
                    class="w-full p-3 bg-white/10 border border-[#D4AF37]/30 rounded-lg text-white placeholder-gray-500 outline-none focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition-all"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-300 mb-3">Téléphone</label>
                  <input
                    v-model="formData.phone"
                    type="text"
                    placeholder="Votre numéro de téléphone"
                    class="w-full p-3 bg-white/10 border border-[#D4AF37]/30 rounded-lg text-white placeholder-gray-500 outline-none focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition-all"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-300 mb-3">Entreprise</label>
                  <input
                    v-model="formData.job"
                    type="text"
                    placeholder="Votre entreprise ou secteur d'activité"
                    class="w-full p-3 bg-white/10 border border-[#D4AF37]/30 rounded-lg text-white placeholder-gray-500 outline-none focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition-all"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-300 mb-3">Numéro de compte Cofina *</label>
                  <input
                    v-model="formData.account_number"
                    type="number"
                    required
                    placeholder="Votre numéro de compte"
                    class="w-full p-3 bg-white/10 border border-[#D4AF37]/30 rounded-lg text-white placeholder-gray-500 outline-none focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition-all [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                  />
                </div>
              </div>
            </div>

            <!-- Consentement -->
            <div class="mb-8">
              <label class="flex items-start gap-3 cursor-pointer">
                <input
                  v-model="formData.accepteConditions"
                  type="checkbox"
                  required
                  class="mt-1 w-5 h-5 text-[#D4AF37] border-[#D4AF37]/40 rounded focus:ring-[#D4AF37] bg-white/10"
                />
                <span class="text-sm text-gray-400">
                  J'accepte les <a href="#" class="text-[#D4AF37] font-semibold hover:underline">conditions générales</a>
                  et la <a href="#" class="text-[#D4AF37] font-semibold hover:underline">politique de confidentialité</a> *
                </span>
              </label>
            </div>

            <!-- Bouton -->
            <div class="flex justify-center">
              <button
                type="submit"
                :disabled="isSubmitting"
                class="px-12 py-4 bg-[#D4AF37] text-[#0A1628] font-bold rounded-lg hover:bg-[#c4a030] shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 disabled:bg-gray-600 disabled:cursor-not-allowed disabled:transform-none"
              >
                {{ isSubmitting ? 'Envoi en cours...' : 'Soumettre ma demande d\'adhésion' }}
              </button>
            </div>
          </form>

          <!-- Message de succès -->
          <div v-if="showSuccess" class="mt-8 p-4 bg-green-900/30 border border-green-600/50 text-green-400 rounded-lg">
            <p class="font-bold">Votre demande d'adhésion a été envoyée avec succès !</p>
            <p class="text-sm mt-2">Notre équipe vous contactera dans les plus brefs délais.</p>
          </div>

          <!-- Message d'erreur -->
          <div v-if="errorMessage" class="mt-8 p-4 bg-red-900/30 border border-red-600/50 text-red-400 rounded-lg">
            <p class="font-bold">Une erreur est survenue</p>
            <p class="text-sm mt-2">{{ errorMessage }}</p>
          </div>

          <p class="text-[11px] text-gray-500 mt-10 leading-snug italic">
            NB: Les champs marqués d'un astérisque (*) sont obligatoires. Vos données personnelles sont protégées et ne seront utilisées que dans le cadre de votre demande d'adhésion.
          </p>
        </div>
      </div>
    </section>
  </main>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { Star } from 'lucide-vue-next'
import api from '../../utils/api'

const isSubmitting = ref(false)
const showSuccess = ref(false)
const errorMessage = ref('')
const formKey = ref(0)

const formData = reactive({
  name: '',
  email: '',
  phone: '',
  job: '',
  account_number: '',
  accepteConditions: false
})

const handleSubmit = async () => {
  isSubmitting.value = true
  showSuccess.value = false
  errorMessage.value = ''

  try {
    await api.post('/business_club_members', {
      name: formData.name,
      email: formData.email,
      phone: formData.phone || null,
      job: formData.job || null,
      account_number: formData.account_number
    })

    showSuccess.value = true
    resetForm()
  } catch (error) {
    console.error('Erreur lors de la soumission:', error)
    if (error.response?.data?.errors) {
      const errors = error.response.data.errors
      errorMessage.value = Object.values(errors).flat().join(', ')
    } else {
      errorMessage.value = 'Une erreur est survenue. Veuillez réessayer.'
    }
  } finally {
    isSubmitting.value = false
  }
}

const resetForm = () => {
  Object.assign(formData, {
    name: '',
    email: '',
    phone: '',
    job: '',
    account_number: '',
    accepteConditions: false
  })
  formKey.value++
}
</script>
