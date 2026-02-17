<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4">
    <div class="max-w-7xl mx-auto">
      <!-- En-tête -->
      <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Candidatures spontanées</h1>
        <p class="text-gray-600">Consultez et gérez les candidatures spontanées reçues</p>
      </div>

      <!-- Section Tableau -->
      <div class="bg-white rounded-2xl shadow-xl p-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
          <h2 class="text-xl font-bold text-gray-900">Liste des candidatures</h2>
          <div class="text-sm text-gray-500">
            {{ applications.length }} candidature(s) au total
          </div>
        </div>

        <!-- Barre de recherche -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6">
          <div class="flex-1">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Rechercher par nom, email ou poste..."
              class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none"
            />
          </div>
        </div>

        <!-- Tableau -->
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Candidat</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poste souhaité</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CV</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <!-- État vide -->
              <tr v-if="filteredApplications.length === 0">
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                  <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  <p class="text-lg font-medium">Aucune candidature trouvée</p>
                  <p class="text-sm">Les candidatures spontanées apparaîtront ici</p>
                </td>
              </tr>
              <!-- Lignes du tableau -->
              <tr v-for="application in filteredApplications" :key="application.id" class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">{{ application.name }}</div>
                  <div class="text-xs text-gray-500">{{ application.email }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                    {{ application.desired_position }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-500">{{ formatDate(application.created_at) }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <a
                    v-if="application.cv_path"
                    :href="getFileUrl(application.cv_path)"
                    target="_blank"
                    download
                    class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 hover:bg-green-200 transition-colors"
                  >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Télécharger CV
                  </a>
                  <span v-else class="text-xs text-gray-400">Aucun CV</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex items-center gap-2">
                    <!-- Voir détails -->
                    <button
                      @click="openDetails(application)"
                      class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                      title="Voir les détails"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </button>
                    <!-- Répondre par email -->
                    <a
                      :href="`mailto:${application.email}?subject=Re: Candidature pour ${application.desired_position}`"
                      class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors"
                      title="Répondre par email"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                    </a>
                    <!-- Supprimer -->
                    <button
                      @click="deleteApplication(application.id)"
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
      <div v-if="selectedApplication" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
          <!-- Header Modal -->
          <div class="sticky top-0 bg-white border-b px-6 py-4 flex items-center justify-between rounded-t-2xl">
            <h3 class="text-xl font-bold text-gray-900">Détails de la candidature</h3>
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
            <!-- Informations candidat -->
            <div class="bg-gray-50 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Informations du candidat</h4>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <p class="text-xs text-gray-500">Nom complet</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedApplication.name }}</p>
                </div>
                <div>
                  <p class="text-xs text-gray-500">Email</p>
                  <a :href="`mailto:${selectedApplication.email}`" class="text-sm font-medium text-primary hover:underline">
                    {{ selectedApplication.email }}
                  </a>
                </div>
                <div>
                  <p class="text-xs text-gray-500">Date de candidature</p>
                  <p class="text-sm font-medium text-gray-900">{{ formatDate(selectedApplication.created_at) }}</p>
                </div>
              </div>
            </div>

            <!-- Poste souhaité -->
            <div class="bg-blue-50 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">Poste souhaité</h4>
              <p class="text-gray-900 font-medium text-lg">{{ selectedApplication.desired_position }}</p>
            </div>

            <!-- Message de motivation -->
            <div class="bg-white border-2 border-gray-100 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Message de motivation</h4>
              <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">{{ selectedApplication.motivation_message }}</p>
            </div>

            <!-- CV -->
            <div v-if="selectedApplication.cv_path" class="bg-green-50 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Curriculum Vitae</h4>
              <a
                :href="getFileUrl(selectedApplication.cv_path)"
                target="_blank"
                download
                class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors font-semibold"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Télécharger le CV
              </a>
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
            <a
              :href="`mailto:${selectedApplication.email}?subject=Re: Candidature pour ${selectedApplication.desired_position}`"
              class="px-6 py-2 bg-primary text-white rounded-xl hover:bg-secondary transition-colors font-semibold flex items-center gap-2"
            >
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              Répondre
            </a>
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
const applications = ref<any[]>([])
const searchQuery = ref('')
const selectedApplication = ref<any>(null)

// Computed pour filtrer les candidatures
const filteredApplications = computed(() => {
  return applications.value.filter(a => {
    const query = searchQuery.value.toLowerCase()
    return (
      a.name?.toLowerCase().includes(query) ||
      a.email?.toLowerCase().includes(query) ||
      a.desired_position?.toLowerCase().includes(query)
    )
  })
})

// Charger la liste des candidatures
const fetchApplications = async () => {
  try {
    const response = await api.get('/spontaneous_applications')
    applications.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur lors du chargement des candidatures', error)
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

// Générer l'URL du fichier
const getFileUrl = (path: string) => {
  if (!path) return ''
  return `/storage/${path}`
}

// Ouvrir le modal de détails
const openDetails = (application: any) => {
  selectedApplication.value = application
}

// Fermer le modal
const closeDetails = () => {
  selectedApplication.value = null
}

// Supprimer une candidature
const deleteApplication = async (id: number) => {
  if (!confirm('Êtes-vous sûr de vouloir supprimer cette candidature ?')) return

  try {
    await api.delete(`/spontaneous_applications/${id}`)
    await fetchApplications()
    alert('Candidature supprimée avec succès')
  } catch (error) {
    console.error('Erreur lors de la suppression', error)
    alert('Erreur lors de la suppression')
  }
}

// Charger les données au montage
onMounted(() => {
  fetchApplications()
})
</script>
