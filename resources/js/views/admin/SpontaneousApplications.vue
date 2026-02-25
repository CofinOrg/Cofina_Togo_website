<template>
  <div class="min-h-screen bg-linear-to-br from-gray-50 to-gray-100 py-12 px-4">
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
            {{ cvs.length }} candidature(s) au total
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
              <tr v-if="filteredCvs.length === 0">
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                  <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  <p class="text-lg font-medium">Aucune candidature trouvée</p>
                  <p class="text-sm">Les candidatures spontanées apparaîtront ici</p>
                </td>
              </tr>
              <!-- Lignes du tableau -->
              <tr v-for="cv in filteredCvs" :key="cv.id" class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">{{ cv.name }}</div>
                  <div class="text-xs text-gray-500">{{ cv.email }}</div>
                  <div v-if="cv.phone" class="text-xs text-gray-400">{{ cv.phone }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                    {{ cv.desired_position || '-' }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-500">{{ formatDate(cv.created_at) }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <a
                    v-if="cv.cv_path"
                    :href="getFileUrl(cv.cv_path)"
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
                      @click="openDetails(cv)"
                      class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                      title="Voir les détails et les scores"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </button>
                    <!-- Répondre par email -->
                    <a
                      :href="`mailto:${cv.email}?subject=Re: Candidature spontanée`"
                      class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors"
                      title="Répondre par email"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                    </a>
                    <!-- Supprimer -->
                    <button
                      @click="deleteCv(cv.id)"
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
      <div v-if="selectedCv" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
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
                  <p class="text-sm font-medium text-gray-900">{{ selectedCv.name }}</p>
                </div>
                <div>
                  <p class="text-xs text-gray-500">Email</p>
                  <a :href="`mailto:${selectedCv.email}`" class="text-sm font-medium text-primary hover:underline">
                    {{ selectedCv.email }}
                  </a>
                </div>
                <div v-if="selectedCv.phone">
                  <p class="text-xs text-gray-500">Téléphone</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedCv.phone }}</p>
                </div>
                <div>
                  <p class="text-xs text-gray-500">Date de candidature</p>
                  <p class="text-sm font-medium text-gray-900">{{ formatDate(selectedCv.created_at) }}</p>
                </div>
              </div>
            </div>

            <!-- Poste souhaité -->
            <div class="bg-blue-50 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">Poste souhaité</h4>
              <p class="text-gray-900 font-medium text-lg">{{ selectedCv.desired_position || '-' }}</p>
            </div>

            <!-- Message de motivation -->
            <div v-if="selectedCv.motivation_message" class="bg-white border-2 border-gray-100 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Message de motivation</h4>
              <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">{{ selectedCv.motivation_message }}</p>
            </div>

            <!-- CV -->
            <div v-if="selectedCv.cv_path" class="bg-green-50 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Curriculum Vitae</h4>
              <a
                :href="getFileUrl(selectedCv.cv_path)"
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

            <!-- Scores par offre -->
            <div class="bg-white border-2 border-gray-100 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">Scores de correspondance par offre</h4>

              <!-- Chargement -->
              <div v-if="loadingApplications" class="flex items-center justify-center py-8 text-gray-400">
                <svg class="animate-spin w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                Calcul en cours...
              </div>

              <!-- Aucun score -->
              <div v-else-if="selectedApplications.length === 0" class="text-center py-6 text-gray-400">
                <p class="text-sm">Aucun score disponible pour le moment</p>
              </div>

              <!-- Tableau des scores -->
              <div v-else class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                  <thead>
                    <tr class="text-left text-xs font-medium text-gray-500 uppercase">
                      <th class="pb-3 pr-4">Offre</th>
                      <th class="pb-3 pr-4">Score</th>
                      <th class="pb-3 pr-4">Statut</th>
                      <th class="pb-3">Commentaire</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-100">
                    <tr v-for="app in selectedApplications" :key="app.id" class="py-2">
                      <td class="py-3 pr-4 font-medium text-gray-900">
                        {{ app.job_offer?.title || `Offre #${app.job_offer_id}` }}
                      </td>
                      <td class="py-3 pr-4">
                        <div class="flex items-center gap-2">
                          <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div
                              class="h-2 rounded-full"
                              :class="getScoreColor(app.score)"
                              :style="`width: ${app.score}%`"
                            ></div>
                          </div>
                          <span class="font-bold" :class="getScoreTextColor(app.score)">{{ app.score }}%</span>
                        </div>
                      </td>
                      <td class="py-3 pr-4">
                        <span :class="getStatusClass(app.status)" class="px-2 py-1 rounded-full text-xs font-semibold">
                          {{ getStatusLabel(app.status) }}
                        </span>
                      </td>
                      <td class="py-3 text-gray-500 text-xs max-w-xs truncate" :title="app.raison">
                        {{ app.raison || '-' }}
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
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
              :href="`mailto:${selectedCv.email}?subject=Re: Candidature spontanée`"
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

const cvs = ref<any[]>([])
const searchQuery = ref('')
const selectedCv = ref<any>(null)
const selectedApplications = ref<any[]>([])
const loadingApplications = ref(false)

const filteredCvs = computed(() => {
  const query = searchQuery.value.toLowerCase()
  return cvs.value.filter(cv =>
    cv.name?.toLowerCase().includes(query) ||
    cv.email?.toLowerCase().includes(query) ||
    cv.desired_position?.toLowerCase().includes(query)
  )
})

const fetchCvs = async () => {
  try {
    const response = await api.get('/cvs?source=spontaneous&paginate=false')
    cvs.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur lors du chargement des candidatures', error)
  }
}

const openDetails = async (cv: any) => {
  selectedCv.value = cv
  selectedApplications.value = []
  loadingApplications.value = true
  try {
    const response = await api.get(`/applications?cv_id=${cv.id}&paginate=false`)
    selectedApplications.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur lors du chargement des scores', error)
  } finally {
    loadingApplications.value = false
  }
}

const closeDetails = () => {
  selectedCv.value = null
  selectedApplications.value = []
}

const deleteCv = async (id: number) => {
  if (!confirm('Êtes-vous sûr de vouloir supprimer cette candidature ?')) return
  try {
    await api.delete(`/cvs/${id}`)
    await fetchCvs()
  } catch (error) {
    console.error('Erreur lors de la suppression', error)
    alert('Erreur lors de la suppression')
  }
}

const formatDate = (dateString: string) => {
  if (!dateString) return '-'
  return new Date(dateString).toLocaleDateString('fr-FR', {
    day: '2-digit', month: '2-digit', year: 'numeric',
    hour: '2-digit', minute: '2-digit'
  })
}

const getFileUrl = (path: string) => `/storage/${path}`

const getScoreColor = (score: number) => {
  if (score >= 70) return 'bg-green-500'
  if (score >= 40) return 'bg-yellow-500'
  return 'bg-red-400'
}

const getScoreTextColor = (score: number) => {
  if (score >= 70) return 'text-green-700'
  if (score >= 40) return 'text-yellow-700'
  return 'text-red-600'
}

const getStatusClass = (status: string) => {
  const classes: Record<string, string> = {
    pending: 'bg-gray-100 text-gray-700',
    accepted: 'bg-green-100 text-green-800',
    rejected: 'bg-red-100 text-red-700',
  }
  return classes[status] || 'bg-gray-100 text-gray-700'
}

const getStatusLabel = (status: string) => {
  const labels: Record<string, string> = {
    pending: 'En attente',
    accepted: 'Retenu',
    rejected: 'Refusé',
  }
  return labels[status] || status
}

onMounted(() => fetchCvs())
</script>
