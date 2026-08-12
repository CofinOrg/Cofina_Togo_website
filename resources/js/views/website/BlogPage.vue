<script setup>
import { ref, onMounted, watch, computed } from 'vue'
import { Calendar, ArrowLeft, Share2 } from 'lucide-vue-next'
import defaultImage from '@/assets/images/blog/close-up-colleagues-shaking-hands(1).jpg'
import api from '../../utils/api'

const props = defineProps({
  id: {
    type: [String, Number],
    required: true
  }
})

const article = ref(null)
const allBlogs = ref([])
const loading = ref(true)

const getCoverUrl = (coverImage) => {
  if (!coverImage) return defaultImage
  if (coverImage.startsWith('http')) return coverImage
  return `/storage/${coverImage}`
}

const formatDate = (dateStr) => {
  if (!dateStr) return ''
  const date = new Date(dateStr)
  return date.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' })
}

const fetchArticle = async (id) => {
  loading.value = true
  try {
    const res = await api.get(`/blogs/${id}`)
    const rawData = res.data.data ?? res.data
    const blog = rawData.Blog ?? rawData
    article.value = {
      id: blog.id,
      title: blog.title,
      heroImage: getCoverUrl(blog.coverImage),
      content: blog.content,
      summary: blog.summary,
      date: formatDate(blog.published_at || blog.created_at),
    }
  } catch (error) {
    console.error('Erreur lors du chargement de l\'article', error)
  } finally {
    loading.value = false
  }
}

const fetchAllBlogs = async () => {
  try {
    const res = await api.get('/blogs')
    allBlogs.value = res.data.data ?? res.data
  } catch (error) {
    console.error('Erreur lors du chargement des blogs', error)
  }
}

const relatedArticles = computed(() => {
  return allBlogs.value
    .filter(a => a.id !== Number(props.id))
    .slice(0, 3)
    .map(a => ({
      id: a.id,
      image: getCoverUrl(a.coverImage),
      title: a.title,
      excerpt: a.summary || ''
    }))
})

onMounted(() => {
  fetchArticle(props.id)
  fetchAllBlogs()
})

watch(() => props.id, (newId) => {
  fetchArticle(newId)
})

const goBack = () => {
  window.history.back()
}
</script>

<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Chargement -->
    <div v-if="loading" class="flex items-center justify-center min-h-screen">
      <div class="text-gray-500 text-lg">Chargement...</div>
    </div>

    <!-- Article non trouvé -->
    <div v-else-if="!article" class="flex items-center justify-center min-h-screen">
      <div class="text-center">
        <p class="text-gray-500 text-lg mb-4">Article introuvable</p>
        <button @click="goBack" class="text-primary font-semibold hover:underline">Retour</button>
      </div>
    </div>

    <template v-else>
      <!-- Hero image avec bandeau rouge par-dessus -->
      <section class="relative">
        <!-- Image de fond -->
        <div class="h-64 md:h-80 lg:h-96">
          <img
            :src="article.heroImage"
            :alt="article.title"
            class="w-full h-full object-cover"
          >
          <!-- Overlay sombre -->
          <div class="absolute inset-0 bg-black/40"></div>
        </div>

        <!-- Bandeau rouge superposé en bas de l'image -->
        <div class="absolute bottom-0 left-0 right-0 bg-linear-to-r from-primary to-secondary text-white py-6 md:py-8">
          <div class="max-w-300 mx-auto px-4 lg:px-8">
            <!-- Boutons d'action en haut -->
            <div class="flex items-center justify-between mb-4">
              <button
                @click="goBack"
                class="inline-flex items-center gap-2 text-white hover:text-gray-200 transition-colors text-sm"
              >
                <ArrowLeft :size="18" />
                <span class="hidden sm:inline">Retour aux actualités</span>
                <span class="sm:hidden">Retour</span>
              </button>

              <button class="inline-flex items-center gap-2 text-white hover:text-gray-200 transition-colors text-sm">
                <Share2 :size="18" />
                <span class="hidden sm:inline">Partager</span>
              </button>
            </div>

            <!-- Titre de l'article -->
            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mb-3 leading-tight">
              {{ article.title }}
            </h1>

            <!-- Métadonnées -->
            <div class="flex flex-wrap items-center gap-4 text-white/90 text-sm">
              <div v-if="article.date" class="flex items-center gap-2">
                <Calendar :size="16" />
                <span>{{ article.date }}</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Contenu de l'article sur fond blanc -->
      <div class="bg-white">
        <div class="max-w-300 mx-auto px-4 lg:px-8 py-12">
          <article class="max-w-4xl mx-auto">
            <div class="article-content text-gray-700 text-base leading-relaxed" v-html="article.content"></div>
          </article>
        </div>
      </div>

      <!-- Section articles similaires sur fond gris -->
      <section v-if="relatedArticles.length" class="bg-gray-50 py-12 md:py-16">
        <div class="max-w-300 mx-auto px-4 lg:px-8">
          <h2 class="text-gray-900 text-2xl md:text-3xl font-bold mb-8">
            AUTRES ARTICLES
          </h2>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <router-link
              v-for="relatedArticle in relatedArticles"
              :key="relatedArticle.id"
              :to="{ name: 'blog', params: { id: relatedArticle.id } }"
              class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1"
            >
              <!-- Image -->
              <div class="relative h-48 overflow-hidden">
                <img
                  :src="relatedArticle.image"
                  :alt="relatedArticle.title"
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                >
              </div>

              <!-- Contenu -->
              <div class="p-5">
                <h3 class="text-gray-900 text-base font-bold mb-2 leading-tight group-hover:text-primary transition-colors">
                  {{ relatedArticle.title }}
                </h3>

                <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                  {{ relatedArticle.excerpt }}
                </p>

                <span class="text-primary text-sm font-semibold inline-flex items-center gap-1 group-hover:gap-2 transition-all">
                  Lire la suite
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </span>
              </div>
            </router-link>
          </div>
        </div>
      </section>
    </template>
  </div>
</template>

<style scoped>
/* Styles du contenu article */
.article-content h2 {
  font-size: 1.5rem;
  font-weight: 700;
  color: #111827;
  margin-top: 2rem;
  margin-bottom: 1rem;
}

.article-content h3 {
  font-size: 1.25rem;
  font-weight: 700;
  color: #111827;
  margin-top: 1.5rem;
  margin-bottom: 0.75rem;
}

.article-content p {
  margin-bottom: 1rem;
  line-height: 1.75;
}

.article-content ul {
  list-style-type: disc;
  margin-left: 1.5rem;
  margin-bottom: 1rem;
}

.article-content li {
  margin-bottom: 0.5rem;
  line-height: 1.75;
}

.article-content a {
  color: #8B1538;
  text-decoration: underline;
}

.line-clamp-2 {
  display: -webkit-box;
  line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
