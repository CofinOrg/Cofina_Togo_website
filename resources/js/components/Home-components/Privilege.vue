<script setup>
import { Star, Zap, Users, Shield } from 'lucide-vue-next'
import ScrollReveal from '../ScrollReveal.vue'
import leftDefault from '../../assets/images/accueil/findone (4).jpg'
import rightDefault from '../../assets/images/accueil/customer-thanking-consultant-help(1).jpg'
import goldBallDefault from '../../../../public/images/Ellipse-removebg-preview.png'
import logoDefault from '../../assets/images/accueil/LogoCBTTshirtGri-removebg-preview.png'

defineProps({
  leftPersonImage: { type: String, default: leftDefault },
  rightPersonImage: { type: String, default: rightDefault },
  goldBallImage: { type: String, default: goldBallDefault },
  logoImage: { type: String, default: logoDefault },
})

const features = [
  {
    icon: Star,
    title: 'Espace dédié',
    desc: 'Un espace exclusif conçu pour vous offrir un accueil haut de gamme en agence.',
  },
  {
    icon: Users,
    title: 'Club d\'affaires',
    desc: 'Intégrez un réseau d\'entrepreneurs et échangez lors d\'événements privés.',
  },
  {
    icon: Shield,
    title: 'Service sur-mesure',
    desc: 'Un chargé de compte attitré disponible pour toutes vos opérations.',
  },
]
</script>

<template>
  <section class="relative overflow-hidden bg-[#060D1A] py-10">

    <!-- Fond radial décoratif -->
    <div class="absolute inset-0 pointer-events-none">
      <div class="absolute -top-32 -left-32 w-125 h-125 bg-yellow-500/5 rounded-full blur-3xl" />
      <div class="absolute -bottom-32 -right-32 w-125 h-125 bg-yellow-500/5 rounded-full blur-3xl" />
      <!-- Grille subtile -->
      <div class="absolute inset-0 opacity-[0.03]"
        style="background-image: linear-gradient(#D4AF37 1px, transparent 1px), linear-gradient(90deg, #D4AF37 1px, transparent 1px); background-size: 60px 60px;" />
    </div>

    <div class="relative z-10 max-w-350 mx-auto px-4 sm:px-6 lg:px-16">

      <!-- Badge -->
      <ScrollReveal animation="fade-up" :duration="600">
        <div class="flex justify-center mb-6">
          <span class="inline-flex items-center gap-2 bg-yellow-500/10 border border-yellow-500/30 text-yellow-400 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full">
            <Star :size="12" fill="#D4AF37" stroke="none" />
            Espace premium
            <Star :size="12" fill="#D4AF37" stroke="none" />
          </span>
        </div>
      </ScrollReveal>

      <!-- Layout principal -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">

        <!-- Colonne gauche -->
        <div class="space-y-8">

          <!-- Logo -->

          <!-- Texte -->
          <ScrollReveal animation="fade-left" :duration="700" :delay="100">
            <div class="space-y-4">
              <h2 class="text-3xl lg:text-4xl font-black text-white leading-tight">
                Une expérience
                <span class="text-transparent bg-clip-text bg-linear-to-r from-yellow-400 to-yellow-600">
                  d'exception
                </span>
              </h2>
              <p class="text-gray-400 text-sm leading-relaxed max-w-md">
                <span class="text-yellow-400 font-semibold">COFINA BUSINESS TOUCH</span> est un service exclusif réservé à une clientèle d'affaires sélectionnée. Profitez d'avantages inégalés et d'une relation bancaire personnalisée.
              </p>
            </div>
          </ScrollReveal>

          <!-- Feature cards -->
          <ScrollReveal animation="fade-up" :duration="600" :stagger="true" :delay="250" :stagger-delay="120" class="space-y-3">
            <div
              v-for="(feature, i) in features"
              :key="i"
              class="flex items-start gap-4 bg-white/3 hover:bg-white/6 border border-white/5 hover:border-yellow-500/30 rounded-2xl p-4 transition-all duration-300 group"
            >
              <div class="w-10 h-10 rounded-xl bg-yellow-500/10 border border-yellow-500/20 flex items-center justify-center shrink-0 group-hover:bg-yellow-500/20 transition-colors">
                <component :is="feature.icon" :size="18" class="text-yellow-400" />
              </div>
              <div>
                <p class="text-white text-sm font-bold mb-0.5">{{ feature.title }}</p>
                <p class="text-gray-400 text-xs leading-relaxed">{{ feature.desc }}</p>
              </div>
            </div>
          </ScrollReveal>

        </div>

        <!-- Colonne droite : Visuel -->
        <ScrollReveal animation="fade-right" :duration="800" :delay="200">
        <div class="relative hidden lg:flex justify-center items-center">

          <!-- Sphère dorée flottante -->
    <!--       <div class="absolute top-0 left-1/2 -translate-x-1/2 animate-float">
            <div class="relative">
              <div class="absolute inset-0 bg-yellow-400/30 rounded-full blur-2xl animate-pulse" />
              <img :src="goldBallImage" alt="CofiPrivilège" class="relative w-36 h-36 object-contain drop-shadow-2xl" />
            </div>
          </div> -->

          <img :src="logoImage" alt="Logo CofiPrivilège" class="absolute top-1/3 left-1/2 ml-40 transform -translate-x-1/2 -translate-y-1/2 w-32 h-32 object-contain" />


          <!-- Cartes personnes empilées -->
          <div class="relative mt-12">

            <!-- Carte gauche -->
            <div class="absolute -left-16 top-8 w-52 bg-white/5 backdrop-blur border border-white/10 rounded-2xl p-4 animate-float-slow">
              <div class="flex items-center gap-3 mb-2">
                <img :src="leftPersonImage" alt="Client" class="w-10 h-10 rounded-full object-cover border-2 border-yellow-500/50" />
                <div>
                  <p class="text-white text-xs font-bold">Conseiller dédié</p>
                  <div class="flex gap-0.5 mt-0.5">
                    <Star v-for="n in 5" :key="n" :size="8" fill="#D4AF37" stroke="none" />
                  </div>
                </div>
              </div>
              <p class="text-gray-400 text-[10px] leading-relaxed">Service personnalisé et réactif à chaque instant.</p>
            </div>

            <!-- Carte droite -->
            <div class="relative ml-20 mt-24 w-56 bg-linear-to-br from-yellow-500/10 to-yellow-600/5 backdrop-blur border border-yellow-500/20 rounded-2xl p-4">
              <div class="flex items-center gap-3 mb-2">
                <img :src="rightPersonImage" alt="Client" class="w-10 h-10 rounded-full object-cover border-2 border-yellow-500/50" />
                <div>
                  <p class="text-white text-xs font-bold">Club Privilège</p>
                  <p class="text-yellow-400 text-[10px]">Membre exclusif</p>
                </div>
              </div>
              <p class="text-gray-400 text-[10px] leading-relaxed">Accès au réseau d'affaires et événements privés.</p>
              <div class="mt-3 flex items-center gap-1">
                <div class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse" />
                <span class="text-green-400 text-[10px] font-medium">Membre actif</span>
              </div>
            </div>

          </div>
        </div>
        </ScrollReveal>

      </div>

      <!-- CTA — visible sur tous les écrans, aligné à droite -->
      <ScrollReveal animation="fade-up" :duration="600" :delay="400">
      <div class="flex justify-center lg:justify-end mt-2">
        <router-link
          :to="{ name: 'business-club-form' }"
          class="inline-flex items-center gap-3 bg-linear-to-r from-yellow-500 to-yellow-600 hover:from-yellow-400 hover:to-yellow-500 text-black font-black text-sm px-8 py-3.5 rounded-2xl shadow-lg shadow-yellow-500/20 hover:shadow-yellow-500/40 transition-all duration-300 hover:-translate-y-0.5"
        >
          <Zap :size="16" />
          Rejoindre le cercle Business Touch
        </router-link>
      </div>
      </ScrollReveal>

    </div>

    <!-- Points décoratifs animés -->
    <div class="absolute top-16 left-12 w-1.5 h-1.5 bg-yellow-400 rounded-full animate-ping" />
    <div class="absolute bottom-16 right-12 w-1.5 h-1.5 bg-yellow-400 rounded-full animate-ping" style="animation-delay: 1.2s;" />
    <div class="absolute top-1/2 left-6 w-1 h-1 bg-yellow-400/50 rounded-full animate-ping" style="animation-delay: 0.6s;" />
  </section>
</template>

<style scoped>
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-14px); }
}

@keyframes floatSlow {
  0%, 100% { transform: translateY(0) rotate(-1deg); }
  50% { transform: translateY(-8px) rotate(1deg); }
}

.animate-float {
  animation: float 3.5s ease-in-out infinite;
}

.animate-float-slow {
  animation: floatSlow 5s ease-in-out infinite;
}
</style>
