<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4">
    <div class="max-w-5xl mx-auto">
      <!-- En-tête -->
      <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Créer un article</h1>
        <p class="text-gray-600">Rédigez et publiez votre contenu</p>
      </div>

      <!-- Formulaire -->
      <div class="bg-white rounded-2xl shadow-xl p-8 space-y-8">
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
              :src="article.coverImage"
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
          <QuillEditor v-model="article.content" />
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
            Enregistrer brouillon
          </button>
          <button
            @click="publish"
            class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Publier l'article
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import QuillEditor from '../../components/Quilleditor.vue'
import api from '../../utils/api'

// Définir l'objet article comme ref
const article = ref({
  title: '',
  summary: '',
  coverImage: '',
  content: ''
})

const coverImageInput = ref<HTMLInputElement | null>(null)
const isDragging = ref(false)

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

const saveDraft = async () => {
  try {
    const result = await api.post('/blogs', {
      ...article.value,
      status: 'draft'
    })
    alert('Brouillon sauvegardé ✓')
  } catch (error) {
    console.error("Erreur lors de l'appel de l'API", error)
    alert('Erreur lors de la sauvegarde')
  }
}

const publish = async () => {
  if (!article.value.title || !article.value.content) {
    alert('Veuillez remplir au minimum le titre et le contenu')
    return
  }

  try {
    const result = await api.post('/blogs', {
      ...article.value,
      status: 'published'
    })
    alert('Article publié avec succès !')
    // Réinitialiser le formulaire après publication
    article.value = {
      title: '',
      summary: '',
      coverImage: '',
      content: ''
    }
  } catch (error) {
    console.error("Erreur lors de l'appel de l'API", error)
    alert('Erreur lors de la publication')
  }
}
</script>
