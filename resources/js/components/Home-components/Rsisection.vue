<script setup lang="ts">
// Pas de logique nécessaire
</script>

<template>
  <section class="relative overflow-hidden bg-white py-0">
    <!-- Image de fond avec vague jaune - hauteur réduite -->
    <div class="absolute inset-0 flex items-center justify-center h-[350px] md:h-[400px] lg:h-[450px]">
      <img
        src="../../assets/images/accueil/Vector 1.png"
        alt="Background"
        class="absolute bottom-0 left-0 w-full h-[350px] md:h-[400px] lg:h-[450px] object-cover"
      >
    </div>

    <!-- Contenu -->
    <div class="relative z-10 max-w-[1400px] mx-auto px-4 lg:px-8 pt-16 pb-0">
      <div class="grid grid-cols-1 lg:grid-cols-2 items-end gap-12">

        <!-- Colonne gauche : Texte et valeurs avec animation -->
        <div class="flex flex-col justify-center animate-fade-in mb-10">
          <!-- Label "Notre Mission" -->
          <div class="mb-4">
            <span class="text-primary text-xs md:text-sm font-bold uppercase tracking-wide">
              NOTRE MISSION
            </span>
          </div>

          <!-- Titre principal -->
          <h2 class="text-white text-3xl sm:text-4xl md:text-4xl font-bold leading-tight mb-6">
            Être le modèle panafricain de la Finance Inclusive
          </h2>

          <!-- Sous-titre "Nos valeurs" -->
          <div class="mb-5">
            <span class="text-primary text-sm md:text-base font-semibold">
              Nos valeurs
            </span>
          </div>

          <!-- Les 3 cartes de valeurs avec animation décalée -->
          <div class="flex flex-wrap gap-3 md:gap-4">
            <!-- Carte 1 : Respect -->
            <div class="bg-white rounded-lg shadow-md px-4 py-3 flex items-center gap-3 hover:shadow-lg transition-all duration-300 animate-fade-in-card" style="animation-delay: 0.2s;">
                <div class="flex items-center gap-0.5">
                        <span class="text-primary font-bold text-4xl">2</span>
                        <span class="text-background font-bold text-4xl">R</span>
                </div>
             <div class="h-8 w-px bg-gray-400"></div>
              <div>
                <p class="text-gray-900 text-sm ">Respect</p>
                <p class="text-gray-900 text-sm">Rigeur</p>
              </div>
            </div>

            <!-- Carte 2 : Service Simplifié -->
            <div class="bg-white rounded-lg shadow-md px-4 py-3 flex items-center gap-3 hover:shadow-lg transition-all duration-300 animate-fade-in-card" style="animation-delay: 0.4s;">
                  <div class="flex items-center gap-0.5">
                        <span class="text-primary font-bold text-4xl">2</span>
                        <span class="text-background font-bold text-4xl">S</span>
                  </div>
            <div class="h-8 w-px bg-gray-400"></div>
              <div>
                <p class="text-gray-900 text-sm ">Service</p>
                <p class="text-gray-900 text-sm">Simplifié</p>
              </div>
            </div>

            <!-- Carte 3 : Intégrité Innovatrice -->
            <div class="bg-white rounded-lg shadow-md px-4 py-3 flex items-center gap-3 hover:shadow-lg transition-all duration-300 animate-fade-in-card" style="animation-delay: 0.6s;">
                <div class="flex items-center gap-0.5">
                        <span class="text-primary font-bold text-4xl">2</span>
                        <span class="text-background font-bold text-4xl">I</span>
                </div>
            <div class="h-8 w-px bg-gray-400"></div>
              <div>
                <p class="text-gray-900 text-sm ">Intégrité</p>
                <p class="text-gray-900 text-sm">Innovation</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Colonne droite : Image de la femme avec animation -->
     <div class="hidden lg:flex justify-end">
      <Transition name="slide-right" appear>
        <img
          src="../../assets/images/accueil/Gemini_Generated_Image_wv6vm5wv6vm5wv6v-removebg-preview-removebg-preview.png"
          alt="Cofina Professional"
          class="h-[320px] xl:h-[380px] object-contain"
        />
      </Transition>
</div>


      </div>
    </div>


  </section>
</template>

<style scoped>
/* Animation d'entrée depuis la droite pour l'image */
@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(100px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

  .animate-slide-in-right {
    opacity: 0;
    animation: slideInRight 1s ease-out forwards;
  }


/* Animation de fade-in pour le texte */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in {
  animation: fadeIn 0.8s ease-out;
}

/* Animation de fade-in pour les cartes avec délai */
@keyframes fadeInCard {
  from {
    opacity: 0;
    transform: translateY(20px) scale(0.9);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

.animate-fade-in-card {
  opacity: 0;
  animation: fadeInCard 0.6s ease-out forwards;
}

/* Animation de flottement au survol de l'image */
@keyframes float {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}


/* Animation pour les cartes de valeurs au hover */
.bg-white:hover {
  transform: translateY(-4px) scale(1.02);
}
</style>
