<script setup>
import { useRouter } from 'vue-router'
import identity from '../../assets/images/accueil/27.png'
import realization from '../../assets/images/accueil/11.png'
import joinUs from '../../assets/images/accueil/4.png'
import group from '../../assets/logo-groupe.svg'

const router = useRouter()

const blocks = [
  {
    id: 1,
    title: 'Notre identité',
    image: identity,
    link: '/a-propos',
    isExternal: false,
    objectFit: 'object-cover object-top'
  },
  {
    id: 2,
    title: 'Nos réalisations',
    image: realization,
    link: '#blog',
    isExternal: false,
    objectFit: 'object-cover object-top'
  },
  {
    id: 3,
    title: 'Nous rejoindre',
    image: joinUs,
    link: '/carrieres',
    isExternal: false,
    objectFit: 'object-cover object-top'
  },
  {
    id: 4,
    title: 'Le Groupe COFINA',
    image: group,
    link: 'https://www.groupecofina.com/',
    isExternal: true,
    objectFit: 'p-4 bg-white'
  },
]

const tickerItems = Array(12).fill('Nous connaître')

const navigate = (block) => {
  if (block.isExternal) {
    window.open(block.link, '_blank')
  } else if (block.link.startsWith('#')) {
    // Scroll fluide vers l'ancre sur la même page
    const el = document.querySelector(block.link)
    if (el) el.scrollIntoView({ behavior: 'smooth' })
  } else {
    router.push(block.link)
  }
}
</script>

<template>
  <section class="nous-connaitre-section bg-gray-50 py-16 md:py-10 overflow-hidden">

    <!-- ===== TICKER / TEXTE DÉFILANT ===== -->
    <div class="ticker-wrapper overflow-hidden bg-white py-3 mb-12">
      <div class="ticker-track flex gap-0 whitespace-nowrap">
        <span
          v-for="(item, i) in [...tickerItems, ...tickerItems]"
          :key="i"
          class="ticker-item inline-flex items-center gap-4 px-6 text-primary font-extrabold text-xs md:text-xs uppercase tracking-widest select-none"
        >
          {{ item }}
          <span class="text-primary/30 font-light text-xl">✦</span>
        </span>
      </div>
    </div>

    <!-- ===== GRILLE 4 BLOCS ===== -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div
          v-for="block in blocks"
          :key="block.id"
          class="block-card group bg-white rounded-2xl shadow-md hover:shadow-2xl border border-gray-100 overflow-hidden transition-all duration-400 hover:-translate-y-2 cursor-pointer"
          @click="navigate(block)"
        >
        <!-- Image -->
        <div class="relative overflow-hidden h-48">
        <img
            :src="block.image"
            :alt="block.title"
            class="w-full h-full transition-transform duration-700 group-hover:scale-105"
            :class="block.objectFit || 'object-cover'"
            loading="lazy"
        >
        </div>

          <!-- Titre -->
          <div class="p-5">
            <h3 class="text-gray-900 font-bold text-lg text-center md:text-xl leading-tight group-hover:text-primary transition-colors duration-300">
              {{ block.title }}
            </h3>
          </div>

          <!-- Bordure bas colorée -->
          <div class="h-1 bg-primary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left" />
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.ticker-track {
  animation: ticker-scroll 30s linear infinite;
  will-change: transform;
}

.ticker-wrapper:hover .ticker-track {
  animation-play-state: paused;
}

@keyframes ticker-scroll {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.block-card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.block-card:hover {
  box-shadow: 0 20px 60px -10px rgba(0, 0, 0, 0.15);
}
</style>
