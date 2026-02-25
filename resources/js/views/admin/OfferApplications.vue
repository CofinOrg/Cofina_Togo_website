<template>
  <div class="space-y-6">
    <!-- En-tête -->
    <div>
      <h1 class="text-2xl font-bold text-gray-900">Candidatures par offre</h1>
      <p class="text-sm text-gray-500 mt-1">Consultez et gérez les candidatures reçues pour chaque offre d'emploi</p>
    </div>

    <!-- Sélecteur d'offre -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5">
      <label class="block text-sm font-medium text-gray-700 mb-2">Sélectionner une offre d'emploi</label>
      <select
        v-model="selectedOfferId"
        @change="loadApplications"
        class="w-full md:w-1/2 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
      >
        <option value="">-- Choisir une offre --</option>
        <option v-for="offer in jobOffers" :key="offer.id" :value="offer.id">
          {{ offer.title }}
          <template v-if="offer.status === 'blocked'"> (Clôturée)</template>
        </option>
      </select>
    </div>

    <!-- Contenu : vide si pas d'offre sélectionnée -->
    <div v-if="!selectedOfferId" class="bg-white rounded-lg shadow-sm border border-gray-200 p-16 text-center text-gray-400">
      <svg class="mx-auto w-14 h-14 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
      </svg>
      <p class="text-lg font-medium">Sélectionnez une offre pour voir les candidatures</p>
    </div>

    <template v-else>
      <!-- Offre sélectionnée : info + stats -->
      <div v-if="selectedOffer" class="bg-white rounded-lg shadow-sm border border-gray-200 p-5">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
          <div>
            <h2 class="text-lg font-bold text-gray-900">{{ selectedOffer.title }}</h2>
            <div class="flex items-center gap-3 mt-1">
              <span :class="selectedOffer.status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700'"
                class="px-2 py-0.5 rounded-full text-xs font-semibold">
                {{ selectedOffer.status === 'active' ? 'Active' : 'Clôturée' }}
              </span>
              <span class="text-xs text-gray-500 uppercase font-medium">{{ selectedOffer.type }}</span>
              <span class="text-xs text-gray-400">Deadline : {{ formatDate(selectedOffer.deadline) }}</span>
            </div>
            <p v-if="selectedOffer.spe_particular" class="text-sm text-gray-500 mt-2 italic">
              Spécifications : {{ selectedOffer.spe_particular }}
            </p>
          </div>
          <!-- Stats rapides -->
          <div class="flex gap-4">
            <div class="text-center">
              <p class="text-2xl font-bold text-gray-900">{{ applications.length }}</p>
              <p class="text-xs text-gray-500">Candidats</p>
            </div>
            <div class="text-center">
              <p class="text-2xl font-bold text-green-600">{{ acceptedCount }}</p>
              <p class="text-xs text-gray-500">Retenus</p>
            </div>
            <div class="text-center">
              <p class="text-2xl font-bold text-primary">{{ avgScore }}</p>
              <p class="text-xs text-gray-500">Score moy.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Recherche + filtre statut -->
      <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
        <div class="flex flex-col md:flex-row gap-4">
          <div class="flex-1">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Rechercher par nom ou email..."
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
            />
          </div>
          <select
            v-model="filterStatus"
            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
          >
            <option value="all">Tous les statuts</option>
            <option value="pending">En attente</option>
            <option value="accepted">Retenus</option>
            <option value="rejected">Refusés</option>
          </select>
        </div>
      </div>

      <!-- Tableau des candidatures -->
      <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <!-- Chargement -->
        <div v-if="loading" class="py-16 text-center text-gray-400">
          <svg class="animate-spin w-8 h-8 mx-auto mb-3" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
          </svg>
          Chargement des candidatures...
        </div>

        <!-- Tableau -->
        <div v-else class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
              <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Candidat</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Source</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Score</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">CV</th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <!-- Vide -->
              <tr v-if="filteredApplications.length === 0">
                <td colspan="7" class="px-4 py-12 text-center text-gray-400">
                  <svg class="mx-auto w-12 h-12 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0" />
                  </svg>
                  <p class="font-medium">Aucune candidature trouvée</p>
                </td>
              </tr>
              <!-- Lignes -->
              <tr
                v-for="(app, index) in filteredApplications"
                :key="app.id"
                class="hover:bg-gray-50 transition-colors"
                :class="app.status === 'accepted' ? 'bg-green-50/40' : app.status === 'rejected' ? 'bg-red-50/30' : ''"
              >
                <!-- Rang -->
                <td class="px-4 py-4 text-sm font-bold text-gray-400">
                  {{ index + 1 }}
                </td>
                <!-- Candidat -->
                <td class="px-4 py-4">
                  <div class="text-sm font-medium text-gray-900">{{ app.cv?.name || '-' }}</div>
                  <div class="text-xs text-gray-500">{{ app.cv?.email || '-' }}</div>
                  <div v-if="app.cv?.phone" class="text-xs text-gray-400">{{ app.cv.phone }}</div>
                </td>
                <!-- Source -->
                <td class="px-4 py-4">
                  <span
                    :class="app.cv?.source === 'spontaneous' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700'"
                    class="px-2 py-1 rounded-full text-xs font-semibold"
                  >
                    {{ app.cv?.source === 'spontaneous' ? 'Spontanée' : 'Sur offre' }}
                  </span>
                </td>
                <!-- Score -->
                <td class="px-4 py-4">
                  <div class="flex items-center gap-2">
                    <div class="w-20 bg-gray-200 rounded-full h-2">
                      <div
                        class="h-2 rounded-full transition-all"
                        :class="getScoreColor(app.score)"
                        :style="`width: ${app.score}%`"
                      ></div>
                    </div>
                    <span class="text-sm font-bold" :class="getScoreTextColor(app.score)">{{ app.score }}%</span>
                  </div>
                </td>
                <!-- Statut -->
                <td class="px-4 py-4">
                  <select
                    :value="app.status"
                    @change="updateStatus(app, ($event.target as HTMLSelectElement).value)"
                    class="text-xs px-2 py-1.5 rounded-lg border font-semibold cursor-pointer focus:ring-1 focus:ring-primary"
                    :class="getStatusSelectClass(app.status)"
                  >
                    <option value="pending">En attente</option>
                    <option value="accepted">Retenu</option>
                    <option value="rejected">Refusé</option>
                  </select>
                </td>
                <!-- CV -->
                <td class="px-4 py-4">
                  <a
                    v-if="app.cv?.cv_path"
                    :href="`/storage/${app.cv.cv_path}`"
                    target="_blank"
                    download
                    class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold rounded-lg bg-green-100 text-green-800 hover:bg-green-200 transition-colors"
                  >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    CV
                  </a>
                  <span v-else class="text-xs text-gray-300">—</span>
                </td>
                <!-- Actions -->
                <td class="px-4 py-4 text-right">
                  <div class="flex items-center justify-end gap-1">
                    <button
                      @click="openDetails(app)"
                      class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                      title="Voir le détail du score"
                    >
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </button>
                    <a
                      v-if="app.cv?.email"
                      :href="`mailto:${app.cv.email}?subject=Re: Candidature – ${selectedOffer?.title}`"
                      class="p-1.5 text-green-600 hover:bg-green-50 rounded-lg transition-colors"
                      title="Répondre par email"
                    >
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                    </a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </template>

    <!-- Modal détail score -->
    <div v-if="selectedApp" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
      <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <!-- Header -->
        <div class="sticky top-0 bg-white border-b px-6 py-4 flex items-center justify-between rounded-t-2xl">
          <h3 class="text-xl font-bold text-gray-900">Détail de la candidature</h3>
          <button @click="selectedApp = null" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <div class="p-6 space-y-5">
          <!-- Candidat -->
          <div class="bg-gray-50 rounded-xl p-4">
            <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Candidat</h4>
            <div class="grid grid-cols-2 gap-3 text-sm">
              <div>
                <p class="text-xs text-gray-400">Nom</p>
                <p class="font-medium text-gray-900">{{ selectedApp.cv?.name }}</p>
              </div>
              <div>
                <p class="text-xs text-gray-400">Email</p>
                <a :href="`mailto:${selectedApp.cv?.email}`" class="font-medium text-primary hover:underline">
                  {{ selectedApp.cv?.email }}
                </a>
              </div>
              <div v-if="selectedApp.cv?.phone">
                <p class="text-xs text-gray-400">Téléphone</p>
                <p class="font-medium text-gray-900">{{ selectedApp.cv.phone }}</p>
              </div>
              <div v-if="selectedApp.cv?.desired_position">
                <p class="text-xs text-gray-400">Poste souhaité</p>
                <p class="font-medium text-gray-900">{{ selectedApp.cv.desired_position }}</p>
              </div>
            </div>
          </div>

          <!-- Score -->
          <div class="bg-white border-2 rounded-xl p-4"
            :class="selectedApp.score >= 70 ? 'border-green-200' : selectedApp.score >= 40 ? 'border-yellow-200' : 'border-red-200'">
            <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Score de correspondance</h4>
            <div class="flex items-center gap-4 mb-3">
              <div class="flex-1 bg-gray-200 rounded-full h-3">
                <div
                  class="h-3 rounded-full"
                  :class="getScoreColor(selectedApp.score)"
                  :style="`width: ${selectedApp.score}%`"
                ></div>
              </div>
              <span class="text-3xl font-bold" :class="getScoreTextColor(selectedApp.score)">
                {{ selectedApp.score }}%
              </span>
            </div>
            <p v-if="selectedApp.raison" class="text-sm text-gray-600 italic leading-relaxed">
              {{ selectedApp.raison }}
            </p>
          </div>

          <!-- Détails JSON -->
          <div v-if="selectedApp.details && Object.keys(selectedApp.details).length > 0" class="bg-gray-50 rounded-xl p-4">
            <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Détails de l'analyse</h4>
            <div class="space-y-2">
              <div
                v-for="(value, key) in selectedApp.details"
                :key="key"
                class="flex items-center justify-between text-sm"
              >
                <span class="text-gray-600 capitalize">{{ key }}</span>
                <span class="font-semibold text-gray-900">{{ value }}</span>
              </div>
            </div>
          </div>

          <!-- Message de motivation -->
          <div v-if="selectedApp.cv?.motivation_message" class="bg-white border border-gray-100 rounded-xl p-4">
            <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Message de motivation</h4>
            <p class="text-sm text-gray-700 whitespace-pre-wrap leading-relaxed">
              {{ selectedApp.cv.motivation_message }}
            </p>
          </div>
        </div>

        <!-- Footer -->
        <div class="sticky bottom-0 bg-gray-50 border-t px-6 py-4 flex justify-end gap-3 rounded-b-2xl">
          <button
            @click="selectedApp = null"
            class="px-5 py-2 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition-colors font-semibold"
          >
            Fermer
          </button>
          <a
            v-if="selectedApp.cv?.email"
            :href="`mailto:${selectedApp.cv.email}?subject=Re: Candidature – ${selectedOffer?.title}`"
            class="px-5 py-2 bg-primary text-white rounded-xl hover:bg-secondary transition-colors font-semibold flex items-center gap-2"
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
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import api from '../../utils/api'

interface JobOffer {
  id: number
  title: string
  spe_particular?: string
  type: string
  status: string
  deadline: string
}

interface Application {
  id: number
  cv_id: number
  job_offer_id: number
  score: number
  status: string
  details?: Record<string, any>
  raison?: string
  cv?: {
    id: number
    name: string
    email: string
    phone?: string
    cv_path?: string
    source: string
    desired_position?: string
    motivation_message?: string
  }
}

const jobOffers = ref<JobOffer[]>([])
const applications = ref<Application[]>([])
const selectedOfferId = ref<number | ''>('')
const loading = ref(false)
const searchQuery = ref('')
const filterStatus = ref('all')
const selectedApp = ref<Application | null>(null)

const selectedOffer = computed(() =>
  jobOffers.value.find(o => o.id === selectedOfferId.value) ?? null
)

const filteredApplications = computed(() => {
  return applications.value.filter(app => {
    const matchesSearch =
      app.cv?.name?.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
      app.cv?.email?.toLowerCase().includes(searchQuery.value.toLowerCase())
    const matchesStatus = filterStatus.value === 'all' || app.status === filterStatus.value
    return matchesSearch && matchesStatus
  })
})

const acceptedCount = computed(() =>
  applications.value.filter(a => a.status === 'accepted').length
)

const avgScore = computed(() => {
  if (!applications.value.length) return '—'
  const avg = applications.value.reduce((sum, a) => sum + a.score, 0) / applications.value.length
  return Math.round(avg) + '%'
})

const fetchJobOffers = async () => {
  try {
    const response = await api.get('/job_offers?paginate=false')
    jobOffers.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur chargement offres', error)
  }
}

const loadApplications = async () => {
  if (!selectedOfferId.value) return
  loading.value = true
  applications.value = []
  searchQuery.value = ''
  filterStatus.value = 'all'
  try {
    const response = await api.get(`/applications?job_offer_id=${selectedOfferId.value}&paginate=false`)
    applications.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur chargement candidatures', error)
  } finally {
    loading.value = false
  }
}

const updateStatus = async (app: Application, newStatus: string) => {
  try {
    await api.put(`/applications/${app.id}`, { status: newStatus })
    app.status = newStatus
  } catch (error) {
    console.error('Erreur mise à jour statut', error)
    alert('Erreur lors de la mise à jour du statut')
  }
}

const openDetails = (app: Application) => {
  selectedApp.value = app
}

const formatDate = (dateString: string) => {
  if (!dateString) return '-'
  return new Date(dateString).toLocaleDateString('fr-FR', {
    day: '2-digit', month: 'long', year: 'numeric'
  })
}

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

const getStatusSelectClass = (status: string) => {
  const classes: Record<string, string> = {
    pending: 'bg-gray-100 text-gray-700 border-gray-200',
    accepted: 'bg-green-100 text-green-800 border-green-200',
    rejected: 'bg-red-100 text-red-700 border-red-200',
  }
  return classes[status] || 'bg-gray-100 text-gray-700 border-gray-200'
}

onMounted(() => fetchJobOffers())
</script>
