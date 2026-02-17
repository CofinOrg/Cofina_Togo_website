<script setup lang="ts">

import { ref, onMounted } from 'vue'
import { RouterLink, useRoute } from 'vue-router'
import { ChevronDown } from 'lucide-vue-next'
import api from '../utils/api'
import ChatBot from '../components/ChatBot.vue'


const mobileMenuOpen = ref(false)
const simulateursDropdownOpen = ref(false)
const route = useRoute()

const filiales = [
  { name: 'Groupe COFINA', flag: '', label: 'G', url: 'https://www.groupecofina.com' },
  { name: 'COFINA Togo', flag: 'https://flagcdn.com/w80/tg.png', url: 'https://www.cofinatogo.com' },
  { name: 'COFINA Burkina', flag: 'https://flagcdn.com/w80/bf.png', url: 'https://www.cofinaburkina.com' },
  { name: 'COFINA Côte d\'Ivoire', flag: 'https://flagcdn.com/w80/ci.png', url: 'https://www.cofinacotedivoire.com' },
  { name: 'COFINA Congo', flag: 'https://flagcdn.com/w80/cg.png', url: 'https://www.cofinacongo.com' },
  { name: 'COFINA Gabon', flag: 'https://flagcdn.com/w80/ga.png', url: 'https://www.cofinagabon.com' },
  { name: 'COFINA Guinée', flag: 'https://flagcdn.com/w80/gn.png', url: 'https://www.cofinaguinee.com' },
  { name: 'COFINA Mali', flag: 'https://flagcdn.com/w80/ml.png', url: 'https://www.cofinamali.com' },
  { name: 'COFINA Sénégal', flag: 'https://flagcdn.com/w80/sn.png', url: 'https://www.cofinasenegal.com' },
]

// Fermer le dropdown
const closeDropdown = () => {
  simulateursDropdownOpen.value = false
}

// Annonce defilante
const announcement = ref<any>(null)

const fetchAnnouncement = async () => {
  try {
    const response = await api.get('/announcements')
    const list = response.data.data || response.data
    // Prendre la premiere annonce publiee (la plus recente, l'API trie par id desc)
    const published = list.find((a: any) => a.is_published)
    if (published) {
      announcement.value = published
    }
  } catch (error) {
    console.error('Erreur lors du chargement de l\'annonce', error)
  }
}

onMounted(() => {
  fetchAnnouncement()
})

</script>


<template>
  <div class="min-h-screen flex flex-col font-sans">
<header class="fixed top-0 ml-0 w-full z-50 bg-primary shadow-lg text-white">
  <!-- Bande annonces + réseaux sociaux -->
  <div
    v-if="announcement"
    id="annonces"
    class="flex items-center justify-between px-4 py-1 bg-secondary overflow-hidden"
  >
    <!-- Annonce défilante -->
    <div class="flex-1 overflow-hidden">
      <div class="animate-marquee whitespace-nowrap">
        {{ announcement.content }}
      </div>
    </div>

      <div class="flex gap-3 ml-4">
        <a href="https://www.facebook.com/share/1A8AURXRrs/?mibextid=wwXIfr" target="_blank" class="hover:text-accent">
          <i class="fab fa-facebook-f"></i>
        </a>
     <!--<a href="https://twitter.com" target="_blank" class="hover:text-accent">
          <i class="fab fa-twitter"></i>
        </a> -->
        <a href="https://www.linkedin.com/company/101791086/admin/dashboard/" target="_blank" class="hover:text-accent">
          <i class="fab fa-linkedin-in"></i>
        </a>
       <!--  <a href="https://instagram.com" target="_blank" class="hover:text-accent">
          <i class="fab fa-instagram"></i>
        </a> -->
      </div>


  </div>

  <!-- Bande principale -->
  <div class="bg-primary">
    <div class=" mx-auto lg:pr-8">
      <div class="flex items-center justify-between pb-2 gap-4">
        <!-- Logo -->
        <a class="flex-shrink-0 bg-white px-1 py-1 rounded-br-3xl shadow-md cursor-pointer" href="/">
          <img
            src="../assets/images/accueil/COFINA Logo.png"
            alt="Cofina Togo"
            class="h-10 lg:h-14 w-auto"
          />
        </a>

        <!-- Navigation Desktop -->
        <nav class="hidden lg:flex items-center gap-6 xl:gap-8 flex-1 justify-center">

          <RouterLink
              to="/"
              class="text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-white hover:text-primary transition-all duration-300"
              exact-active-class="bg-white !text-primary"
          >
              Accueil
          </RouterLink>


          <RouterLink
            to="/a-propos"
            class="text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-white hover:text-primary transition-all duration-300"
            active-class="bg-white !text-primary"
          >
            A propos
          </RouterLink>


          <RouterLink
            to="/services"
            class="text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-white hover:text-primary transition-all duration-300"
            active-class="bg-white !text-primary"
          >
            Nos Produits & Services
          </RouterLink>

          <!-- Menu déroulant Simulateurs -->
          <div
            class="relative"
            @mouseenter="simulateursDropdownOpen = true"
            @mouseleave="simulateursDropdownOpen = false"
          >
            <button
              class="text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-white hover:text-primary transition-all duration-300 flex items-center gap-1"
              :class="{'!bg-white !text-primary': route.path.startsWith('/simulateurs')}"
            >
              Simulateurs et convertisseur
              <ChevronDown :size="16" :class="{'rotate-180': simulateursDropdownOpen}" class="transition-transform duration-300" />
            </button>

            <!-- Dropdown menu - conteneur avec padding pour éviter le gap -->
            <div
              v-show="simulateursDropdownOpen"
              class="absolute top-full left-0 pt-2 z-50"
            >
              <div class="w-56 bg-white rounded-lg shadow-xl border border-gray-200 py-2 animate-dropdown">
                <RouterLink
                  to="/simulateurs-dat"
                  class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors"
                  @click="closeDropdown"
                >
                  <div class="font-medium">Simulateur de DAT</div>
                </RouterLink>

                <div class="border-t border-gray-100 my-1"></div>

                <RouterLink
                  to="/simulateurs"
                  class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors"
                  @click="closeDropdown"
                >
                  <div class="font-medium">Simulateur de crédit</div>
                </RouterLink>

                <div class="border-t border-gray-100 my-1"></div>

                <RouterLink
                  to="/simulateurs-convertisseur-devise"
                  class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors"
                  @click="closeDropdown"
                >
                  <div class="font-medium">Convertisseur de devise</div>
                </RouterLink>

              </div>
            </div>
          </div>

           <RouterLink
            to="/carrieres"
            class="text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-white hover:text-primary transition-all duration-300"
            active-class="bg-white !text-primary"
          >
            Carrière
          </RouterLink>

        </nav>

        <!-- Contact Button -->
        <div class="hidden lg:flex flex-shrink-0">
          <RouterLink
            to="/contact"
            class="inline-block text-primary bg-white px-6 py-1.5 rounded-full text-sm font-bold hover:bg-gray-100 hover:shadow-xl transition-all duration-300"
          >
            Contactez nous
          </RouterLink>
        </div>

        <!-- Menu Mobile Button -->
        <button
          class="lg:hidden text-white p-2 hover:bg-white hover:text-primary rounded transition-all"
          @click="mobileMenuOpen = !mobileMenuOpen"
        >
          <svg
            class="w-6 h-6"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              v-if="!mobileMenuOpen"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"
            />
            <path
              v-else
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>
      </div>

      <!-- Navigation Mobile -->
      <nav
        v-if="mobileMenuOpen"
        class="lg:hidden pb-4 space-y-2 border-t border-white/20 pt-4"
      >
        <RouterLink
          to="/"
          class="block text-white text-sm font-medium py-2 px-4 rounded hover:bg-white hover:text-primary transition-all"
          exact-active-class="bg-white !text-primary"
          @click="mobileMenuOpen = false"
        >
          Accueil
        </RouterLink>
        <RouterLink
          to="/a-propos"
          class="block text-white text-sm font-medium py-2 px-4 rounded hover:bg-white hover:text-primary transition-all"
          active-class="bg-white !text-primary"
          @click="mobileMenuOpen = false"
        >
          A propos
        </RouterLink>

        <RouterLink
          to="/services"
          class="block text-white text-sm font-medium py-2 px-4 rounded hover:bg-white hover:text-primary transition-all"
          active-class="bg-white !text-primary"
          @click="mobileMenuOpen = false"
        >
          Nos Produits & Services
        </RouterLink>

        <RouterLink
          to="/simulateurs"
          class="block text-white text-sm font-medium py-2 px-4 rounded hover:bg-white hover:text-primary transition-all"
          active-class="bg-white !text-primary"
          @click="mobileMenuOpen = false"
        >
          Simulateurs
        </RouterLink>

        <RouterLink
          to="/carrieres"
          class="block text-white text-sm font-medium py-2 px-4 rounded hover:bg-white hover:text-primary transition-all"
          active-class="bg-white !text-primary"
          @click="mobileMenuOpen = false"
        >

          Carrière
        </RouterLink>
        <RouterLink
          to="/contact"
          class="block text-primary text-sm font-bold py-2 px-4 bg-white rounded-full text-center mt-4"
          @click="mobileMenuOpen = false"
        >
          Contactez nous
        </RouterLink>
      </nav>
    </div>
  </div>
</header>


    <!-- Contenu principal -->
    <main class="flex-1 bg-gray-50 pt-[100px]">
      <RouterView />
    </main>


    <!-- Chatbot -->
    <ChatBot />

    <!-- Footer Cofina -->
    <footer class="bg-black text-white relative">
        <!-- Bordure bleue supérieure -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-accent"></div>

        <div class="max-w-[1400px] mx-auto px-4 lg:px-8 py-12 lg:py-16">
            <!-- Contenu principal du footer -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
                <!-- Colonne 1: Cofina TOGO -->
                <div>
                   <img src="../assets/images/accueil/Logos-10-ans-Groupe-Cofina.png" alt="Logo Cofina" class="w-48 mb-4" />
                    <p class="text-gray-400 text-sm leading-relaxed">
                        COFINA, Compagnie Financière Africaine crée en 2014, est une institution opérant dans le secteur de la méso finance.
                    </p>
                </div>

                <!-- Colonne 2: Navigation -->
                <div>
                    <h3 class="text-white text-base font-bold mb-4 uppercase">
                        Navigation
                    </h3>
                    <ul class="space-y-2.5">
                        <li>
                            <a href="/" class="text-white text-sm hover:text-accent transition-colors duration-300">
                                Accueil
                            </a>
                        </li>
                        <li>
                            <a href="/a-propos" class="text-white text-sm hover:text-accent transition-colors duration-300">
                                A propos
                            </a>
                        </li>
                        <li>
                            <a href="/services" class="text-white text-sm hover:text-accent transition-colors duration-300">
                                Produits & Services
                            </a>
                        </li>
                        <li>
                            <a href="/simulateurs" class="text-white text-sm hover:text-accent transition-colors duration-300">
                                Simulateurs
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Colonne 3: Légal -->
                <div>
                    <h3 class="text-white text-base font-bold mb-4 uppercase">
                        Légal
                    </h3>
                    <ul class="space-y-2.5">
                        <li>
                            <a href="/politique-confidentialite" class="text-white text-sm hover:text-accent transition-colors duration-300">
                                Politique de confidentialité
                            </a>
                        </li>
                        <li>
                            <a href="/mentions-legales" class="text-white text-sm hover:text-accent transition-colors duration-300">
                                Mentions légales
                            </a>
                        </li>
                        <li>
                            <a href="/cookies" class="text-white text-sm hover:text-accent transition-colors duration-300">
                                Cookies & données
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Colonne 4: Contacts -->
                <div>
                    <h3 class="text-white text-base font-bold mb-4 uppercase">
                        Contacts
                    </h3>
                    <ul class="space-y-2.5">
                        <li class="text-gray-400 text-sm">
                            <span class="font-medium text-white">Lomé, Togo</span>
                        </li>
                        <li class="text-gray-400 text-sm">
                            <span class="font-medium text-white">Tél :</span> +228 92 68 60 60 - +228 22 23 68 68
                        </li>
                        <li class="text-gray-400 text-sm">
                            <span class="font-medium text-white">Mail :</span>
                            <a href="mailto:info@cofinatogo.com" class="hover:text-accent transition-colors duration-300">
                                service-client.tg@cofinacorp.com
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Section des filiales COFINA (défilante) -->
            <div class="mt-12 pt-8  overflow-hidden">
                <div class="filiales-scroll">
                    <a
                      v-for="(filiale, index) in [...filiales, ...filiales]"
                      :key="index"
                      :href="filiale.url"
                      target="_blank"
                      rel="noopener noreferrer"
                      class="text-center flex-shrink-0 px-4 hover:opacity-80 transition-opacity"
                    >
                        <div class="w-10 h-10 mx-auto mb-2 bg-white rounded-full flex items-center justify-center overflow-hidden">
                            <!-- Groupe COFINA : lettre G -->
                            <div
                              v-if="filiale.label"
                              class="w-7 h-7 rounded-full bg-gradient-to-br from-red-600 to-pink-500 flex items-center justify-center"
                            >
                                <span class="text-white text-xs font-bold">{{ filiale.label }}</span>
                            </div>
                            <!-- Autres filiales : drapeau -->
                            <img
                              v-else
                              :src="filiale.flag"
                              :alt="filiale.name"
                              class="w-7 h-7 rounded-full object-cover"
                            />
                        </div>
                        <p class="text-[10px] text-gray-400 font-medium whitespace-nowrap">{{ filiale.name }}</p>
                    </a>
                </div>
            </div>

            <!-- Ligne de séparation et copyright -->
            <div class="border-t border-gray-800 mt-10 pt-6">
                <p class="text-gray-500 text-sm text-center">
                    © 2025 Cofina Togo. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>
  </div>
</template>

<style scoped>
@keyframes marquee {
  0% { transform: translateX(100%); }
  100% { transform: translateX(-100%); }
}

.animate-marquee {
  display: inline-block;
  white-space: nowrap;
  animation: marquee 20s linear infinite;
}

@keyframes dropdown {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-dropdown {
  animation: dropdown 0.1s ease-out;
}

@keyframes scroll-filiales {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.filiales-scroll {
  display: flex;
  animation: scroll-filiales 20s linear infinite;
  width: max-content;
}

.filiales-scroll:hover {
  animation-play-state: paused;
}
</style>
