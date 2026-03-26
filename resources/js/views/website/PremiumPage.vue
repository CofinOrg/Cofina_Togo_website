<script setup>
import { ref } from 'vue'
import { Star, Zap, Users, Shield, Crown, Building2, Phone, ArrowRight, CheckCircle2, ChevronDown } from 'lucide-vue-next'
import ScrollReveal from '@/components/ScrollReveal.vue'
import goldBallImage from '../../../../public/images/Ellipse-removebg-preview.png'


const privilegeFeatures = [
  { icon: Crown, title: 'Gestionnaire attitré', desc: 'Un conseiller dédié qui connaît votre profil et anticipe vos besoins.' },
  { icon: Star, title: 'Taux préférentiels', desc: 'Des conditions de crédit et d\'épargne négociées exclusivement pour vous.' },
  { icon: Shield, title: 'Accueil prioritaire', desc: 'Un espace dédié en agence pour éviter toute attente.' },
  { icon: Zap, title: 'Réactivité garantie', desc: 'Traitement express de vos dossiers avec un délai de réponse réduit.' },
]

const privilegeAvantages = [
  'Taux d\'intérêt préférentiels sur vos crédits',
  'Rémunération bonifiée sur votre épargne',
  'Frais de dossier réduits',
  'Accueil VIP en agence sans attente',
  'Gestionnaire personnel disponible 6j/7',
  'Relevés de compte personnalisés',
]

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
  { q: 'Comment accéder à CofiPrivilège ?', a: 'CofiPrivilège est accessible sur critères d\'éligibilité liés à votre ancienneté et à vos encours. Contactez votre agence pour en savoir plus.', open: false },
  { q: 'Business Touch est-il réservé aux grandes entreprises ?', a: 'Non, Business Touch s\'adresse aussi bien aux TPE, PME qu\'aux entrepreneurs individuels avec un potentiel de développement.', open: false },
  { q: 'Y a-t-il des frais supplémentaires pour ces services ?', a: 'L\'adhésion à nos espaces premium peut nécessiter un dépôt minimum ou des encours spécifiques. Les conditions détaillées sont disponibles en agence.', open: false },
  { q: 'Puis-je cumuler CofiPrivilège et Business Touch ?', a: 'Oui, si vous êtes à la fois particulier éligible et entrepreneur actif, vous pouvez bénéficier des deux offres simultanément.', open: false },
])

const toggleFaq = (i) => { faqs.value[i].open = !faqs.value[i].open }
</script>

<template>
  <div class="bg-[#060D1A] min-h-screen overflow-hidden">

    <!-- HERO -->
    <section class="relative pt-18 pb-20 overflow-hidden">

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
                    <Star :size="12" fill="#D4AF37" stroke="none" />
                    Espaces exclusifs COFINA
                    <Star :size="12" fill="#D4AF37" stroke="none" />
                </span>
                </ScrollReveal>

                <ScrollReveal animation="fade-up" :duration="700" :delay="100">
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-white leading-[1.05] tracking-tight mb-6">
                    L'excellence<br>
                    <span class="text-transparent bg-clip-text bg-linear-to-r from-yellow-300 via-yellow-400 to-yellow-600">
                    à votre service
                    </span>
                </h1>

                <p class="text-gray-400 text-base md:text-lg leading-relaxed">
                    COFINA Togo propose deux espaces premium conçus pour une clientèle exigeante — particuliers fortunés et entrepreneurs ambitieux.
                </p>
                </ScrollReveal>

                <ScrollReveal animation="fade-up" :duration="600" :delay="200">
                <div class="flex flex-col sm:flex-row gap-4 mt-10">
                    <a href="#cofiprivilege" class="inline-flex items-center gap-2 bg-yellow-500/10 border border-yellow-500/30 text-yellow-300 font-bold text-sm px-6 py-3 rounded-xl hover:bg-yellow-500/20 transition-all duration-300">
                    <Crown :size="16" />
                    CofiPrivilège
                    </a>
                    <a href="#business-touch" class="inline-flex items-center gap-2 bg-white/5 border border-white/15 text-white font-bold text-sm px-6 py-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                    <Building2 :size="16" />
                    Business Touch
                    </a>
                </div>
                </ScrollReveal>

            </div>

            <!-- RIGHT (BALL) -->
            <div class="relative flex justify-center lg:justify-end w-full">
                <div class="relative animate-float">
                <div class="absolute inset-0 bg-yellow-400/30 rounded-full blur-2xl animate-pulse" />
                <img :src="goldBallImage" alt="CofiPrivilège" class="relative w-70 h-70 object-contain drop-shadow-2xl" />
                </div>
            </div>

            </div>
        </div>

    </section>

    <!-- COFIPRIVILÈGE -->
    <section id="cofiprivilege" class="relative py-10 border-t border-white/5">
      <div class="absolute top-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-yellow-500/40 to-transparent" />

      <div class="max-w-350 mx-auto px-4 lg:px-16">
        <ScrollReveal animation="fade-up" :duration="600">
          <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16">
            <div>
              <span class="inline-flex items-center gap-2 text-yellow-400 text-xs font-black uppercase tracking-[0.25em] mb-3">
                <span class="w-8 h-px bg-yellow-400 inline-block" />
                Pour les particuliers
              </span>
              <h2 class="text-3xl lg:text-5xl font-black text-white leading-tight">
                Cofi<span class="text-yellow-400">Privilège</span>
              </h2>
              <p class="text-gray-400 text-sm md:text-base mt-3 max-w-xl leading-relaxed">
                Un programme de fidélité haut de gamme qui récompense votre confiance avec des avantages exclusifs et un accompagnement personnalisé.
              </p>
            </div>
            <router-link
              :to="{ name: 'pack-form', params: { productId: 5 } }"
              class="inline-flex items-center gap-3 bg-linear-to-r from-yellow-500 to-yellow-600 hover:from-yellow-400 hover:to-yellow-500 text-black font-black text-sm px-8 py-4 rounded-2xl shadow-lg shadow-yellow-500/20 hover:shadow-yellow-500/40 transition-all duration-300 hover:-translate-y-0.5 shrink-0 self-start lg:self-auto"
            >
              <Crown :size="16" />
              Rejoindre CofiPrivilège
            </router-link>
          </div>
        </ScrollReveal>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-start">
          <ScrollReveal animation="fade-left" :duration="700" :stagger="true" :stagger-delay="100" class="space-y-4">
            <div
              v-for="(f, i) in privilegeFeatures" :key="i"
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

          <ScrollReveal animation="fade-right" :duration="700" :delay="150">
            <div class="bg-linear-to-br from-yellow-500/8 to-yellow-600/3 border border-yellow-500/20 rounded-3xl p-8">
              <h3 class="text-white font-black text-lg mb-6 flex items-center gap-3">
                <Star :size="18" fill="#D4AF37" stroke="none" class="text-yellow-400" />
                Vos avantages inclus
              </h3>
              <ul class="space-y-4">
                <li v-for="(a, i) in privilegeAvantages" :key="i" class="flex items-center gap-3 text-gray-300 text-sm">
                  <CheckCircle2 :size="16" class="text-yellow-400 shrink-0" />
                  {{ a }}
                </li>
              </ul>
              <div class="mt-8 pt-6 border-t border-yellow-500/15">
                <p class="text-gray-500 text-xs leading-relaxed">Éligibilité sur critères d'ancienneté et d'encours. Conditions disponibles en agence.</p>
              </div>
            </div>
          </ScrollReveal>
        </div>
      </div>
    </section>

    <!-- SÉPARATEUR -->
    <div class="relative py-10 overflow-hidden">
      <div class="absolute inset-0 flex items-center">
        <div class="w-full h-px bg-linear-to-r from-transparent via-yellow-500/20 to-transparent" />
      </div>
      <div class="relative flex justify-center">
        <div class="flex items-center gap-4 bg-[#060D1A] px-8">
          <div class="w-1.5 h-1.5 rounded-full bg-yellow-500/40" />
          <Star :size="14" fill="#D4AF37" stroke="none" class="text-yellow-400 opacity-60" />
          <div class="w-1.5 h-1.5 rounded-full bg-yellow-500/40" />
        </div>
      </div>
    </div>

    <!-- BUSINESS TOUCH -->
    <section id="business-touch" class="relative py-8">
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
              Rejoindre Business Touch
            </router-link>
          </div>
        </ScrollReveal>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-start">
          <ScrollReveal animation="fade-left" :duration="700">
            <div class="bg-white/3 border border-white/8 rounded-3xl p-8">
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
              <div class="mt-8 pt-6 border-t border-white/8">
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
            <p class="text-gray-500 text-sm">Tout ce que vous devez savoir avant de rejoindre nos espaces premium.</p>
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
            Parlez à un conseiller dès aujourd'hui et découvrez l'offre qui correspond à votre profil.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <router-link
              :to="{ name: 'pack-form', params: { productId: 5 } }"
              class="inline-flex items-center justify-center gap-3 bg-linear-to-r from-yellow-500 to-yellow-600 hover:from-yellow-400 hover:to-yellow-500 text-black font-black text-sm px-8 py-4 rounded-2xl shadow-lg shadow-yellow-500/20 transition-all duration-300 hover:-translate-y-0.5"
            >
              <Crown :size="16" />
              CofiPrivilège
            </router-link>
            <router-link
              :to="{ name: 'business-club-form' }"
              class="inline-flex items-center justify-center gap-3 bg-white/8 hover:bg-white/15 border border-white/15 text-white font-black text-sm px-8 py-4 rounded-2xl transition-all duration-300 hover:-translate-y-0.5"
            >
              <Zap :size="16" />
              Business Touch
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
