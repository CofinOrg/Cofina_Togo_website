<script setup>
// Props pour personnalisation

import { Star } from 'lucide-vue-next'
import leftDefault from '../../assets/images/accueil/findone (4).jpg'
import rightDefault from '../../assets/images/accueil/customer-thanking-consultant-help(1).jpg'
import goldBallDefault from '../../../../public/images/Ellipse-removebg-preview.png'
import logoDefault from '../../assets/images/accueil/LogoCBTTshirtGri-removebg-preview.png'

defineProps({
  leftPersonImage: {
    type: String,
    default: leftDefault
  },
  rightPersonImage: {
    type: String,
    default: rightDefault
  },
  goldBallImage: {
    type: String,
    default: goldBallDefault
  },
  logoImage: {
    type: String,
    default: logoDefault
  }
})

</script>

<template>
  <section class="relative overflow-hidden bg-gradient-to-br from-[#0A1628] via-[#0F1E33] to-[#0A1628] py-12 md:py-16 lg:py-8">
    <!-- Motif de fond décoratif -->
    <div class="absolute inset-0 opacity-5">
      <div class="absolute top-0 left-0 w-96 h-96 bg-gold rounded-full blur-3xl" />
      <div class="absolute bottom-0 right-0 w-96 h-96 bg-gold rounded-full blur-3xl" />
    </div>

    <div class="relative z-10 max-w-[1400px] mx-auto px-4 lg:px-16">
      <!-- En-tête avec badge "Espace premium" -->
        <div class="flex items-center gap-2 mb-2">
        <Star :size="30" :fill="'#D4AF37'" :stroke="'none'" class="text-gold" />
        <span class="text-accent text-sm font-semibold">Espace premium</span>
      </div>

      <!-- Titre "CofiPrivilège" et Logo "Cofina Business Touch" sur la même ligne -->
      <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 mb-2">
        <h2 class="text-white text-3xl md:text-4xl lg:text-5xl font-bold">
          CofiPrivilège
        </h2>

        <div class="hidden lg:flex items-center gap-3 animate-fade-in">
          <img
            :src="logoImage"
            alt="Cofina Business Touch Logo"
            class="h-24 xl:h-32 w-auto object-contain"
          >
        </div>
      </div>

      <!-- Contenu principal avec 3 colonnes -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12 items-start mb-4">
        <!-- Colonne gauche : Description + Carte avec personne -->
        <div class="animate-slide-in-left space-y-4">
          <!-- Description alignée avec la carte -->
          <p class="text-gray-400 text-sm leading-relaxed">
            Accédez à un univers d'avantages exclusifs. Profitez d'un accompagnement privilégié, de conseils personnalisés et d'un réseau d'affaires de confiance.
          </p>

          <!-- Carte -->
          <div class="bg-gradient-to-br from-gray-800/40 to-gray-900/40 backdrop-blur-sm rounded-2xl p-5 border border-gray-700/50 hover:border-gold/50 transition-all duration-300">
            <div class="flex items-start gap-3 mb-3">
              <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                <img
                  :src="leftPersonImage"
                  alt="Conseiller Premium"
                  class="w-full h-full object-cover"
                >
              </div>
              <div class="flex-1">
                <p class="text-white text-xs font-bold mb-1">Votre chargé de compte</p>
                <p class="text-gray-400 text-[11px] leading-relaxed">
                  Profite d'un service sur-mesure avec attribution particulière, au sein d'un espace dédié, les avantages sur demande...
                </p>
              </div>
            </div>
            <a href="#" class="text-accent text-xs font-semibold hover:underline">
              Conseillère dédié CofiPrivilège
            </a>
          </div>
        </div>

        <!-- Colonne centrale : Sphère dorée -->
        <div class="hidden lg:flex justify-center items-center">
          <div class="animate-float">
            <div class="relative">
              <div class="absolute inset-0 bg-gold/20 rounded-full blur-2xl animate-pulse" />
              <div class="relative w-40 h-40 xl:w-48 xl:h-48">
                <img
                  :src="goldBallImage"
                  alt="CofiPrivilège"
                  class="w-full h-full object-contain drop-shadow-2xl"
                >
              </div>
            </div>
          </div>
        </div>

        <!-- Colonne droite : Description + Carte avec personne -->
        <div class="animate-slide-in-right space-y-4">
          <!-- Description alignée avec la carte -->
          <p class="text-gray-400 text-sm leading-relaxed">
            <span class="text-gold font-semibold">COFINA BUSINESS TOUCH</span> est un service exclusif d'accueil dédié par COFINA Togo, réservé à des clients premium
          </p>

          <!-- Carte -->
          <div class="bg-gradient-to-br from-gray-800/40 to-gray-900/40 backdrop-blur-sm rounded-2xl p-5 border border-gray-700/50 hover:border-gold/50 transition-all duration-300">
            <div class="flex items-start gap-3 mb-3">
              <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                <img
                  :src="rightPersonImage"
                  alt="Client Premium"
                  class="w-full h-full object-cover"
                >
              </div>
              <div class="flex-1">
                <p class="text-white text-xs font-bold mb-1">Accès membre exclusif à ClubPrivilège</p>
                <p class="text-gray-400 text-[11px] leading-relaxed">
                  Un club unique créé à l'intention de nos clients d'affaires, pour partager, échanger idées et expériences durant événements exclusifs
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Version mobile : Logo -->
      <div class="lg:hidden mb-6">
        <img
          :src="logoImage"
          alt="Cofina Business Touch Logo"
          class="h-20 w-auto mx-auto object-contain"
        >
      </div>



      <!-- Boutons en bas -->
      <div class="flex flex-col md:flex-row items-center justify-between gap-4 mt-6">
        <!-- Bouton gauche -->
        <a
          href="/cofiprivilege/rendez-vous"
          class="inline-flex items-center justify-center bg-gradient-to-r from-gold to-yellow-600 text-black px-6 py-2.5 rounded-lg text-sm font-bold hover:from-yellow-600 hover:to-gold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 w-auto"
        >
          Prenez rendez-vous avec Nadine
        </a>

        <!-- Bouton droite -->
        <a
          href="/cofiprivilege/en-savoir-plus"
          class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-gold to-yellow-600 text-black px-6 py-2.5 rounded-lg text-sm font-bold hover:from-yellow-600 hover:to-gold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 w-auto"
        >
          En savoir plus
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
            <path d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </div>
    </div>

    <!-- Éléments décoratifs -->
    <div class="absolute top-20 left-10 w-2 h-2 bg-gold rounded-full animate-ping" />
    <div class="absolute bottom-20 right-10 w-2 h-2 bg-gold rounded-full animate-ping" style="animation-delay: 1s;" />
  </section>
</template>

<style scoped>
/* Animation de flottement pour la sphère */
@keyframes float {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-15px);
  }
}

.animate-float {
  animation: float 3s ease-in-out infinite;
}

/* Animation de fade-in */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateX(20px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.animate-fade-in {
  animation: fadeIn 0.8s ease-out;
}

/* Animation d'entrée depuis la gauche */
@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.animate-slide-in-left {
  animation: slideInLeft 0.8s ease-out;
}

/* Animation d'entrée depuis la droite */
@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.animate-slide-in-right {
  animation: slideInRight 0.8s ease-out;
}
</style>
