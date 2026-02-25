<template>
  <aside
    :class="[
      'fixed left-0 top-0 h-full bg-white border-r border-gray-200 transition-all duration-300 z-40 flex flex-col',
      isExpanded ? 'w-64' : 'w-20',
      isMobileOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'
    ]"
  >
    <!-- Logo -->
    <div class="h-16 flex items-center justify-center border-b border-gray-200 px-4">
      <div v-if="isExpanded" class="flex items-center gap-2">
         <div>
          <img
            src="../../assets/images/accueil/COFINA Logo.png"
            alt="Cofina Togo"
            class="h-10 lg:h-14 w-auto"
          />
        </div>
      </div>
      <div v-else class="flex items-center justify-center">
          <img
            src="../../assets/images/accueil/cofina-signe.png"
            alt="Cofina Togo"
            class="h-10 lg:h-12 w-auto"
          />
      </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4 px-3">
      <div class="space-y-1">
        <!-- Dashboard -->
        <router-link
          to="/admin/home"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <Home class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Tableau de bord</span>
        </router-link>

         <!-- Divider Marketing -->
        <div v-if="isExpanded && (can('menu', 'blog') || can('menu', 'agence') || can('menu', 'preregistration'))" class="px-3 pt-4 pb-2">
          <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Marketing</p>
        </div>

        <!-- Blog -->
        <router-link
          v-if="can('menu', 'blog')"
          to="/Cofinoistg@admin/add-blog"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <PenSquare class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Blog</span>
        </router-link>

        <!-- Insights / Analytics -->
        <router-link
          v-if="can('menu', 'announcement')"
          to="/Cofinoistg@admin/insights"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <BarChart3 class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Performance du site</span>
        </router-link>

        <!-- Agence -->
        <router-link
          v-if="can('menu', 'agence')"
          to="/Cofinoistg@admin/add-agency"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <MapPin class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Agence</span>
        </router-link>

        <router-link
          v-if="can('menu', 'announcement')"
          to="/Cofinoistg@admin/add-announcement"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <Megaphone class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Annonce</span>
        </router-link>

        <router-link
          v-if="can('menu', 'slider')"
          to="/Cofinoistg@admin/add-slider"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <FileSlidersIcon class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Sliders</span>
        </router-link>

        <router-link
          v-if="can('menu', 'service')"
          to="/Cofinoistg@admin/service-product"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <FileSlidersIcon class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Service et Produits</span>
        </router-link>

        <router-link
          v-if="can('menu', 'preregistration') || can('menu', 'service')"
          to="/Cofinoistg@admin/pre-registrations"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <ClipboardList class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Pré-inscriptions</span>
        </router-link>

        <router-link
          v-if="can('menu', 'customermessage') || can('menu', 'service')"
          to="/Cofinoistg@admin/customer-messages"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <MessageSquare class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Messages clients</span>
        </router-link>

        <router-link
          v-if="can('menu', 'businessclubmember') || can('menu', 'service')"
          to="/Cofinoistg@admin/business-club-members"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <Crown class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Business Club</span>
        </router-link>

        <!-- Divider Recrutement -->
        <div v-if="isExpanded && can('menu', 'joboffer')" class="px-3 pt-4 pb-2">
          <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Recrutement</p>
        </div>

        <!-- Offres d'emploi -->
        <router-link
          v-if="can('menu', 'joboffer')"
          to="/Cofinoistg@admin/offer"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <Briefcase class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Offres d'emploi</span>
        </router-link>

        <!-- Candidatures par offre -->
        <router-link
          v-if="can('menu', 'joboffer')"
          to="/Cofinoistg@admin/offer-applications"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <FileText class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Candidatures par offre</span>
        </router-link>

        <!-- Statistiques scoring -->
        <router-link
          v-if="can('menu', 'joboffer')"
          to="/Cofinoistg@admin/scoring-stats"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <BarChart3 class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Statistiques scoring</span>
        </router-link>

        <!-- Candidatures spontanées -->
        <router-link
          v-if="can('menu', 'spontaneousapplication')"
          to="/Cofinoistg@admin/spontaneous-applications"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <Users class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Candidatures spontanées</span>
          <span v-if="isExpanded" class="ml-auto bg-red-100 text-red-600 text-xs font-bold px-2 py-0.5 rounded-full">12</span>
        </router-link>

        <!-- Divider Gestion -->
        <div v-if="isExpanded && can('manage', 'all')" class="px-3 pt-4 pb-2">
          <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Gestion</p>
        </div>

        <!-- Utilisateurs (admin uniquement) -->
        <router-link
          v-if="can('manage', 'all')"
          to="/Cofinoistg@admin/users"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <UserCog class="w-5 h-5 flex-shrink-0" />
          <span v-if="isExpanded" class="font-medium">Utilisateurs</span>
        </router-link>




      </div>
    </nav>
  </aside>
</template>

<script setup lang="ts">
import { Home, PenSquare, BarChart3, MapPin, Briefcase, Users, UserCog, Megaphone, FileSlidersIcon, ClipboardList, MessageSquare, Bell, Crown, FileText } from 'lucide-vue-next'
import { useSidebar } from '../../composables/useSidebar'
import { useAuthStore } from '../../stores/auth'
import { FileSliders } from 'lucide-vue-next'

const { isExpanded, isMobileOpen } = useSidebar()
const authStore = useAuthStore()
const can = (action: string, subject: string) => authStore.can(action, subject)
</script>

<style scoped>
/* Scrollbar styling */
nav::-webkit-scrollbar {
  width: 4px;
}

nav::-webkit-scrollbar-track {
  background: transparent;
}

nav::-webkit-scrollbar-thumb {
  background: #e5e7eb;
  border-radius: 2px;
}

nav::-webkit-scrollbar-thumb:hover {
  background: #d1d5db;
}
</style>
