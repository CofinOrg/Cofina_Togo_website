<script setup lang="ts">
import mobilePersonDefault from  '../../assets/images/accueil/Adobe-Express-file-final.png';
import ScrollReveal from '../ScrollReveal.vue'

defineProps({
  mobilePersonImage: {
    type: String,
    default: mobilePersonDefault
  }
})
</script>

<template>
  <section class="relative overflow-hidden bg-white">
    <!-- Section avec image de fond Vector 2.png - Hauteur réduite -->
    <div class="relative py-8 md:py-12 lg:py-12">
      <!-- Image de fond -->
      <div class="absolute inset-0">
        <img
          src="../../assets/images/accueil/Vector 2.png"
          alt="Background"
          class="w-full h-full object-cover"
        >
      </div>

      <div class="relative z-10 max-w-350 mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
          <!-- Colonne gauche : Texte et boutons -->
          <ScrollReveal animation="fade-left" :duration="800">
          <div>
            <h2 class="text-white text-2xl md:text-3xl lg:text-4xl font-bold mb-4">
              Découvrez COFINA mobile +
            </h2>

            <p class="text-white/90 text-sm md:text-base mb-6 leading-relaxed max-w-lg">
              L'application de banking N°1 qui vous permet d'effectuer des opérations sur votre compte en toute sécurité partout où vous soyez
            </p>

            <!-- Boutons de téléchargement -->
            <div class="flex flex-col sm:flex-row gap-3 mb-0">
              <!-- Bouton Google Play -->
              <a
                href="https://play.google.com/store/search?q=cofina+mobile+plus&c=apps"
                target="_blank"
                class="inline-flex items-center gap-2 bg-black text-white px-5 py-2.5 rounded-lg hover:bg-gray-900 transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg text-sm"
              >
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M3,20.5V3.5C3,2.91 3.34,2.39 3.84,2.15L13.69,12L3.84,21.85C3.34,21.6 3,21.09 3,20.5M16.81,15.12L6.05,21.34L14.54,12.85L16.81,15.12M20.16,10.81C20.5,11.08 20.75,11.5 20.75,12C20.75,12.5 20.53,12.9 20.18,13.18L17.89,14.5L15.39,12L17.89,9.5L20.16,10.81M6.05,2.66L16.81,8.88L14.54,11.15L6.05,2.66Z"/>
                </svg>
                <div class="text-left">
                  <p class="text-[9px] uppercase leading-tight">Télécharger sur</p>
                  <p class="text-xs font-bold leading-tight">Google Play</p>
                </div>
              </a>

              <!-- Bouton App Store -->
              <a
                href="https://apps.apple.com/us/app/cofina-mobile/id6444138467"
                target="_blank"
                class="inline-flex items-center gap-2 bg-black text-white px-5 py-2.5 rounded-lg hover:bg-gray-900 transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg text-sm"
              >
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M18.71,19.5C17.88,20.74 17,21.95 15.66,21.97C14.32,22 13.89,21.18 12.37,21.18C10.84,21.18 10.37,21.95 9.1,22C7.79,22.05 6.8,20.68 5.96,19.47C4.25,17 2.94,12.45 4.7,9.39C5.57,7.87 7.13,6.91 8.82,6.88C10.1,6.86 11.32,7.75 12.11,7.75C12.89,7.75 14.37,6.68 15.92,6.84C16.57,6.87 18.39,7.1 19.56,8.82C19.47,8.88 17.39,10.1 17.41,12.63C17.44,15.65 20.06,16.66 20.09,16.67C20.06,16.74 19.67,18.11 18.71,19.5M13,3.5C13.73,2.67 14.94,2.04 15.94,2C16.07,3.17 15.6,4.35 14.9,5.19C14.21,6.04 13.07,6.7 11.95,6.61C11.8,5.46 12.36,4.26 13,3.5Z"/>
                </svg>
                <div class="text-left">
                  <p class="text-[9px] uppercase leading-tight">Télécharger sur</p>
                  <p class="text-xs font-bold leading-tight">App Store</p>
                </div>
              </a>
            </div>
          </div>
          </ScrollReveal>

          <!-- Colonne droite : Image de la personne - Taille réduite -->
          <ScrollReveal animation="fade-right" :duration="900" :delay="150">
          <div class="mb-16 hidden lg:flex justify-end items-end min-w-0 overflow-hidden">
            <img
              :src="mobilePersonImage"
              alt="Cofina Mobile"
              class="h-120 xl:h-80 max-w-full w-auto object-contain"
            >
          </div>
          </ScrollReveal>
        </div>
      </div>
    </div>

    <!-- Section grise : Image de fond avec texte et boutons -->
    <div class="relative py-12 md:py-6">


      <div class="relative z-10 max-w-[1000px] mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div>
            <h2 class="text-gray-900 text-3xl md:text-4xl font-bold mb-4">
              Un projet en tête ?
            </h2>
            <p class="text-gray-600 text-base md:text-lg leading-relaxed">
             Simulez votre prochain crédit ou votre DAT chez nous gratuitement et sans engagement.
            </p>
          </div>

          <div class="flex flex-col gap-4">
            <a
              href="/simulateurs-dat"
              class="inline-flex items-center justify-center text-gray-900 bg-white border-2 border-gray-900 px-8 py-3 rounded-full text-sm font-bold hover:bg-gray-900 hover:text-white transition-all duration-300 shadow-md hover:shadow-lg"
            >
              Tester notre simulateur de DAT
            </a>

            <a
              href="/simulateurs"
              class="inline-flex items-center justify-center text-gray-900 bg-white border-2 border-gray-900 px-8 py-3 rounded-full text-sm font-bold hover:bg-gray-900 hover:text-white transition-all duration-300 shadow-md hover:shadow-lg"
            >
              Tester notre simulateur de prêt
            </a>
          </div>
        </div>
      </div>
    </div>

      <div class="relative bg-primary mb-10 w-full shadow-2xl overflow-hidden">
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

