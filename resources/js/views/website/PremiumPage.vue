<script setup>
import { ref } from 'vue'
import { Zap, Users, Shield, Building2, Phone, ArrowRight, CheckCircle2, ChevronDown } from 'lucide-vue-next'
import ScrollReveal from '@/components/ScrollReveal.vue'
import goldBallImage from '../../../../public/images/Ellipse-removebg-preview.png'

const businessFeatures = [
  { icon: Users, title: 'Club d\'affaires', desc: 'Intégrez un réseau d\'entrepreneurs et échangez lors d\'événements privés.' },
  { icon: Building2, title: 'Solutions entreprise', desc: 'Financements sur-mesure adaptés à la taille et aux ambitions de votre structure.' },
  { icon: Shield, title: 'Service sur-mesure', desc: 'Un chargé de compte attitré disponible pour toutes vos opérations.' },
  { icon: Zap, title: 'Réseau panafricain', desc: 'Profitez de la force du Groupe COFINA présent dans plusieurs pays d\'Afrique.' },
]

const businessAvantages = [
  'Financements jusqu\'à 500 millions FCFA',
  'Lignes de crédit court et moyen terme',
  'Accompagnement business dédié',
  'Accès aux événements networking exclusifs',
  'Solutions de placement pour votre trésorerie',
  'Conseiller disponible 24h/24 pour les urgences',
]

const faqs = ref([
  { q: 'Business Touch est-il réservé aux grandes entreprises ?', a: 'Non, Business Touch s\'adresse aussi bien aux TPE, PME qu\'aux entrepreneurs individuels avec un potentiel de développement.', open: false },
  { q: 'Y a-t-il des frais supplémentaires pour ce service ?', a: 'L\'adhésion à Business Touch peut nécessiter un dépôt minimum ou des encours spécifiques. Les conditions détaillées sont disponibles en agence.', open: false },
  { q: 'Comment rejoindre Business Touch ?', a: 'Soumettez votre candidature via le formulaire dédié. Nos conseillers étudient votre dossier dans les 48h et vous recontactent pour finaliser l\'adhésion.', open: false },
  { q: 'Quels types de financements sont accessibles ?', a: 'Business Touch ouvre l\'accès à des lignes de crédit court et moyen terme, des financements de projets, ainsi que des solutions de placement pour votre trésorerie.', open: false },
])

const toggleFaq = (i) => { faqs.value[i].open = !faqs.value[i].open }
</script>

<template>
  <div class="bg-[#060D1A] min-h-screen overflow-hidden">

    <!-- HERO -->
    <section class="relative pt-18 pb-20 overflow-hidden">

      <div class="absolute bottom-12 left-16 w-1.5 h-1.5 bg-yellow-400 rounded-full animate-ping" />
      <div class="absolute top-10 right-20 w-1 h-1 bg-yellow-400/60 rounded-full animate-ping" style="animation-delay:1s" />

      <!-- Background -->
      <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-200 h-80 bg-yellow-500/8 rounded-full blur-3xl" />
        <div class="absolute top-1/2 -left-40 w-100 h-100 bg-yellow-500/4 rounded-full blur-3xl" />
        <div class="absolute top-1/2 -right-40 w-100 h-100 bg-yellow-500/4 rounded-full blur-3xl" />
        <div class="absolute inset-0 opacity-[0.025]" style="background-image: linear-gradient(#D4AF37 1px, transparent 1px), linear-gradient(90deg, #D4AF37 1px, transparent 1px); background-size: 60px 60px;" />
      </div>

      <!-- CONTENT -->
      <div class="relative z-10 max-w-350 mx-auto px-4 lg:px-16">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10">

          <!-- LEFT (TEXT) -->
          <div class="text-left max-w-2xl">

            <ScrollReveal animation="fade-up" :duration="600">
              <span class="inline-flex items-center gap-2 bg-yellow-500/10 border border-yellow-500/30 text-yellow-400 text-xs font-bold uppercase tracking-widest px-5 py-2.5 rounded-full mb-8">
                <Building2 :size="12" class="text-yellow-400" />
                Espace exclusif COFINA
                <Building2 :size="12" class="text-yellow-400" />
              </span>
            </ScrollReveal>

            <ScrollReveal animation="fade-up" :duration="700" :delay="100">
              <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-white leading-[1.05] tracking-tight mb-6">
                L'ambition<br>
                <span class="text-transparent bg-clip-text bg-linear-to-r from-yellow-300 via-yellow-400 to-yellow-600">
                  à votre service
                </span>
              </h1>
              <p class="text-gray-400 text-base md:text-lg leading-relaxed">
                COFINA Togo propose un espace premium conçu pour les entrepreneurs ambitieux qui veulent aller plus loin.
              </p>
            </ScrollReveal>

            <ScrollReveal animation="fade-up" :duration="600" :delay="200">
              <div class="flex flex-col sm:flex-row gap-4 mt-10">
                <a href="#business-touch" class="inline-flex items-center gap-2 bg-yellow-500/10 border border-yellow-500/30 text-yellow-300 font-bold text-sm px-6 py-3 rounded-xl hover:bg-yellow-500/20 transition-all duration-300">
                  <Building2 :size="16" />
                  Découvrir Cofina Business Touch
                </a>
                <router-link
                  :to="{ name: 'business-club-form' }"
                  class="inline-flex items-center gap-2 bg-linear-to-r from-yellow-500 to-yellow-600 hover:from-yellow-400 hover:to-yellow-500 text-black font-black text-sm px-6 py-3 rounded-xl shadow-lg shadow-yellow-500/20 transition-all duration-300 hover:-translate-y-0.5"
                >
                  <Zap :size="16" />
                  Rejoindre maintenant
                </router-link>
              </div>
            </ScrollReveal>

          </div>

          <!-- RIGHT (BALL) -->
          <div class="relative flex justify-center lg:justify-end w-full">
            <div class="relative animate-float">
              <div class="absolute inset-0 bg-yellow-400/30 rounded-full blur-2xl animate-pulse" />
              <img :src="goldBallImage" alt="Business Touch" class="relative w-70 h-70 object-contain drop-shadow-2xl" />
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- BUSINESS TOUCH -->
    <section id="business-touch" class="relative py-10 border-t border-white/5">
      <div class="absolute top-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-yellow-500/40 to-transparent" />

      <div class="max-w-350 mx-auto px-4 lg:px-16">
        <ScrollReveal animation="fade-up" :duration="600">
          <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16">
            <div>
              <span class="inline-flex items-center gap-2 text-yellow-400 text-xs font-black uppercase tracking-[0.25em] mb-3">
                <span class="w-8 h-px bg-yellow-400 inline-block" />
                Pour les entrepreneurs
              </span>
              <h2 class="text-3xl lg:text-5xl font-black text-white leading-tight">
                COFINA<br>
                <span class="text-yellow-400">Business Touch</span>
              </h2>
              <p class="text-gray-400 text-sm md:text-base mt-3 max-w-xl leading-relaxed">
                Un service exclusif réservé à une clientèle d'affaires sélectionnée. Profitez d'avantages inégalés, d'un réseau d'entrepreneurs et d'une relation personnalisée.
              </p>
            </div>
            <router-link
              :to="{ name: 'business-club-form' }"
              class="inline-flex items-center gap-3 bg-linear-to-r from-yellow-500 to-yellow-600 hover:from-yellow-400 hover:to-yellow-500 text-black font-black text-sm px-8 py-4 rounded-2xl shadow-lg shadow-yellow-500/20 hover:shadow-yellow-500/40 transition-all duration-300 hover:-translate-y-0.5 shrink-0 self-start lg:self-auto"
            >
              <Zap :size="16" />
              Rejoindre Cofina Business Touch
            </router-link>
          </div>
        </ScrollReveal>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-start">
          <ScrollReveal animation="fade-left" :duration="700">
            <div class="bg-linear-to-br from-yellow-500/8 to-yellow-600/3 border border-yellow-500/20 rounded-3xl p-8">
              <h3 class="text-white font-black text-lg mb-6 flex items-center gap-3">
                <Building2 :size="18" class="text-yellow-400" />
                Ce que vous obtenez
              </h3>
              <ul class="space-y-4">
                <li v-for="(a, i) in businessAvantages" :key="i" class="flex items-center gap-3 text-gray-300 text-sm">
                  <CheckCircle2 :size="16" class="text-yellow-400 shrink-0" />
                  {{ a }}
                </li>
              </ul>
              <div class="mt-8 pt-6 border-t border-yellow-500/15">
                <p class="text-gray-500 text-xs leading-relaxed">Accès soumis à sélection. Nos conseillers étudient votre dossier dans les 48h.</p>
              </div>
            </div>
          </ScrollReveal>

          <ScrollReveal animation="fade-right" :duration="700" :stagger="true" :stagger-delay="100" class="space-y-4">
            <div
              v-for="(f, i) in businessFeatures" :key="i"
              class="flex items-start gap-4 bg-white/3 hover:bg-white/6 border border-white/5 hover:border-yellow-500/30 rounded-2xl p-5 transition-all duration-300 group"
            >
              <div class="w-11 h-11 rounded-xl bg-yellow-500/10 border border-yellow-500/20 flex items-center justify-center shrink-0 group-hover:bg-yellow-500/20 transition-colors">
                <component :is="f.icon" :size="18" class="text-yellow-400" />
              </div>
              <div>
                <p class="text-white text-sm font-bold mb-1">{{ f.title }}</p>
                <p class="text-gray-400 text-xs leading-relaxed">{{ f.desc }}</p>
              </div>
            </div>
          </ScrollReveal>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="relative py-10 border-t border-white/5">
      <div class="absolute top-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-yellow-500/20 to-transparent" />

      <div class="max-w-350 mx-auto px-4 lg:px-16">
        <ScrollReveal animation="fade-up" :duration="600">
          <div class="text-center mb-12">
            <h2 class="text-2xl lg:text-4xl font-black text-white mb-3">Questions fréquentes</h2>
            <p class="text-gray-500 text-sm">Tout ce que vous devez savoir avant de rejoindre Cofina Business Touch.</p>
          </div>
        </ScrollReveal>

        <ScrollReveal animation="fade-up" :duration="600" :delay="100">
          <div class="max-w-3xl mx-auto space-y-3">
            <div
              v-for="(faq, i) in faqs" :key="i"
              class="bg-white/3 border border-white/8 rounded-2xl overflow-hidden transition-all duration-300"
              :class="faq.open ? 'border-yellow-500/30' : ''"
            >
              <button class="w-full flex items-center justify-between gap-4 px-6 py-5 text-left" @click="toggleFaq(i)">
                <span class="text-white text-sm font-bold">{{ faq.q }}</span>
                <ChevronDown :size="16" class="text-yellow-400 shrink-0 transition-transform duration-300" :class="faq.open ? 'rotate-180' : ''" />
              </button>
              <div class="overflow-hidden transition-all duration-300" :class="faq.open ? 'max-h-40 pb-5' : 'max-h-0'">
                <p class="px-6 text-gray-400 text-sm leading-relaxed">{{ faq.a }}</p>
              </div>
            </div>
          </div>
        </ScrollReveal>
      </div>
    </section>

    <!-- CTA FINAL -->
    <section class="relative py-12 border-t border-white/5 overflow-hidden">
      <div class="absolute top-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-yellow-500/30 to-transparent" />
      <div class="absolute inset-0 bg-linear-to-b from-transparent via-yellow-500/3 to-transparent pointer-events-none" />

      <div class="relative z-10 max-w-350 mx-auto px-4 lg:px-16 text-center">
        <ScrollReveal animation="fade-up" :duration="600">
          <h2 class="text-3xl lg:text-5xl font-black text-white mb-4 leading-tight">
            Prêt à rejoindre<br>
            <span class="text-yellow-400">l'élite COFINA ?</span>
          </h2>
          <p class="text-gray-400 text-sm md:text-base max-w-xl mx-auto mb-10 leading-relaxed">
            Parlez à un conseiller dès aujourd'hui et découvrez comment Cofina Business Touch peut transformer votre activité.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <router-link
              :to="{ name: 'business-club-form' }"
              class="inline-flex items-center justify-center gap-3 bg-linear-to-r from-yellow-500 to-yellow-600 hover:from-yellow-400 hover:to-yellow-500 text-black font-black text-sm px-8 py-4 rounded-2xl shadow-lg shadow-yellow-500/20 transition-all duration-300 hover:-translate-y-0.5"
            >
              <Zap :size="16" />
              Rejoindre Cofina Business Touch
            </router-link>
            <router-link
              to="/contact"
              class="inline-flex items-center justify-center gap-3 text-gray-400 hover:text-white font-bold text-sm px-8 py-4 transition-all duration-300"
            >
              <Phone :size="16" />
              Parler à un conseiller
              <ArrowRight :size="14" />
            </router-link>
          </div>
        </ScrollReveal>
      </div>

      <div class="absolute bottom-12 left-16 w-1.5 h-1.5 bg-yellow-400 rounded-full animate-ping" />
      <div class="absolute top-10 right-20 w-1 h-1 bg-yellow-400/60 rounded-full animate-ping" style="animation-delay:1s" />
    </section>

  </div>
</template>

<style scoped>
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-12px); }
}
.animate-float { animation: float 4s ease-in-out infinite; }
</style>
