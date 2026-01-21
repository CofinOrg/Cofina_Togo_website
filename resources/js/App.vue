<script setup lang="ts">

import { ref } from 'vue'
import { RouterLink, useRoute } from 'vue-router'
import { ChevronDown, Facebook, Twitter, Linkedin, Instagram } from 'lucide-vue-next'

const mobileMenuOpen = ref(false)
const simulateursDropdownOpen = ref(false)
const route = useRoute()

// Fermer le dropdown
const closeDropdown = () => {
  simulateursDropdownOpen.value = false
}

</script>


<template>
  <div class="min-h-screen flex flex-col font-sans">
    <!-- Header Cofina -->
<header class="fixed top-0 ml-0 w-full z-50 bg-primary shadow-lg text-white">
  <!-- Bande annonces + réseaux sociaux -->
  <div
    id="annonces"
    class="flex items-center justify-between px-4 py-1 bg-secondary overflow-hidden"
  >
    <!-- Annonce défilante -->
    <div class="flex-1">
      <div class="animate-marquee whitespace-nowrap">
        🔔 Nouvelle offre : Crédit rapide jusqu'à 5 000 000 XOF ! &nbsp;&nbsp;&nbsp;
        🔔 Participez à notre programme de fidélité et gagnez des récompenses ! &nbsp;&nbsp;&nbsp;
        🔔 Suivez nos actualités sur nos réseaux sociaux !
      </div>
    </div>

      <div class="flex gap-3 ml-4">
        <a href="https://facebook.com" target="_blank" class="hover:text-accent">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com" target="_blank" class="hover:text-accent">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://linkedin.com" target="_blank" class="hover:text-accent">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="https://instagram.com" target="_blank" class="hover:text-accent">
          <i class="fab fa-instagram"></i>
        </a>
      </div>


  </div>

  <!-- Bande principale -->
  <div class="bg-primary">
    <div class=" mx-auto lg:pr-8">
      <div class="flex items-center justify-between pb-2 gap-4">
        <!-- Logo -->
        <div class="flex-shrink-0 bg-white px-1 py-1 rounded-br-3xl shadow-md">
          <img
            src="./assets/images/accueil/COFINA Logo.png"
            alt="Cofina Togo"
            class="h-10 lg:h-14 w-auto"
          />
        </div>

        <!-- Navigation Desktop -->
        <nav class="hidden lg:flex items-center gap-6 xl:gap-8 flex-1 justify-center">

          <RouterLink
              to="/"
              class="text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-white hover:text-primary transition-all duration-300"
              active-class="bg-white !text-primary"
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
              Simulateurs
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
          active-class="bg-white !text-primary"
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


    <!-- Bouton flottant rond (chat ou aide) -->
    <div class="fixed bottom-8 right-8 z-50">
      <button
        class="w-14 h-14 bg-primary hover:bg-secondary text-white rounded-full shadow-2xl hover:shadow-3xl transition-all duration-300 flex items-center justify-center group hover:scale-110"
        aria-label="Aide"
      >
        <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>

    <!-- Footer Cofina -->
    <footer class="bg-black text-white relative">
      <!-- Bordure bleue supérieure -->
      <div class="absolute top-0 left-0 right-0 h-1 bg-accent" />

      <div class="max-w-[1400px] mx-auto px-4 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
          <!-- Colonne 1: Cofina TOGO -->
          <div>
            <h3 class="text-primary text-lg font-bold mb-4 uppercase">
              Cofina TOGO
            </h3>
            <p class="text-gray-400 text-sm leading-relaxed">
              L'institution de référence pour l'amélioration du bien-être des ménages et des entreprises en Afrique
            </p>
          </div>

          <!-- Colonne 2: Navigation -->
          <div>
            <h3 class="text-white text-base font-bold mb-4 uppercase">
              Navigation
            </h3>
            <ul class="space-y-2.5">
              <li>
                <RouterLink
                  to="/"
                  class="text-white text-sm hover:text-accent transition-colors duration-300"
                >
                  Accueil
                </RouterLink>
              </li>
              <li>
                <RouterLink
                  to="/a-propos"
                  class="text-white text-sm hover:text-accent transition-colors duration-300"
                >
                  A propos
                </RouterLink>
              </li>
              <li>
                <RouterLink
                  to="/services"
                  class="text-white text-sm hover:text-accent transition-colors duration-300"
                >
                  Produits & Services
                </RouterLink>
              </li>
              <li>
                <RouterLink
                  to="/simulateurs"
                  class="text-white text-sm hover:text-accent transition-colors duration-300"
                >
                  Simulateurs
                </RouterLink>
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
                <a
                  href="/politique-confidentialite"
                  class="text-white text-sm hover:text-accent transition-colors duration-300"
                >
                  Politique de confidentialité
                </a>
              </li>
              <li>
                <a
                  href="/mentions-legales"
                  class="text-white text-sm hover:text-accent transition-colors duration-300"
                >
                  Mentions légales
                </a>
              </li>
              <li>
                <a
                  href="/cookies"
                  class="text-white text-sm hover:text-accent transition-colors duration-300"
                >
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
                <span class="font-medium text-white">Tél :</span> +228 XX XX XX XX
              </li>
              <li class="text-gray-400 text-sm">
                <span class="font-medium text-white">Mail :</span>
                <a
                  href="mailto:info@cofinatogo.com"
                  class="hover:text-accent transition-colors duration-300"
                >
                  info@cofinatogo.com
                </a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Ligne de séparation -->
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
</style>
