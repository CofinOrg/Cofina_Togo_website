<script setup lang="ts">
import { ref, onMounted } from 'vue'

const sectionRef = ref<HTMLElement | null>(null)
const isVisible = ref(false)

onMounted(() => {
  // Double rAF : garantit que le navigateur peint l'état initial (opacity: 0)
  // avant d'observer, sinon les transitions ne se jouent pas en navigation SPA
  requestAnimationFrame(() => {
    requestAnimationFrame(() => {
      const observer = new IntersectionObserver(
        ([entry]) => {
          if (entry.isIntersecting) {
            isVisible.value = true
            observer.disconnect()
          }
        },
        { threshold: 0.15 }
      )

      if (sectionRef.value) {
        observer.observe(sectionRef.value)
      }
    })
  })
})
</script>

<template>
  <section ref="sectionRef" class="relative overflow-hidden bg-white py-0">
    <!-- Image de fond avec vague jaune -->
    <div class="absolute inset-0">
      <img
        src="../../assets/images/accueil/Vector 1.png"
        alt="Background"
        class="absolute bottom-0 left-0 w-full h-full object-cover"
      >
    </div>

    <!-- Contenu -->
    <div class="relative z-10 max-w-[1400px] mx-auto px-4 lg:px-8 pt-16 pb-0">
      <div class="grid grid-cols-1 lg:grid-cols-2 items-end gap-12">

        <!-- Colonne gauche : Texte et valeurs -->
        <div class="flex flex-col justify-center mb-10">
          <!-- Label "Notre Mission" -->
          <div class="mb-4 anim-slide-up" :class="{ 'is-visible': isVisible }" style="--delay: 0s;">
            <span class="text-primary text-xs md:text-sm font-bold uppercase tracking-wide">
              NOTRE MISSION
            </span>
          </div>

          <!-- Titre principal -->
          <h2 class="text-white text-3xl sm:text-4xl md:text-4xl font-bold leading-tight mb-6 anim-slide-up" :class="{ 'is-visible': isVisible }" style="--delay: 0.15s;">
            Être le modèle panafricain de la Finance Inclusive
          </h2>

          <!-- Sous-titre "Nos valeurs" -->
          <div class="mb-5 anim-slide-up" :class="{ 'is-visible': isVisible }" style="--delay: 0.3s;">
            <span class="text-primary text-sm md:text-base font-semibold">
              Nos valeurs
            </span>
          </div>

          <!-- Les 3 cartes de valeurs -->
          <div class="flex flex-col sm:flex-row flex-wrap gap-3 md:gap-4">
            <!-- Carte 1 : Respect -->
            <div class="value-card bg-white rounded-lg shadow-md px-4 py-3 flex items-center gap-3 hover:shadow-lg transition-all duration-300 anim-pop" :class="{ 'is-visible': isVisible }" style="--delay: 0.45s;">
                <div class="flex items-center gap-0.5">
                        <span class="text-primary font-bold text-3xl md:text-4xl">2</span>
                        <span class="text-background font-bold text-3xl md:text-4xl">R</span>
                </div>
             <div class="h-8 w-px bg-gray-400"></div>
              <div>
                <p class="text-gray-900 text-sm">Respect</p>
                <p class="text-gray-900 text-sm">Rigueur</p>
              </div>
            </div>

            <!-- Carte 2 : Service Simplifié -->
            <div class="value-card bg-white rounded-lg shadow-md px-4 py-3 flex items-center gap-3 hover:shadow-lg transition-all duration-300 anim-pop" :class="{ 'is-visible': isVisible }" style="--delay: 0.6s;">
                  <div class="flex items-center gap-0.5">
                        <span class="text-primary font-bold text-3xl md:text-4xl">2</span>
                        <span class="text-background font-bold text-3xl md:text-4xl">S</span>
                  </div>
            <div class="h-8 w-px bg-gray-400"></div>
              <div>
                <p class="text-gray-900 text-sm">Service</p>
                <p class="text-gray-900 text-sm">Simplifié</p>
              </div>
            </div>

            <!-- Carte 3 : Intégrité Innovatrice -->
            <div class="value-card bg-white rounded-lg shadow-md px-4 py-3 flex items-center gap-3 hover:shadow-lg transition-all duration-300 anim-pop" :class="{ 'is-visible': isVisible }" style="--delay: 0.75s;">
                <div class="flex items-center gap-0.5">
                        <span class="text-primary font-bold text-3xl md:text-4xl">2</span>
                        <span class="text-background font-bold text-3xl md:text-4xl">I</span>
                </div>
            <div class="h-8 w-px bg-gray-400"></div>
              <div>
                <p class="text-gray-900 text-sm">Intégrité</p>
                <p class="text-gray-900 text-sm">Innovation</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Colonne droite : Image -->
        <div class="hidden lg:flex justify-end">
          <img
            src="../../assets/images/accueil/Gemini_Generated_Image_3m62ek3m62ek3m62-removebg-preview.png"
            alt="Cofina Professional"
            class="h-[320px] xl:h-[380px] object-contain anim-slide-right"
            :class="{ 'is-visible': isVisible }"
          />
        </div>

      </div>
    </div>

  </section>
</template>

<style scoped>
/* ── Slide up (texte) ── */
.anim-slide-up {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
  transition-delay: var(--delay, 0s);
}

.anim-slide-up.is-visible {
  opacity: 1;
  transform: translateY(0);
}

/* ── Pop (cartes) ── */
.anim-pop {
  opacity: 0;
  transform: translateY(20px) scale(0.9);
  transition: opacity 0.5s ease-out, transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
  transition-delay: var(--delay, 0s);
}

.anim-pop.is-visible {
  opacity: 1;
  transform: translateY(0) scale(1);
}

/* ── Slide right (image) ── */
.anim-slide-right {
  opacity: 0;
  transform: translateX(80px);
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
  transition-delay: 0.3s;
}

.anim-slide-right.is-visible {
  opacity: 1;
  transform: translateX(0);
}

/* ── Hover cartes ── */
.value-card:hover {
  transform: translateY(-4px) scale(1.02);
}
</style>
