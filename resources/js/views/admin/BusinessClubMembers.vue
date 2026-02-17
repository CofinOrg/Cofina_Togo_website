<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4">
    <div class="max-w-7xl mx-auto">
      <!-- En-tete -->
      <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Business Club Members</h1>
        <p class="text-gray-600">Gerez les demandes d'adhesion au club Cofina Business Touch</p>
      </div>

      <!-- Section Tableau -->
      <div class="bg-white rounded-2xl shadow-xl p-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
          <h2 class="text-xl font-bold text-gray-900">Liste des membres</h2>
          <div class="text-sm text-gray-500">
            {{ members.length }} membre(s) au total
          </div>
        </div>

        <!-- Barre de recherche -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6">
          <div class="flex-1">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Rechercher par nom, email ou profession..."
              class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none"
            />
          </div>
        </div>

        <!-- Tableau -->
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Membre</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profession</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">N° Compte</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <!-- Etat vide -->
              <tr v-if="filteredMembers.length === 0">
                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                  <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <p class="text-lg font-medium">Aucun membre trouve</p>
                  <p class="text-sm">Les demandes d'adhesion apparaitront ici</p>
                </td>
              </tr>
              <!-- Lignes du tableau -->
              <tr v-for="member in filteredMembers" :key="member.id" class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">{{ member.name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ member.email }}</div>
                  <div v-if="member.phone" class="text-xs text-gray-500">{{ member.phone }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ member.job || '-' }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800">
                    {{ member.account_number }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-500">{{ formatDate(member.created_at) }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex items-center gap-2">
                    <!-- Voir details -->
                    <button
                      @click="openDetails(member)"
                      class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                      title="Voir les details"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </button>
                    <!-- Envoyer email -->
                    <a
                      :href="`mailto:${member.email}`"
                      class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors"
                      title="Envoyer un email"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                    </a>
                    <!-- Supprimer -->
                    <button
                      @click="deleteMember(member.id)"
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

      <!-- Modal Details -->
      <div v-if="selectedMember" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
          <!-- Header Modal -->
          <div class="sticky top-0 bg-white border-b px-6 py-4 flex items-center justify-between rounded-t-2xl">
            <h3 class="text-xl font-bold text-gray-900">Details du membre</h3>
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
            <!-- Informations membre -->
            <div class="bg-gray-50 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Informations du membre</h4>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <p class="text-xs text-gray-500">Nom complet</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedMember.name }}</p>
                </div>
                <div>
                  <p class="text-xs text-gray-500">Email</p>
                  <a :href="`mailto:${selectedMember.email}`" class="text-sm font-medium text-primary hover:underline">
                    {{ selectedMember.email }}
                  </a>
                </div>
                <div>
                  <p class="text-xs text-gray-500">Telephone</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedMember.phone || '-' }}</p>
                </div>
                <div>
                  <p class="text-xs text-gray-500">Profession</p>
                  <p class="text-sm font-medium text-gray-900">{{ selectedMember.job || '-' }}</p>
                </div>
              </div>
            </div>

            <!-- Compte -->
            <div class="bg-amber-50 rounded-xl p-4">
              <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Compte Cofina</h4>
              <div>
                <p class="text-xs text-gray-500">Numero de compte</p>
                <p class="text-lg font-bold text-amber-800">{{ selectedMember.account_number }}</p>
              </div>
            </div>

            <!-- Date d'inscription -->
            <div class="text-center text-sm text-gray-500">
              Demande recue le {{ formatDate(selectedMember.created_at) }}
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
              :href="`mailto:${selectedMember.email}`"
              class="px-6 py-2 bg-primary text-white rounded-xl hover:bg-secondary transition-colors font-semibold flex items-center gap-2"
            >
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              Contacter
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

const members = ref<any[]>([])
const searchQuery = ref('')
const selectedMember = ref<any>(null)

const filteredMembers = computed(() => {
  return members.value.filter(m => {
    const query = searchQuery.value.toLowerCase()
    return (
      m.name?.toLowerCase().includes(query) ||
      m.email?.toLowerCase().includes(query) ||
      m.job?.toLowerCase().includes(query)
    )
  })
})

const fetchMembers = async () => {
  try {
    const response = await api.get('/business_club_members')
    members.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur lors du chargement des membres', error)
  }
}

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

const openDetails = (member: any) => {
  selectedMember.value = member
}

const closeDetails = () => {
  selectedMember.value = null
}

const deleteMember = async (id: number) => {
  if (!confirm('Etes-vous sur de vouloir supprimer ce membre ?')) return

  try {
    await api.delete(`/business_club_members/${id}`)
    await fetchMembers()
    alert('Membre supprime avec succes')
  } catch (error) {
    console.error('Erreur lors de la suppression', error)
    alert('Erreur lors de la suppression')
  }
}

onMounted(() => {
  fetchMembers()
})
</script>
