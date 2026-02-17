<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4">
    <div class="max-w-5xl mx-auto">
      <!-- En-tête -->
      <div class="mb-8 flex items-center justify-between">
        <div>
          <h1 class="text-4xl font-bold text-gray-900 mb-2">Gestion des articles</h1>
          <p class="text-gray-600">Gérez, créez et modifiez vos articles de blog</p>
        </div>
        <button
          @click="scrollToForm"
          class="px-6 py-3 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Créer un article
        </button>
      </div>

      <!-- Section Tableau des articles -->
      <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Liste des articles</h2>

        <!-- Barre de recherche et filtres -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6">
          <div class="flex-1">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Rechercher par titre..."
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
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Auteur</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <!-- État vide -->
              <tr v-if="filteredBlogs.length === 0">
                <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                  <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                  </svg>
                  <p class="text-lg font-medium">Aucun article trouvé</p>
                  <p class="text-sm">Commencez par créer votre premier article</p>
                </td>
              </tr>
              <!-- Lignes du tableau -->
              <tr v-for="blog in filteredBlogs" :key="blog.id" class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                  <img
                    v-if="blog.coverImage"
                    :src="blog.coverImage.startsWith('http') || blog.coverImage.startsWith('data:') ? blog.coverImage : '/storage/' + blog.coverImage"
                    alt="Couverture"
                    class="h-12 w-16 object-cover rounded-lg"
                  />
                  <div v-else class="h-12 w-16 bg-gray-200 rounded-lg flex items-center justify-center">
                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm font-medium text-gray-900">{{ blog.title }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ blog.user?.name || '—' }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    :class="blog.status === 'published'
                      ? 'bg-green-100 text-green-800'
                      : 'bg-yellow-100 text-yellow-800'"
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                  >
                    {{ blog.status === 'published' ? 'Publié' : 'Brouillon' }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ new Date(blog.created_at).toLocaleDateString('fr-FR') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex items-center gap-2">
                    <!-- Modifier -->
                    <button
                      @click="editBlog(blog)"
                      class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                      title="Modifier"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </button>
                    <!-- Supprimer -->
                    <button
                      @click="deleteBlog(blog.id)"
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
              {{ isEditing ? 'Modifier l\'article' : 'Créer un article' }}
            </h2>
            <p class="text-gray-600 mt-1">
              {{ isEditing ? 'Modifiez les informations de l\'article' : 'Rédigez et publiez votre contenu' }}
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

        <!-- Titre -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">
            Titre de l'article
          </label>
          <input
            v-model="article.title"
            type="text"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg"
            placeholder="Un titre accrocheur..."
          />
        </div>

        <!-- Résumé -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">
            Résumé
          </label>
          <textarea
            v-model="article.summary"
            rows="3"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none resize-none"
            placeholder="Un bref résumé de votre article..."
          ></textarea>
          <p class="mt-2 text-sm text-gray-500">
            {{ article.summary.length }} / 200 caractères
          </p>
        </div>

        <!-- Image de couverture -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">
            Image de couverture
          </label>

          <!-- Zone d'upload -->
          <div
            v-if="!article.coverImage"
            class="relative border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-blue-500 transition-all cursor-pointer bg-gray-50 hover:bg-blue-50"
            @click="() => coverImageInput?.click()"
            @dragover.prevent="isDragging = true"
            @dragleave.prevent="isDragging = false"
            @drop.prevent="handleDrop"
            :class="{ 'border-blue-500 bg-blue-50': isDragging }"
          >
            <svg
              class="mx-auto h-12 w-12 text-gray-400"
              stroke="currentColor"
              fill="none"
              viewBox="0 0 48 48"
            >
              <path
                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            <p class="mt-4 text-sm text-gray-600">
              <span class="font-semibold text-blue-600">Cliquez pour uploader</span>
              ou glissez-déposez
            </p>
            <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF jusqu'à 5MB</p>
          </div>

          <!-- Prévisualisation -->
          <div v-else class="relative rounded-xl overflow-hidden group">
            <img
              :src="coverImagePreview"
              alt="Aperçu"
              class="w-full h-64 object-cover"
            />
            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all flex items-center justify-center">
              <button
                @click="removeCoverImage"
                class="opacity-0 group-hover:opacity-100 transition-all px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 flex items-center gap-2"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Supprimer
              </button>
            </div>
          </div>

          <input
            ref="coverImageInput"
            type="file"
            accept="image/*"
            class="hidden"
            @change="handleCoverImageUpload"
          />
        </div>

        <!-- Éditeur de contenu -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">
            Contenu de l'article
          </label>
          <QuillEditor :key="editorKey" v-model="article.content" />
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t">
          <button
            @click="saveDraft"
            class="flex-1 px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all font-semibold flex items-center justify-center gap-2"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
            </svg>
            {{ isEditing ? 'Enregistrer comme brouillon' : 'Enregistrer brouillon' }}
          </button>
          <button
            @click="publish"
            class="flex-1 px-6 py-3 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2"
          >

            {{ isEditing ? 'Sauvegarder et publier' : 'Publier l\'article' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import QuillEditor from '../../components/Quilleditor.vue'
import api from '../../utils/api'

const editorKey = ref(0)

// État de la liste
const blogs = ref<any[]>([])
const searchQuery = ref('')
const filterStatus = ref('all')

// État du formulaire
const isEditing = ref(false)
const editingId = ref<number | null>(null)

const article = ref({
  title: '',
  summary: '',
  coverImage: '',
  content: ''
})

const coverImageInput = ref<HTMLInputElement | null>(null)
const isDragging = ref(false)
const formSection = ref<HTMLElement | null>(null)

// Computed pour le preview de l'image (gère base64 et chemins serveur)
const coverImagePreview = computed(() => {
  const img = article.value.coverImage
  if (!img) return ''
  if (img.startsWith('data:') || img.startsWith('http')) return img
  return '/storage/' + img
})

// Computed pour filtrer les blogs
const filteredBlogs = computed(() => {
  return blogs.value.filter(blog => {
    const matchesSearch = blog.title.toLowerCase().includes(searchQuery.value.toLowerCase())
    const matchesStatus = filterStatus.value === 'all' || blog.status === filterStatus.value
    return matchesSearch && matchesStatus
  })
})

// Charger la liste des blogs
const fetchBlogs = async () => {
  try {
    const response = await api.get('/blogs?with_user=true')
    blogs.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur lors du chargement des articles', error)
  }
}

// Scroller vers le formulaire
const scrollToForm = () => {
  formSection.value?.scrollIntoView({ behavior: 'smooth' })
}

// Passer en mode édition
const editBlog = (blog: any) => {
  isEditing.value = true
  editingId.value = blog.id
  article.value = {
    title: blog.title || '',
    summary: blog.summary || '',
    coverImage: blog.coverImage || '',
    content: blog.content || ''
  }
  editorKey.value++
  scrollToForm()
}

// Annuler l'édition
const cancelEdit = () => {
  isEditing.value = false
  editingId.value = null
  article.value = {
    title: '',
    summary: '',
    coverImage: '',
    content: ''
  }
  editorKey.value++
}

// Supprimer un blog
const deleteBlog = async (id: number) => {
  if (!confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) return

  try {
    await api.delete(`/blogs/${id}`)
    await fetchBlogs()
    // Si on était en train d'éditer cet article, annuler l'édition
    if (editingId.value === id) {
      cancelEdit()
    }
    alert('Article supprimé avec succès')
  } catch (error) {
    console.error('Erreur lors de la suppression', error)
    alert('Erreur lors de la suppression')
  }
}

// Upload et gestion d'image
const handleCoverImageUpload = async (event: Event) => {
  const input = event.target as HTMLInputElement
  const file = input.files?.[0]

  if (!file) return

  if (!file.type.startsWith('image/')) {
    alert('Veuillez sélectionner une image valide')
    return
  }

  if (file.size > 5 * 1024 * 1024) {
    alert('Image trop volumineuse (max 5MB)')
    return
  }

  const base64 = await convertToBase64(file)
  article.value.coverImage = base64
}

const handleDrop = async (event: DragEvent) => {
  isDragging.value = false
  const file = event.dataTransfer?.files[0]

  if (!file) return

  if (!file.type.startsWith('image/')) {
    alert('Veuillez déposer une image valide')
    return
  }

  if (file.size > 5 * 1024 * 1024) {
    alert('Image trop volumineuse (max 5MB)')
    return
  }

  const base64 = await convertToBase64(file)
  article.value.coverImage = base64
}

const convertToBase64 = (file: File): Promise<string> => {
  return new Promise((resolve, reject) => {
    const reader = new FileReader()
    reader.onload = () => resolve(reader.result as string)
    reader.onerror = reject
    reader.readAsDataURL(file)
  })
}

const removeCoverImage = () => {
  article.value.coverImage = ''
  if (coverImageInput.value) {
    coverImageInput.value.value = ''
  }
}

// Sauvegarder (créer ou mettre à jour)
const saveArticle = async (status: string) => {
  const payload = {
    ...article.value,
    status
  }

  try {
    if (isEditing.value && editingId.value) {
      await api.put(`/blogs/${editingId.value}`, payload)
      alert(status === 'published' ? 'Article mis à jour et publié !' : 'Brouillon mis à jour !')
    } else {
      await api.post('/blogs', payload)
      alert(status === 'published' ? 'Article publié avec succès !' : 'Brouillon sauvegardé !')
    }

    // Réinitialiser le formulaire
    cancelEdit()
    await fetchBlogs()
  } catch (error) {
    console.error("Erreur lors de l'appel de l'API", error)
    alert('Erreur lors de la sauvegarde')
  }
}

const saveDraft = () => saveArticle('draft')

const publish = () => {
  if (!article.value.title || !article.value.content) {
    alert('Veuillez remplir au minimum le titre et le contenu')
    return
  }
  saveArticle('published')
}

// Charger les blogs au montage
onMounted(() => {
  fetchBlogs()
})
</script>
