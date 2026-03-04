<script setup>
import { onMounted, onUnmounted, ref } from 'vue'
import api from '../../utils/api'

// Images du slider
const slides = ref([])

// Charger les slides depuis l'API
const fetchSlides = async () => {
  try {
    const response = await api.get('/sliders?is_published=1')
    const data = response.data.data || response.data
    slides.value = data.map(item => ({
      id: item.id,
      image: item.slide_path,
      alt: `Cofina Togo - Slide ${item.id}`,
    }))
  } catch (error) {
    console.error('Erreur lors du chargement des slides', error)
  }
}

const currentSlide = ref(0)
const isTransitioning = ref(false)
let autoplayInterval = null

// Navigation vers la slide suivante
const nextSlide = () => {
  if (isTransitioning.value) return
  isTransitioning.value = true
  currentSlide.value = (currentSlide.value + 1) % slides.value.length
  setTimeout(() => {
    isTransitioning.value = false
  }, 500)
}

// Navigation vers la slide précédente
const prevSlide = () => {
  if (isTransitioning.value) return
  isTransitioning.value = true
  currentSlide.value = currentSlide.value === 0 ? slides.value.length - 1 : currentSlide.value - 1
  setTimeout(() => {
    isTransitioning.value = false
  }, 500)
}

// Aller à une slide spécifique
const goToSlide = index => {
  if (isTransitioning.value || currentSlide.value === index) return
  isTransitioning.value = true
  currentSlide.value = index
  setTimeout(() => {
    isTransitioning.value = false
  }, 500)
}

// Démarrer l'autoplay
const startAutoplay = () => {
  autoplayInterval = setInterval(() => {
    nextSlide()
  }, 5000) // 5 secondes
}

// Arrêter l'autoplay
const stopAutoplay = () => {
  if (autoplayInterval) {
    clearInterval(autoplayInterval)
    autoplayInterval = null
  }
}

// Lifecycle hooks
onMounted(async () => {
  await fetchSlides()
  if (slides.value.length > 0) {
    startAutoplay()
  }
})

onUnmounted(() => {
  stopAutoplay()
})
</script>

<template>
  <section class="relative bg-gray-50">
    <!-- Hero Slider Section -->
    <div
      class="relative h-[400px] sm:h-[500px] md:h-[550px] lg:h-[650px] overflow-hidden"
      @mouseenter="stopAutoplay"
      @mouseleave="startAutoplay"
    >
      <!-- Images du slider -->
      <div class="absolute inset-0">
        <TransitionGroup name="slide">
          <div
            v-for="(slide, index) in slides"
            v-show="currentSlide === index"
            :key="slide.id"
            class="absolute inset-0"
          >
            <img
              :src="slide.image"
              :alt="slide.alt"
              loading="eager"
              class="w-full h-full object-cover object-center"
            >
            <!-- Overlay gradient -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/10 via-black/15 to-black/10" />
          </div>
        </TransitionGroup>
      </div>

      <!-- Contenu du Hero -->
      <div class="relative z-10 h-full flex items-center">
        <div class="max-w-[1400px] mx-auto px-2 lg:px-8 w-full">
          <div class="max-w-4xl">
            <!-- Titre principal -->
            <h1 class="text-white font-extrabold text-3xl sm:text-5xl md:text-6xl lg:text-6xl leading-[1.1] tracking-tight mb-2 animate-fade-in">
              L'institution de mésofinance au service de votre avenir.
            </h1>

            <!-- Sous-titre -->
            <p class="text-white/90 text-sm sm:text-xl md:text-2xl max-w-3xl leading-relaxed mb-2 animate-fade-in-delay">
              Particuliers, Entrepreneurs et Institutions : découvrez une navigation fluide et des offres anticipées à vos ambitions
            </p>

            <!-- Boutons CTA -->
            <div class="flex flex-col sm:flex-row gap-4 pt-2 sm:pt-10 md:pt-16 lg:pt-28 animate-fade-in-delay-2">
              <router-link
                to="/contact#contact-form"
                class="inline-flex items-center justify-center bg-primary text-white px-6 py-3 sm:px-8 sm:py-4 rounded-lg text-sm sm:text-base md:text-lg font-bold hover:bg-secondary shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300"
              >
                Parler à un gestionnaire
              </router-link>

              <router-link
                to="/contact#map"
                class="inline-flex items-center justify-center bg-transparent text-white px-6 py-3 sm:px-8 sm:py-4 rounded-lg text-sm sm:text-base md:text-lg font-bold border-2 border-white hover:bg-white hover:text-primary shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300"
              >
                Trouver une agence
              </router-link>
            </div>
          </div>
        </div>
      </div>


      <!-- Indicateurs rectangulaires -->
      <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-3">
        <button
          v-for="(slide, index) in slides"
          :key="slide.id"
          class="transition-all duration-300"
          :class="[
            currentSlide === index
              ? 'w-12 h-1.5 bg-white'
              : 'w-8 h-1.5 bg-white/40 hover:bg-white/60'
          ]"
          @click="goToSlide(index)"
        />
      </div>
    </div>

    <!-- Section des 3 cartes qui chevauchent le slider (50% sur slider, 50% sur page) -->
    <div class="relative z-30 -mt-24 sm:-mt-28 md:-mt-32 lg:-mt-16 pb-4 md:pb-4 lg:pb-16">
      <div class="max-w-[1000px] mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Carte 1: Nos packs -->
        <!--   <div class="group bg-white rounded-2xl shadow-2xl p-4 sm:p-6 md:p-4 lg:p-6 border-b-[6px] md:border-b-[8px] border-primary hover:shadow-3xl hover:-translate-y-2 transition-all duration-300 cursor-pointer flex flex-col h-auto md:h-44">
            <h3 class="text-gray-900 font-bold mb-2 md:mb-4 text-lg md:text-xl">
              Nos packs
            </h3>
            <p class="text-gray-600 text-xs sm:text-sm md:text-xs mb-auto leading-relaxed">
              Des solutions tout-en-un pour simplifier votre quotidien financier
            </p>
            <router-link
              :to="{ name: 'services', query: { type: 'packs' } }"
              class="inline-flex items-center text-primary text-sm sm:text-base font-bold group-hover:gap-3 gap-2 transition-all duration-300 mt-3 md:mt-4"
            >
              Découvrez nos packs
              <svg
                class="w-4 h-4 md:w-5 md:h-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 5l7 7-7 7"
                />
              </svg>
            </router-link>
        </div> -->


          <!-- Carte 2: Nos crédits & financements -->
        <!-- <div class="group bg-white rounded-2xl shadow-2xl p-4 sm:p-6 md:p-4 border-b-[6px] md:border-b-[8px] border-background hover:shadow-3xl hover:-translate-y-2 transition-all duration-300 cursor-pointer flex flex-col h-auto md:h-44">
          <h3 class="text-gray-900 font-bold mb-2 md:mb-4 text-lg md:text-xl">
            Nos crédits & financements
          </h3>
          <p class="text-gray-600 text-xs sm:text-sm md:text-xs mb-auto leading-relaxed">
            Accompagnement financier pour vos projets personnels et professionnels
          </p>
          <router-link :to="{ name: 'services', query: { type: 'credits' } }" class="inline-flex items-center text-background text-sm sm:text-base font-bold group-hover:gap-3 gap-2 transition-all duration-300 mt-3 md:mt-4">
            Voir nos offres
            <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </router-link>
        </div> -->

        <!-- Carte 3: CofiPrivilège -->
     <!--    <div class="group bg-gradient-to-br from-gray-900 via-black to-gray-900 rounded-2xl shadow-2xl p-4 sm:p-6 md:p-4 border-b-[6px] md:border-b-[8px] border-yellow-600 hover:shadow-3xl hover:-translate-y-2 transition-all duration-300 cursor-pointer flex flex-col h-auto md:h-44">
          <h3 class="text-yellow-500 font-bold mb-2 md:mb-4 text-lg md:text-xl">
            CofiPrivilège
          </h3>
          <p class="text-gray-300 text-xs sm:text-sm md:text-xs mb-auto leading-relaxed">
            Un espace privilégié dédié pour un accompagnement sur mesure
          </p>
          <router-link :to="{ name: 'services', query: { type: 'epargne' } }" class="inline-flex items-center text-yellow-500 text-sm sm:text-base font-bold group-hover:gap-3 gap-2 transition-all duration-300 mt-3 md:mt-4">
            Accéder au club
            <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </router-link>
        </div> -->

        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* Transitions pour le slider */
.slide-enter-active,
.slide-leave-active {
  transition: all 0.5s ease-in-out;
}

.slide-enter-from {
  transform: translateX(100%);
}

.slide-leave-to {
  transform: translateX(-100%);
}

/* Animations pour le texte */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in {
  animation: fadeIn 0.8s ease-out;
}

.animate-fade-in-delay {
  animation: fadeIn 0.8s ease-out 0.2s both;
}

.animate-fade-in-delay-2 {
  animation: fadeIn 0.8s ease-out 0.4s both;
}

/* Ombre personnalisée pour les cartes */
.hover\:shadow-3xl:hover {
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 30%);
}
</style>
