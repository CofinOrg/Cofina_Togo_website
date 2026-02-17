<template>
  <div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold text-gray-900">Gestion des Offres d'Emploi</h1>
        <p class="text-sm text-gray-500 mt-1">Créez et gérez vos offres de recrutement</p>
      </div>
      <button
        @click="openCreateModal"
        class="px-4 py-2 bg-primary hover:bg-secondary text-white font-medium rounded-lg transition-colors flex items-center gap-2 shadow-sm"
      >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Nouvelle offre
      </button>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
      <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-200">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Total offres</p>
            <p class="text-2xl font-bold text-gray-900 mt-1">{{ jobOffers.length }}</p>
          </div>
          <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-200">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Actives</p>
            <p class="text-2xl font-bold text-green-600 mt-1">{{ activeOffers }}</p>
          </div>
          <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-200">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Clôturées</p>
            <p class="text-2xl font-bold text-gray-700 mt-1">{{ blockedOffers }}</p>
          </div>
          <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-200">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Expirées bientôt</p>
            <p class="text-2xl font-bold text-orange-600 mt-1">{{ expiringOffers }}</p>
          </div>
          <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
        </div>
      </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-200">
      <div class="flex flex-col md:flex-row gap-4">
        <div class="flex-1">
          <input
            v-model="searchQuery"
            type="text"
            placeholder="Rechercher une offre..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
          />
        </div>
        <select
          v-model="filterStatus"
          class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
        >
          <option value="all">Tous les statuts</option>
          <option value="active">Active</option>
          <option value="blocked">Clôturée</option>
        </select>
        <select
          v-model="filterType"
          class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
        >
          <option value="all">Tous les types</option>
          <option value="cdi">CDI</option>
          <option value="cdd">CDD</option>
          <option value="stage">Stage</option>
        </select>
      </div>
    </div>

    <!-- Job Offers List -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poste</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date limite</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Créé par</th>
              <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-if="isLoading">
              <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                <p class="text-lg">Chargement...</p>
              </td>
            </tr>
            <tr v-else-if="filteredJobOffers.length === 0">
              <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <p class="text-lg font-medium">Aucune offre d'emploi</p>
                <p class="text-sm mt-1">Créez votre première offre pour commencer</p>
              </td>
            </tr>
            <tr v-for="job in filteredJobOffers" :key="job.id" class="hover:bg-gray-50 transition-colors">
              <td class="px-6 py-4">
                <div>
                  <div class="text-sm font-medium text-gray-900">{{ job.title }}</div>
                  <div class="text-sm text-gray-500 truncate max-w-xs">{{ job.summary }}</div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="getTypeClass(job.type)" class="px-2 py-1 text-xs font-medium rounded-full uppercase">
                  {{ job.type }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ formatDate(job.deadline) }}</div>
                <div v-if="isExpiringSoon(job.deadline)" class="text-xs text-orange-600 font-medium">
                  Expire bientôt
                </div>
                <div v-if="isExpired(job.deadline)" class="text-xs text-red-600 font-medium">
                  Expirée
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="getStatusClass(job.status)" class="px-2 py-1 text-xs font-medium rounded-full">
                  {{ job.status === 'active' ? 'Active' : 'Clôturée' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ job.user?.name || '-' }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex items-center justify-end gap-2">
                  <button
                    @click="viewJob(job)"
                    class="text-blue-600 hover:text-blue-900 transition-colors"
                    title="Voir"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                  </button>
                  <button
                    @click="editJob(job)"
                    class="text-green-600 hover:text-green-900 transition-colors"
                    title="Modifier"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </button>
                  <button
                    @click="toggleStatus(job)"
                    :class="job.status === 'active' ? 'text-gray-600 hover:text-gray-900' : 'text-green-600 hover:text-green-900'"
                    class="transition-colors"
                    :title="job.status === 'active' ? 'Clôturer' : 'Réactiver'"
                  >
                    <svg v-if="job.status === 'active'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                    <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </button>
                  <button
                    @click="deleteJob(job.id)"
                    class="text-red-600 hover:text-red-900 transition-colors"
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

    <!-- Create/Edit Job Modal -->
    <Teleport to="body">
      <Transition name="modal">
        <div v-if="showModal" class="fixed inset-0 z-50 overflow-y-auto">
          <div class="flex min-h-screen items-center justify-center p-4">
            <div @click="closeModal" class="fixed inset-0 bg-black/50 bg-opacity-50 transition-opacity"></div>

            <div class="relative bg-white rounded-lg shadow-xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
              <!-- Modal Header -->
              <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between z-10">
                <h2 class="text-xl font-bold text-gray-900">
                  {{ isEditing ? 'Modifier l\'offre' : 'Créer une nouvelle offre' }}
                </h2>
                <button @click="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>

              <!-- Modal Form -->
              <form @submit.prevent="saveJob" class="p-6 space-y-6">
                <!-- Titre -->
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Titre du poste <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model="form.title"
                    type="text"
                    required
                    placeholder="Ex: Chargé d'affaires"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                  />
                </div>

                <!-- Type et Date limite -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Type de contrat <span class="text-red-500">*</span>
                    </label>
                    <select
                      v-model="form.type"
                      required
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                    >
                      <option value="">Sélectionner</option>
                      <option value="cdi">CDI</option>
                      <option value="cdd">CDD</option>
                      <option value="stage">Stage</option>
                    </select>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Date limite <span class="text-red-500">*</span>
                    </label>
                    <input
                      v-model="form.deadline"
                      type="date"
                      required
                      :min="todayDate"
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                    />
                  </div>
                </div>

                <!-- Résumé -->
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Résumé <span class="text-red-500">*</span>
                    <span class="text-gray-400 font-normal">(max 500 caractères)</span>
                  </label>
                  <textarea
                    v-model="form.summary"
                    required
                    rows="2"
                    maxlength="500"
                    placeholder="Bref résumé de l'offre..."
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent resize-none"
                  ></textarea>
                  <p class="text-xs text-gray-400 mt-1">{{ form.summary.length }}/500</p>
                </div>

                <!-- Contenu / Description -->
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Description complète <span class="text-red-500">*</span>
                  </label>
                  <textarea
                    v-model="form.content"
                    required
                    rows="8"
                    maxlength="5000"
                    placeholder="Description détaillée du poste, missions, compétences requises, avantages..."
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent resize-none"
                  ></textarea>
                  <p class="text-xs text-gray-400 mt-1">{{ form.content.length }}/5000</p>
                </div>

                <!-- Lien vers le formulaire de candidature -->
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Lien vers le formulaire de candidature
                  </label>
                  <input
                    v-model="form.form_link"
                    type="url"
                    placeholder="https://example.com/formulaire"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                  />
                </div>

                <!-- Statut -->
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-3">
                    Statut de l'offre
                  </label>
                  <div class="flex gap-4">
                    <label class="flex items-center cursor-pointer px-4 py-3 border-2 rounded-lg transition-colors"
                      :class="form.status === 'active' ? 'border-green-500 bg-green-50' : 'border-gray-300 hover:border-gray-400'"
                    >
                      <input v-model="form.status" type="radio" value="active" class="w-4 h-4 text-green-600 focus:ring-green-500" />
                      <span class="ml-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-900">Active</span>
                      </span>
                    </label>
                    <label class="flex items-center cursor-pointer px-4 py-3 border-2 rounded-lg transition-colors"
                      :class="form.status === 'blocked' ? 'border-gray-500 bg-gray-50' : 'border-gray-300 hover:border-gray-400'"
                    >
                      <input v-model="form.status" type="radio" value="blocked" class="w-4 h-4 text-gray-600 focus:ring-gray-500" />
                      <span class="ml-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="text-sm font-medium text-gray-900">Clôturée</span>
                      </span>
                    </label>
                  </div>
                </div>

                <!-- Message d'erreur -->
                <div v-if="submitError" class="p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                  <p class="font-semibold">Erreur</p>
                  <p class="text-sm">{{ submitError }}</p>
                </div>

                <!-- Actions -->
                <div class="flex gap-3 pt-6 border-t border-gray-200">
                  <button
                    type="button"
                    @click="closeModal"
                    class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors"
                  >
                    Annuler
                  </button>
                  <button
                    type="submit"
                    :disabled="isSubmitting"
                    class="flex-1 px-6 py-3 bg-primary hover:bg-secondary text-white font-medium rounded-lg transition-colors shadow-sm disabled:bg-gray-400 disabled:cursor-not-allowed"
                  >
                    {{ isSubmitting ? 'Enregistrement...' : (isEditing ? 'Mettre à jour' : 'Créer l\'offre') }}
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </Transition>
    </Teleport>

    <!-- View Job Modal -->
    <Teleport to="body">
      <div v-if="viewingJob" class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex min-h-screen items-center justify-center p-4">
          <div @click="viewingJob = null" class="fixed inset-0 bg-black/50 bg-opacity-50 transition-opacity"></div>

          <div class="relative bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between z-10">
              <h2 class="text-xl font-bold text-gray-900">{{ viewingJob.title }}</h2>
              <button @click="viewingJob = null" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>

            <div class="p-6 space-y-4">
              <div class="flex gap-2">
                <span :class="getTypeClass(viewingJob.type)" class="px-3 py-1 text-xs font-medium rounded-full uppercase">
                  {{ viewingJob.type }}
                </span>
                <span :class="getStatusClass(viewingJob.status)" class="px-3 py-1 text-xs font-medium rounded-full">
                  {{ viewingJob.status === 'active' ? 'Active' : 'Clôturée' }}
                </span>
              </div>

              <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm text-gray-500 mb-1">Date limite</p>
                <p class="font-medium">{{ formatDate(viewingJob.deadline) }}</p>
              </div>

              <div>
                <p class="text-sm text-gray-500 mb-1">Résumé</p>
                <p class="text-gray-700">{{ viewingJob.summary }}</p>
              </div>

              <div>
                <p class="text-sm text-gray-500 mb-1">Description complète</p>
                <p class="text-gray-700 whitespace-pre-wrap">{{ viewingJob.content }}</p>
              </div>
              <div>
                <p class="text-sm text-gray-500 mb-1">Lien vers le formulaire</p>
                <p class="text-gray-700 whitespace-pre-wrap">{{ viewingJob.form_link }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Teleport>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import api from '../../utils/api'

interface JobOffer {
  id: number
  title: string
  content: string
  summary: string
  form_link: string
  deadline: string
  type: 'cdi' | 'cdd' | 'stage'
  status: 'active' | 'blocked'
  user?: { name: string }
  created_at: string
}

// State
const showModal = ref(false)
const isEditing = ref(false)
const editingId = ref<number | null>(null)
const searchQuery = ref('')
const filterStatus = ref('all')
const filterType = ref('all')
const isLoading = ref(true)
const isSubmitting = ref(false)
const submitError = ref('')
const viewingJob = ref<JobOffer | null>(null)

// Data
const jobOffers = ref<JobOffer[]>([])

// Form data
const form = ref({
  title: '',
  content: '',
  summary: '',
  form_link: '',
  deadline: '',
  type: '' as 'cdi' | 'cdd' | 'stage' | '',
  status: 'active' as 'active' | 'blocked'
})

// Computed
const todayDate = computed(() => new Date().toISOString().split('T')[0])

const filteredJobOffers = computed(() => {
  return jobOffers.value.filter(job => {
    const matchesSearch = job.title.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                         job.summary.toLowerCase().includes(searchQuery.value.toLowerCase())
    const matchesStatus = filterStatus.value === 'all' || job.status === filterStatus.value
    const matchesType = filterType.value === 'all' || job.type === filterType.value
    return matchesSearch && matchesStatus && matchesType
  })
})

const activeOffers = computed(() => jobOffers.value.filter(j => j.status === 'active').length)
const blockedOffers = computed(() => jobOffers.value.filter(j => j.status === 'blocked').length)
const expiringOffers = computed(() => {
  const today = new Date()
  const inSevenDays = new Date(today.getTime() + 7 * 24 * 60 * 60 * 1000)
  return jobOffers.value.filter(j => {
    const deadline = new Date(j.deadline)
    return j.status === 'active' && deadline >= today && deadline <= inSevenDays
  }).length
})

// Methods
const fetchJobOffers = async () => {
  isLoading.value = true
  try {
    const response = await api.get('/job_offers?with_user=true')
    jobOffers.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur lors du chargement des offres', error)
  } finally {
    isLoading.value = false
  }
}

const resetForm = () => {
  form.value = {
    title: '',
    content: '',
    summary: '',
    form_link: '',
    deadline: '',
    type: '',
    status: 'active'
  }
  submitError.value = ''
}

const openCreateModal = () => {
  resetForm()
  isEditing.value = false
  editingId.value = null
  showModal.value = true
}

const closeModal = () => {
  showModal.value = false
  isEditing.value = false
  editingId.value = null
  resetForm()
}

const saveJob = async () => {
  isSubmitting.value = true
  submitError.value = ''

  try {
    const payload = {
      title: form.value.title,
      content: form.value.content,
      summary: form.value.summary,
      form_link: form.value.form_link,
      deadline: form.value.deadline,
      type: form.value.type,
      status: form.value.status
    }

    if (isEditing.value && editingId.value !== null) {
      await api.put(`/job_offers/${editingId.value}`, payload)
    } else {
      await api.post('/job_offers', payload)
    }

    closeModal()
    await fetchJobOffers()
  } catch (error: any) {
    console.error('Erreur lors de la sauvegarde', error)
    if (error.response?.data?.errors) {
      const errors = error.response.data.errors
      submitError.value = Object.values(errors).flat().join(', ')
    } else {
      submitError.value = 'Une erreur est survenue. Veuillez réessayer.'
    }
  } finally {
    isSubmitting.value = false
  }
}

const viewJob = (job: JobOffer) => {
  viewingJob.value = job
}

const editJob = (job: JobOffer) => {
  isEditing.value = true
  editingId.value = job.id
  form.value = {
    title: job.title,
    content: job.content,
    summary: job.summary,
    form_link: job.form_link,
    deadline: job.deadline,
    type: job.type,
    status: job.status
  }
  showModal.value = true
}

const deleteJob = async (id: number) => {
  if (!confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')) return

  try {
    await api.delete(`/job_offers/${id}`)
    await fetchJobOffers()
  } catch (error) {
    console.error('Erreur lors de la suppression', error)
    alert('Erreur lors de la suppression')
  }
}

const toggleStatus = async (job: JobOffer) => {
  const newStatus = job.status === 'active' ? 'blocked' : 'active'
  try {
    await api.put(`/job_offers/${job.id}`, { status: newStatus })
    await fetchJobOffers()
  } catch (error) {
    console.error('Erreur lors du changement de statut', error)
    alert('Erreur lors du changement de statut')
  }
}

const getTypeClass = (type: string) => {
  const classes: Record<string, string> = {
    'cdi': 'bg-blue-100 text-blue-800',
    'cdd': 'bg-purple-100 text-purple-800',
    'stage': 'bg-yellow-100 text-yellow-800'
  }
  return classes[type] || 'bg-gray-100 text-gray-800'
}

const getStatusClass = (status: string) => {
  return status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'
}

const formatDate = (dateString: string) => {
  if (!dateString) return '-'
  const date = new Date(dateString)
  return new Intl.DateTimeFormat('fr-FR', {
    day: '2-digit',
    month: 'long',
    year: 'numeric'
  }).format(date)
}

const isExpiringSoon = (deadline: string) => {
  const today = new Date()
  const deadlineDate = new Date(deadline)
  const diffDays = Math.ceil((deadlineDate.getTime() - today.getTime()) / (1000 * 60 * 60 * 24))
  return diffDays > 0 && diffDays <= 7
}

const isExpired = (deadline: string) => {
  return new Date(deadline) < new Date()
}

// Init
onMounted(() => {
  fetchJobOffers()
})
</script>

<style scoped>
.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}
</style>
