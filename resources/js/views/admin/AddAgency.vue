<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4">
    <div class="max-w-5xl mx-auto">
      <!-- En-tête -->
      <div class="mb-8 flex items-center justify-between">
        <div>
          <h1 class="text-4xl font-bold text-gray-900 mb-2">Gestion des agences</h1>
          <p class="text-gray-600">Gérez, créez et modifiez vos agences</p>
        </div>
        <button
          @click="scrollToForm"
          class="px-6 py-3 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Ajouter une agence
        </button>
      </div>

      <!-- Section Tableau des agences -->
      <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Liste des agences</h2>

        <!-- Barre de recherche et filtres -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6">
          <div class="flex-1">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Rechercher par nom..."
              class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
            />
          </div>
          <select
            v-model="filterType"
            class="px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
          >
            <option value="all">Tous les types</option>
            <option value="agency">Agence</option>
            <option value="seat">Siège</option>
          </select>
        </div>

        <!-- Tableau -->
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Auteur</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Coordonnées</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <!-- État vide -->
              <tr v-if="filteredAgences.length === 0">
                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                  <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <p class="text-lg font-medium">Aucune agence trouvée</p>
                  <p class="text-sm">Commencez par ajouter votre première agence</p>
                </td>
              </tr>
              <!-- Lignes du tableau -->
              <tr v-for="agence in filteredAgences" :key="agence.id" class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">{{ agence.name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                    {{ agence.type_fr }}
                  </span>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">{{ agence.user?.name  || '-'}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ agence.contact }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-xs text-gray-500">
                    {{ agence.latitude }}, {{ agence.longitude }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex items-center gap-2">
                    <!-- Modifier -->
                    <button
                      @click="editAgence(agence)"
                      class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                      title="Modifier"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </button>
                    <!-- Supprimer -->
                    <button
                      @click="deleteAgence(agence.id)"
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

      <!-- Section Formulaire -->
      <div ref="formSection" class="bg-white rounded-2xl shadow-xl p-8 space-y-8">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-xl font-bold text-gray-900">
              {{ isEditing ? 'Modifier l\'agence' : 'Ajouter une agence' }}
            </h2>
            <p class="text-gray-600 mt-1">
              {{ isEditing ? 'Modifiez les informations de l\'agence' : 'Renseignez les informations de la nouvelle agence' }}
            </p>
          </div>
          <button
            v-if="isEditing"
            @click="cancelEdit"
            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all font-semibold flex items-center gap-2"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Annuler la modification
          </button>
        </div>

        <!-- Nom -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">
            Nom de l'agence
          </label>
          <input
            v-model="agence.name"
            type="text"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg"
            placeholder="Ex: Agence Lomé Centre"
          />
        </div>

        <!-- Type et Contact -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">
              Type
            </label>
            <select
              v-model="agence.type"
              class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
            >
              <option value="" disabled>Sélectionnez un type</option>
              <option value="agency">Agence</option>
              <option value="seat">Siège</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">
              Contact
            </label>
            <input
              v-model="agence.contact"
              type="text"
              class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
              placeholder="Ex: 22315680"
            />
          </div>
        </div>

        <!-- Adresse -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">
            Adresse
          </label>
          <input
            v-model="agence.adress"
            type="text"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
            placeholder="Ex: Boulevard du 13 Janvier, Lomé"
          />
        </div>

        <!-- Latitude et Longitude -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">
              Latitude
            </label>
            <input
              v-model="agence.latitude"
              type="number"
              step="any"
              class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
              placeholder="Ex: 6.1319"
            />
          </div>
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">
              Longitude
            </label>
            <input
              v-model="agence.longitude"
              type="number"
              step="any"
              class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
              placeholder="Ex: 1.2228"
            />
          </div>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t">
          <button
            @click="saveAgence"
            class="flex-1 px-6 py-3 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2"
          >
      
            {{ isEditing ? 'Sauvegarder les modifications' : 'Ajouter l\'agence' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import api from '../../utils/api'

// État de la liste
const agences = ref<any[]>([])
const searchQuery = ref('')
const filterType = ref('all')

// État du formulaire
const isEditing = ref(false)
const editingId = ref<number | null>(null)

const agence = ref({
  name: '',
  type: '',
  adress: '',
  contact: '',
  latitude: '',
  longitude: ''
})

const formSection = ref<HTMLElement | null>(null)

// Computed pour filtrer les agences
const filteredAgences = computed(() => {
  return agences.value.filter(a => {
    const matchesSearch = a.name.toLowerCase().includes(searchQuery.value.toLowerCase())
    const matchesType = filterType.value === 'all' || a.type === filterType.value
    return matchesSearch && matchesType
  })
})

// Charger la liste des agences
const fetchAgences = async () => {
  try {
    const response = await api.get('/agences?with_user=true')
    agences.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur lors du chargement des agences', error)
  }
}

// Scroller vers le formulaire
const scrollToForm = () => {
  formSection.value?.scrollIntoView({ behavior: 'smooth' })
}

// Passer en mode édition
const editAgence = (item: any) => {
  isEditing.value = true
  editingId.value = item.id
  agence.value = {
    name: item.name || '',
    type: item.type || '',
    adress: item.adress || '',
    contact: item.contact || '',
    latitude: item.latitude || '',
    longitude: item.longitude || ''
  }
  scrollToForm()
}

// Annuler l'édition
const cancelEdit = () => {
  isEditing.value = false
  editingId.value = null
  agence.value = {
    name: '',
    type: '',
    adress: '',
    contact: '',
    latitude: '',
    longitude: ''
  }
}

// Supprimer une agence
const deleteAgence = async (id: number) => {
  if (!confirm('Êtes-vous sûr de vouloir supprimer cette agence ?')) return

  try {
    await api.delete(`/agences/${id}`)
    await fetchAgences()
    if (editingId.value === id) {
      cancelEdit()
    }
    alert('Agence supprimée avec succès')
  } catch (error) {
    console.error('Erreur lors de la suppression', error)
    alert('Erreur lors de la suppression')
  }
}

// Sauvegarder (créer ou mettre à jour)
const saveAgence = async () => {
  if (!agence.value.name || !agence.value.type || !agence.value.adress || !agence.value.contact || !agence.value.latitude || !agence.value.longitude) {
    alert('Veuillez remplir tous les champs obligatoires')
    return
  }

  const payload = {
    name: agence.value.name,
    type: agence.value.type,
    adress: agence.value.adress,
    contact: agence.value.contact,
    latitude: parseFloat(agence.value.latitude),
    longitude: parseFloat(agence.value.longitude)
  }

  try {
    if (isEditing.value && editingId.value) {
      await api.put(`/agences/${editingId.value}`, payload)
      alert('Agence mise à jour avec succès !')
    } else {
      await api.post('/agences', payload)
      alert('Agence ajoutée avec succès !')
    }

    cancelEdit()
    await fetchAgences()
  } catch (error) {
    console.error("Erreur lors de l'appel de l'API", error)
    alert('Erreur lors de la sauvegarde')
  }
}

// Charger les agences au montage
onMounted(() => {
  fetchAgences()
})
</script>
