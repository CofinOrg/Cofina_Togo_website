<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4">
    <div class="max-w-5xl mx-auto">
      <!-- En-tête -->
      <div class="mb-8 flex items-center justify-between">
        <div>
          <h1 class="text-4xl font-bold text-gray-900 mb-2">Gestion des slides</h1>
          <p class="text-gray-600">Gérez, créez et modifiez vos slides</p>
        </div>
        <button
          @click="scrollToForm"
          class="px-6 py-3 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Ajouter un Slide
        </button>
      </div>

      <!-- Section Tableau des slides -->
      <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Liste des slides</h2>

        <!-- Barre de recherche et filtres -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6">
          <div class="flex-1">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Rechercher..."
              class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
            />
          </div>
          <select
            v-model="filterStatus"
            class="px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
          >
            <option value="all">Tous les statuts</option>
            <option value="published">Publié</option>
            <option value="draft">Brouillon</option>
          </select>
        </div>

        <!-- Tableau -->
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slide</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Auteur</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <!-- État vide -->
              <tr v-if="filteredSliders.length === 0">
                <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                  <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <p class="text-lg font-medium">Aucun slide trouvé</p>
                  <p class="text-sm">Commencez par ajouter votre premier slide</p>
                </td>
              </tr>
              <!-- Lignes du tableau -->
              <tr v-for="item in filteredSliders" :key="item.id" class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                  <div class="flex items-center gap-3">
                    <img
                      v-if="item.slide_path"
                      :src="item.slide_path"
                      alt="Slide"
                      class="w-16 h-10 object-cover rounded"
                    />
                    <span class="text-sm text-gray-500 truncate max-w-[200px]">{{ }}</span>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm font-medium text-gray-900">{{ item.user?.name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    :class="item.is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'"
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                  >
                    {{ item.is_published ? 'Publié' : 'Brouillon' }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex items-center gap-2">
                    <!-- Modifier -->
                    <button
                      @click="editSlider(item)"
                      class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                      title="Modifier"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </button>
                    <!-- Supprimer -->
                    <button
                      @click="deleteSlider(item.id)"
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
              {{ isEditing ? 'Modifier le slide' : 'Ajouter un slide' }}
            </h2>
            <p class="text-gray-600 mt-1">
              {{ isEditing ? 'Modifiez les informations du slide' : 'Renseignez les informations du nouveau slide' }}
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

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">
            Image du slide
          </label>
          <input
            type="file"
            accept="image/*"
            @change="handleFileUpload"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
          />
          <!-- Aperçu -->
          <div v-if="previewUrl" class="mt-3">
            <img :src="previewUrl" alt="Aperçu" class="max-h-40 rounded-lg border" />
          </div>
        </div>

        <!-- Statut -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">
            Statut de publication
          </label>
          <select
            v-model="slider.is_published"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
          >
            <option value="" disabled>Sélectionnez un statut</option>
            <option :value="true">Publié</option>
            <option :value="false">Brouillon</option>
          </select>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t">
          <button
            @click="saveSlider"
            class="flex-1 px-6 py-3 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2"
          >
            {{ isEditing ? 'Sauvegarder les modifications' : 'Ajouter le slide' }}
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
const sliders = ref<any[]>([])
const searchQuery = ref('')
const filterStatus = ref('all')

// État du formulaire
const isEditing = ref(false)
const editingId = ref<number | null>(null)
const selectedFile = ref<File | null>(null)
const previewUrl = ref('')

const slider = ref({
  is_published: '' as string | boolean,
})

const formSection = ref<HTMLElement | null>(null)

// Computed pour filtrer les slides
const filteredSliders = computed(() => {
  return sliders.value.filter(a => {
    const matchesSearch = (a.slide_path || '').toLowerCase().includes(searchQuery.value.toLowerCase())
    const matchesStatus =
      filterStatus.value === 'all' ||
      (filterStatus.value === 'published' && a.is_published) ||
      (filterStatus.value === 'draft' && !a.is_published)
    return matchesSearch && matchesStatus
  })
})

// Charger la liste des slides
const fetchSliders = async () => {
  try {
    const response = await api.get('/sliders?with_user=true')
    sliders.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur lors du chargement des slides', error)
  }
}

// Gérer la sélection de fichier
const handleFileUpload = (event: Event) => {
  const input = event.target as HTMLInputElement
  const file = input.files?.[0]
  if (!file) return
  selectedFile.value = file
  previewUrl.value = URL.createObjectURL(file)
}

// Scroller vers le formulaire
const scrollToForm = () => {
  formSection.value?.scrollIntoView({ behavior: 'smooth' })
}

// Passer en mode édition
const editSlider = (item: any) => {
  isEditing.value = true
  editingId.value = item.id
  selectedFile.value = null
  previewUrl.value = item.slide_path || ''
  slider.value = {
    is_published: !!item.is_published,
  }
  scrollToForm()
}

// Annuler l'édition
const cancelEdit = () => {
  isEditing.value = false
  editingId.value = null
  selectedFile.value = null
  previewUrl.value = ''
  slider.value = {
    is_published: '',
  }
}

// Supprimer un slide
const deleteSlider = async (id: number) => {
  if (!confirm('Êtes-vous sûr de vouloir supprimer ce slide ?')) return

  try {
    await api.delete(`/sliders/${id}`)
    await fetchSliders()
    if (editingId.value === id) {
      cancelEdit()
    }
    alert('Slide supprimé avec succès')
  } catch (error) {
    console.error('Erreur lors de la suppression', error)
    alert('Erreur lors de la suppression')
  }
}

// Sauvegarder (créer ou mettre à jour)
const saveSlider = async () => {
  if ((!selectedFile.value && !isEditing.value) || slider.value.is_published === '') {
    alert('Veuillez remplir tous les champs obligatoires')
    return
  }

  const formData = new FormData()
  if (selectedFile.value) {
    formData.append('slide_path', selectedFile.value)
  }
  formData.append('is_published', slider.value.is_published ? '1' : '0')

  try {
    if (isEditing.value && editingId.value) {
      formData.append('_method', 'PUT')
      await api.post(`/sliders/${editingId.value}`, formData, {
        headers: { 'Content-Type': 'multipart/form-data' },
      })
      alert('Slide mis à jour avec succès !')
    } else {
      await api.post('/sliders', formData, {
        headers: { 'Content-Type': 'multipart/form-data' },
      })
      alert('Slide ajouté avec succès !')
    }

    cancelEdit()
    await fetchSliders()
  } catch (error) {
    console.error("Erreur lors de l'appel de l'API", error)
    alert('Erreur lors de la sauvegarde')
  }
}

// Charger les slides au montage
onMounted(() => {
  fetchSliders()
})
</script>
