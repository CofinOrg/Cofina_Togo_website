<script setup>
import { ref, onMounted, computed } from 'vue'
import { ChevronLeft, ChevronRight, ArrowRight } from 'lucide-vue-next'
import blogImageDefault from '@/assets/images/accueil/findone1.jpg'

import api from '../../utils/api'

const blogs = ref([])

const getBlogs = async () => {
  try {
    const res = await api.get('/blogs')
    blogs.value = res.data.data ?? res.data
  } catch (error) {
    console.error('Erreur lors du chargement des blogs', error)
  }
}

const getCoverUrl = (coverImage) => {
  if (!coverImage) return blogImageDefault
  if (coverImage.startsWith('http')) return coverImage
  return `/storage/${coverImage}`
}

const articles = computed(() => {
  if (blogs.value.length === 0) return []
  return blogs.value.map(blog => ({
    id: blog.id,
    image: getCoverUrl(blog.coverImage),
    title: blog.title,
    description: blog.summary,
    linkText: 'Lire la suite →'
  }))
})

onMounted(() => {
  getBlogs()
})

// État du carousel
const currentIndex = ref(0)
const carouselRef = ref(null)

// Fonctions de navigation
const scrollToIndex = (index) => {
  if (carouselRef.value) {
    const cardWidth = carouselRef.value.children[0]?.offsetWidth || 0
    const gap = 24 // gap-6 = 24px
    const scrollPosition = (cardWidth + gap) * index
    carouselRef.value.scrollTo({
      left: scrollPosition,
      behavior: 'smooth'
    })
    currentIndex.value = index
  }
}

const nextSlide = () => {
  const maxIndex = articles.value.length - 1
  if (currentIndex.value < maxIndex) {
    scrollToIndex(currentIndex.value + 1)
  }
}

const prevSlide = () => {
  if (currentIndex.value > 0) {
    scrollToIndex(currentIndex.value - 1)
  }
}
</script>

<template>
  <section class="py-16 md:py-20 bg-gray-50 overflow-x-hidden">
    <div class="max-w-[1400px] mx-auto px-4 lg:px-8">
      <!-- Titre de la section -->
      <div class="text-center mb-12">
        <h2 class="text-gray-900 text-3xl md:text-4xl font-bold">
          Actualités & success stories
        </h2>
      </div>

      <!-- Carousel d'actualités -->
      <div class="relative mb-16">
        <!-- Bouton précédent -->
        <button
          @click="prevSlide"
          :disabled="currentIndex === 0"
          :class="[
            'absolute -left-4 lg:-left-12 top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300',
            currentIndex === 0 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-primary hover:text-white hover:scale-110'
          ]"
        >
          <ChevronLeft :size="24" />
        </button>

        <!-- Conteneur du carousel -->
        <div
          ref="carouselRef"
          class="flex gap-6 overflow-x-auto scrollbar-hide snap-x snap-mandatory scroll-smooth"
          style="scrollbar-width: none; -ms-overflow-style: none;"
        >
          <div
            v-for="(article, index) in articles"
            :key="article.id"
            class="flex-shrink-0 w-[280px] md:w-[320px] bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group hover:-translate-y-1 snap-start"
          >
            <!-- Image - Taille réduite -->
            <div class="relative h-40 overflow-hidden">
              <img
                :src="article.image"
                :alt="article.title"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
              >
            </div>

            <!-- Contenu - Compact -->
            <div class="p-5">
              <!-- Titre - Plus petit -->
              <h3 class="text-gray-900 text-base font-bold mb-2 leading-tight line-clamp-2">
                {{ article.title }}
              </h3>

              <!-- Description - Plus courte -->
              <p class="text-gray-600 text-xs mb-3 leading-relaxed line-clamp-2">
                {{ article.description }}
              </p>

              <!-- Lien -->
              <router-link
                :to="{ name: 'blog', params: { id: article.id } }"
                class="inline-flex items-center text-gray-900 text-xs font-semibold hover:text-primary transition-colors duration-300"
              >
                {{ article.linkText }}
              </router-link>
            </div>
          </div>
        </div>

        <!-- Bouton suivant -->
        <button
          @click="nextSlide"
          :disabled="currentIndex >= articles.length - 1"
          :class="[
            'absolute -right-4 lg:-right-12 top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300',
            currentIndex >= articles.length - 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-primary hover:text-white hover:scale-110'
          ]"
        >
          <ChevronRight :size="24" />
        </button>

        <!-- Indicateurs -->
        <div class="flex justify-center gap-2 mt-6">
          <button
            v-for="(article, index) in articles"
            :key="index"
            @click="scrollToIndex(index)"
            :class="[
              'w-2 h-2 rounded-full transition-all duration-300',
              currentIndex === index ? 'bg-primary w-8' : 'bg-gray-300 hover:bg-gray-400'
            ]"
          />
        </div>
      </div>


    </div>

    <!-- Bandeau rouge : Devenir Cofinois -->
      <div class="relative bg-gradient-to-r from-primary to-accent w-full shadow-2xl overflow-hidden">
        <!-- Motif décoratif en arrière-plan -->
        <div class="absolute inset-0 opacity-10">
          <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2" />
          <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl transform -translate-x-1/2 translate-y-1/2" />
        </div>

        <div class="relative z-10 py-12 px-8 md:px-12 lg:px-16">
          <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
            <!-- Texte -->
            <div class="text-center lg:text-left">
              <h2 class="text-white text-3xl md:text-4xl font-bold mb-3">
                Devenir Cofinois ?
              </h2>
              <p class="text-white/90 text-base md:text-lg">
                Découvrez nos offres d'emploi ou déposez une candidature spontanée.
              </p>
            </div>

            <!-- Bouton -->
            <a
              href="/carrieres"
              class="inline-flex items-center justify-center gap-2 bg-white text-primary px-8 py-3.5 rounded-lg text-base font-bold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 whitespace-nowrap"
            >
              Voir les opportunités
              <ArrowRight :size="20" />
            </a>
          </div>
        </div>
      </div>

  </section>
</template>

<style scoped>
/* Animation pour les cartes */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
