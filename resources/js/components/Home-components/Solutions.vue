<script setup>
import { ref } from 'vue'
import { User, Briefcase, Landmark } from 'lucide-vue-next'
import { useRouter } from 'vue-router'
import {goToDetail} from '@/utils/functions.js'

const router = useRouter();


// Onglet actif
const activeTab = ref('credits')

// Données des crédits
const credits = [
  {
    icon: User,
    id: 'credit-particulier',
    title: 'Crédits particuliers',
    description: 'Concrétisez vos projets personnels avec nos solutions de financement flexibles.',
    link: '/credits/particuliers',
    linkText: 'Voir les conditions d\'éligibilité →'
  },
  {
    icon: Briefcase,
    id: 'credit-pme',
    title: 'Crédit PME/Entrepreneur',
    description: 'Boostez la croissance de votre activité avec un financement totalement sur-mesure.',
    link: '/credits/pme',
    linkText: 'Voir les conditions d\'éligibilité →'
  },
  {
    icon: Landmark,
    id: 'credit-insitutionnel',
    title: 'Crédit Institutionnel',
    description: 'Solutions d\'envergure pour les grands comptes et ONG/FONA',
    link: '/credits/institutionnel',
    linkText: 'Voir les conditions d\'éligibilité →'
  }
]

// Données des packs
const packs = [
  {
    title: 'Pack Woezon',
    id : 'pack-woezon',
    description: 'L\'essentiel pour bien démarrer votre épargne bancaire.',
    link: '/packs/woezon',
    featured: false
  },
  {
    title: 'Pack Solo',
    id: 'pack-solo',
    badge: 'Populaire',
    description: 'Destiné aux PME avec un crédit d\'usance, 10 opérations FCFA, versement et retrait sans frais.',
    link: '/packs/solo',
    featured: true
  },
  {
    title: 'Pack association',
    id : 'pack-association',
    description: 'Dédié aux GIE, ONG, organisations, coopératives, CofiCards, accès Cofina Mobile, frais de tenue de compte',
    link: '/packs/association',
    featured: false
  }
]

const changeTab = (tab) => {
  activeTab.value = tab
}
</script>

<template>
  <section class="py-16 md:py-20 bg-gray-50">
    <div class="max-w-[1400px] mx-auto px-4 lg:px-32">
      <!-- Titre de la section -->
      <div class="text-center mb-8 md:mb-10">
        <h2 class="text-gray-900 text-3xl md:text-4xl lg:text-5xl font-bold mb-4">
          Nos solutions financières
        </h2>
        <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto">
          Des produits adaptés à chaque étape de votre vie, ou de vos ambitions entreprise
        </p>
      </div>

      <!-- Onglets -->
      <div class="flex justify-center gap-4 mb-12">
        <button
          @click="changeTab('credits')"
          :class="[
            'px-8 py-3 rounded-full text-sm md:text-base font-bold transition-all duration-300',
            activeTab === 'credits'
              ? 'bg-primary text-white shadow-lg'
              : 'bg-white text-gray-700 border-2 border-gray-300 hover:border-primary'
          ]"
        >
          Crédits
        </button>
        <button
          @click="changeTab('epargne')"
          :class="[
            'px-8 py-3 rounded-full text-sm md:text-base font-bold transition-all duration-300',
            activeTab === 'epargne'
              ? 'bg-primary text-white shadow-lg'
              : 'bg-white text-gray-700 border-2 border-gray-300 hover:border-primary'
          ]"
        >
          Épargne
        </button>
      </div>

      <!-- Contenu des onglets -->
      <div>
        <!-- Onglet Crédits -->
        <div v-if="activeTab === 'credits'" class="animate-fade-in">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 mb-16">
            <div
              v-for="(credit, index) in credits"
              :key="index"
              class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 lg:p-4 border border-gray-100 hover:-translate-y-1 group"
            >
              <!-- Icône -->
              <div class="w-12 h-12 bg-pink-50 rounded-lg flex items-center justify-center mb-4 group-hover:bg-primary group-hover:scale-110 transition-all duration-300">
                <component
                  :is="credit.icon"
                  class="w-6 h-6 text-primary group-hover:text-white transition-colors duration-300"
                />

              </div>

              <!-- Titre -->
              <h3 class="text-gray-900 text-xl font-bold mb-3">
                {{ credit.title }}
              </h3>

              <!-- Description -->
              <p class="text-gray-600 text-sm leading-relaxed mb-6">
                {{ credit.description }}
              </p>

              <!-- Lien -->
              <a
                :href="credit.link"
                class="inline-flex items-center text-primary text-sm font-semibold hover:gap-2 gap-1 transition-all duration-300"
              >
                {{ credit.linkText }}
              </a>
            </div>
          </div>
        </div>

        <!-- Onglet Épargne (à implémenter selon vos besoins) -->
        <div v-if="activeTab === 'epargne'" class="animate-fade-in">
          <div class="text-center py-12">
            <p class="text-gray-600 text-lg">
              Contenu Épargne à venir...
            </p>
          </div>
        </div>
      </div>

      <!-- Section Packs -->
      <div class="mt-16">
        <!-- Titre des packs -->
        <div class="text-center mb-10">
          <h2 class="text-primary text-2xl md:text-3xl lg:text-4xl font-bold">
            Des packs qui vous correspondent...
          </h2>
        </div>

        <!-- Cartes des packs -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
          <div
            v-for="(pack, index) in packs"
            :key="index"
            :class="[
              'bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border-2 hover:-translate-y-1 relative',
              pack.featured ? 'border-primary' : 'border-gray-200'
            ]"
          >
            <!-- Badge Populaire -->
            <div
              v-if="pack.badge"
              class="absolute -top-3 left-1/2 -translate-x-1/2 bg-primary text-white text-xs font-bold px-4 py-1 rounded-full"
            >
              {{ pack.badge }}
            </div>

            <!-- Titre -->
            <h3
              :class="[
                'text-xl md:text-2xl font-bold mb-4 text-center',
                pack.title === 'Pack association' ? 'text-gold' : 'text-gray-900'
              ]"
            >
              {{ pack.title }}
            </h3>

            <!-- Description -->
            <p class="text-gray-600 text-sm leading-relaxed mb-6 text-center min-h-[80px]">
              {{ pack.description }}
            </p>

            <!-- Bouton -->
            <a
              @click="goToDetail(pack.id,router)"
              :class="[
                'block w-full text-center px-6 py-3 rounded-lg text-sm font-bold transition-all duration-300',
                pack.featured
                  ? 'bg-primary text-white hover:bg-secondary shadow-md hover:shadow-lg'
                  : 'bg-white text-primary border-2 border-primary hover:bg-primary hover:text-white'
              ]"
            >
              Souscrire
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* Animation de fade-in */
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
  animation: fadeIn 0.5s ease-out;
}
</style>
