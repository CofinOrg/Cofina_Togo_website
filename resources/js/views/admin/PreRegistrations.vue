<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4">
    <div class="max-w-7xl mx-auto">
      <!-- En-tête -->
      <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Pré-inscriptions</h1>
        <p class="text-gray-600">Gérez les demandes de pré-inscription des clients</p>
      </div>

      <!-- Section Tableau -->
      <div class="bg-white rounded-2xl shadow-xl p-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Liste des pré-inscriptions</h2>

        <!-- Barre de recherche -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6">
          <div class="flex-1">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Rechercher par nom ou email..."
              class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none"
            />
          </div>
        </div>

        <!-- Tableau -->
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produit</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pièces jointes</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <!-- État vide -->
              <tr v-if="filteredRegistrations.length === 0">
                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                  <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  <p class="text-lg font-medium">Aucune pré-inscription trouvée</p>
                  <p class="text-sm">Les demandes de pré-inscription apparaîtront ici</p>
                </td>
              </tr>
              <!-- Lignes du tableau -->
              <tr v-for="registration in filteredRegistrations" :key="registration.id" class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">{{ registration.customer_name }}</div>
                  <div class="text-xs text-gray-500">{{ registration.customer_adress }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ registration.customer_email }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">{{ registration.product?.name || '-' }}</div>
                  <div v-if="registration.product?.service" class="text-xs text-gray-500">
                    {{ registration.product.service.name }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-500">{{ formatDate(registration.created_at) }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center gap-1">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                      {{ countAttachments(registration) }} fichier(s)
                    </span>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex items-center gap-2">
                    <!-- Voir détails -->
                    <button
                      @click="openDetails(registration)"
                      class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                      title="Voir les détails"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </button>
                    <!-- Supprimer -->
                    <button
                      @click="deleteRegistration(registration.id)"
                      class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                      title="Supprimer"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Modal Détails -->
      <div v-if="selectedRegistration" class="fixed inset-0 bg-black/50 bg-opacity-20 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
          <!-- Header Modal -->
          <div class="sticky top-0 bg-white border-b px-6 py-4 flex items-center justify-between rounded-t-2xl">
            <h3 class="text-xl font-bold text-gray-900">Détails de la pré-inscription</h3>
            <button
              @click="closeDetails"
              class="p-2 hover:bg-gray-100 rounded-lg transition-colors"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- Contenu Modal -->
          <div class="p-6 space-y-6">
            <!-- Informations client -->
            <div class="bg-gray-50 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Informations client</h4>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <p class="text-xs text-gray-500">Nom complet</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedRegistration.customer_name }}</p>
                </div>
                <div>
                  <p class="text-xs text-gray-500">Email</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedRegistration.customer_email }}</p>
                </div>
                <div >
                  <p class="text-xs text-gray-500">Adresse</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedRegistration.customer_adress }}</p>
                </div>
                <div >
                  <p class="text-xs text-gray-500">Téléphone</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedRegistration.phone_number }}</p>
                </div>
                <div >
                  <p class="text-xs text-gray-500">Entreprise</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedRegistration.business }}</p>
                </div>
                <div v-if="selectedRegistration.receipt_number">
                  <p class="text-xs text-gray-500">Numéro de récépissé</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedRegistration.receipt_number }}</p>
                </div>
              </div>
            </div>

            <!-- Produit sélectionné -->
            <div class="bg-blue-50 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Produit sélectionné</h4>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <p class="text-xs text-gray-500">Nom du produit</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedRegistration.product?.name || '-' }}</p>
                </div>
                <div v-if="selectedRegistration.product?.service">
                  <p class="text-xs text-gray-500">Service</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedRegistration.product.service.name }}</p>
                </div>
                <div v-if="selectedRegistration.product?.deposit_at_opening">
                  <p class="text-xs text-gray-500">Dépôt à l'ouverture</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedRegistration.product.deposit_at_opening }} FCFA</p>
                </div>
              </div>
            </div>

            <!-- Pièces jointes -->
            <div class="bg-green-50 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Pièces jointes</h4>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <!-- Pièce d'identité -->
                <div v-if="selectedRegistration.identity_document" class="flex items-center justify-between bg-white rounded-lg p-3 border">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                      <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                      </svg>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-900">Pièce d'identité</p>
                      <p class="text-xs text-gray-500">Document</p>
                    </div>
                  </div>
                  <a
                    :href="getFileUrl(selectedRegistration.identity_document)"
                    target="_blank"
                    download
                    class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors"
                    title="Télécharger"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                  </a>
                </div>

                <!-- Photo d'identité -->
                <div v-if="selectedRegistration.identity_photo" class="flex items-center justify-between bg-white rounded-lg p-3 border">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                      <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-900">Photo d'identité</p>
                      <p class="text-xs text-gray-500">Image</p>
                    </div>
                  </div>
                  <a
                    :href="getFileUrl(selectedRegistration.identity_photo)"
                    target="_blank"
                    download
                    class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors"
                    title="Télécharger"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                  </a>
                </div>

                <!-- Justificatif de domicile -->
                <div v-if="selectedRegistration.proof_of_address" class="flex items-center justify-between bg-white rounded-lg p-3 border">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                      <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                      </svg>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-900">Justificatif de domicile</p>
                      <p class="text-xs text-gray-500">Document</p>
                    </div>
                  </div>
                  <a
                    :href="getFileUrl(selectedRegistration.proof_of_address)"
                    target="_blank"
                    download
                    class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors"
                    title="Télécharger"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                  </a>
                </div>

                <!-- Carte CFE -->
                <div v-if="selectedRegistration.card_cfe" class="flex items-center justify-between bg-white rounded-lg p-3 border">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                      <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                      </svg>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-900">Carte CFE</p>
                      <p class="text-xs text-gray-500">Document entreprise</p>
                    </div>
                  </div>
                  <a
                    :href="getFileUrl(selectedRegistration.card_cfe)"
                    target="_blank"
                    download
                    class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors"
                    title="Télécharger"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <!-- Date d'inscription -->
            <div class="text-center text-sm text-gray-500">
              Inscription reçue le {{ formatDate(selectedRegistration.created_at) }}
            </div>
          </div>

          <!-- Footer Modal -->
          <div class="sticky bottom-0 bg-gray-50 border-t px-6 py-4 flex justify-end gap-3 rounded-b-2xl">
            <button
              @click="closeDetails"
              class="px-6 py-2 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition-colors font-semibold"
            >
              Fermer
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import api from '../../utils/api'

// État de la liste
const registrations = ref<any[]>([])
const searchQuery = ref('')
const selectedRegistration = ref<any>(null)

// Computed pour filtrer les pré-inscriptions
const filteredRegistrations = computed(() => {
  return registrations.value.filter(r => {
    const query = searchQuery.value.toLowerCase()
    return (
      r.customer_name?.toLowerCase().includes(query) ||
      r.customer_email?.toLowerCase().includes(query)
    )
  })
})

// Charger la liste des pré-inscriptions
const fetchRegistrations = async () => {
  try {
    const response = await api.get('/pre_registrations?with_product=true')
    registrations.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur lors du chargement des pré-inscriptions', error)
  }
}

// Formater la date
const formatDate = (dateString: string) => {
  if (!dateString) return '-'
  const date = new Date(dateString)
  return date.toLocaleDateString('fr-FR', {
    day: '2-digit',
    month: '2-digit',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  })
}

// Compter les pièces jointes
const countAttachments = (registration: any) => {
  let count = 0
  if (registration.identity_document) count++
  if (registration.identity_photo) count++
  if (registration.proof_of_address) count++
  if (registration.card_cfe) count++
  return count
}

// Générer l'URL du fichier
const getFileUrl = (path: string) => {
  if (!path) return ''
  return `/storage/${path}`
}

// Ouvrir le modal de détails
const openDetails = async (registration: any) => {
  try {
    // Charger les détails complets avec le produit et son service
    const response = await api.get(`/pre_registrations/${registration.id}?with_product=true`)
    const data = response.data.data || response.data
    selectedRegistration.value = data.PreRegistration || data

    // Charger aussi les infos du service si le produit existe
    if (selectedRegistration.value.product_id && !selectedRegistration.value.product?.service) {
      try {
        const productResponse = await api.get(`/service_products/${selectedRegistration.value.product_id}?with_service=true`)
        const productData = productResponse.data.data || productResponse.data
        selectedRegistration.value.product = productData.ServiceProduct || productData
      } catch (e) {
        console.error('Erreur lors du chargement du produit', e)
      }
    }
  } catch (error) {
    console.error('Erreur lors du chargement des détails', error)
    selectedRegistration.value = registration
  }
}

// Fermer le modal
const closeDetails = () => {
  selectedRegistration.value = null
}

// Supprimer une pré-inscription
const deleteRegistration = async (id: number) => {
  if (!confirm('Êtes-vous sûr de vouloir supprimer cette pré-inscription ?')) return

  try {
    await api.delete(`/pre_registrations/${id}`)
    await fetchRegistrations()
    alert('Pré-inscription supprimée avec succès')
  } catch (error) {
    console.error('Erreur lors de la suppression', error)
    alert('Erreur lors de la suppression')
  }
}

// Charger les données au montage
onMounted(() => {
  fetchRegistrations()
})
</script>
