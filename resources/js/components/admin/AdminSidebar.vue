<template>
  <aside
    :class="[
      'fixed left-0 top-0 h-full bg-white border-r border-gray-200 transition-all duration-300 z-40',
      isExpanded ? 'w-64' : 'w-20',
      isMobileOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'
    ]"
  >
    <!-- Logo -->
    <div class="h-16 flex items-center justify-center border-b border-gray-200 px-4">
      <div v-if="isExpanded" class="flex items-center gap-2">
         <div >
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
          <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          <span v-if="isExpanded" class="font-medium">Tableau de bord</span>
        </router-link>

         <!-- Divider -->
        <div v-if="isExpanded" class="px-3 pt-4 pb-2">
          <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Marketing</p>
        </div>

        <!-- Blog -->
        <router-link
        to="/Cofinoistg@admin/add-blog"
        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
        active-class="bg-primary/10 text-gray-400"

        >
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
        <span v-if="isExpanded" class="font-medium">Ajouter un blog</span>
        </router-link>

        <!-- Insights / Analytics -->
        <router-link
        to="/Cofinoistg@admin/insights"
        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
        active-class="bg-primary/10 text-gray-400"

        >
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        <span v-if="isExpanded" class="font-medium">Insights</span>
        </router-link>

        <!-- Divider -->
        <div v-if="isExpanded" class="px-3 pt-4 pb-2">
          <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Recrutement</p>
        </div>

        <!-- Offres d'emploi -->
        <router-link
          to="/Cofinoistg@admin/offer"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"
        >
          <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
          <span v-if="isExpanded" class="font-medium">Offres d'emploi</span>
        </router-link>

        <!-- Candidatures spontanées -->
        <router-link
          to="/Cofinoistg@admin/spontaneous-applications"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"

        >
          <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span v-if="isExpanded" class="font-medium">Candidatures spontanées</span>
          <span v-if="isExpanded" class="ml-auto bg-red-100 text-red-600 text-xs font-bold px-2 py-0.5 rounded-full">12</span>
        </router-link>

        <!-- Divider -->
        <div v-if="isExpanded" class="px-3 pt-4 pb-2">
          <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Gestion</p>
        </div>

        <!-- Calendrier -->

        <!-- Utilisateurs -->
        <router-link
          to="/Cofinoistg@admin/users"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"

        >
          <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
          <span v-if="isExpanded" class="font-medium">Utilisateurs</span>
        </router-link>



        <!-- Divider -->
        <div v-if="isExpanded" class="px-3 pt-4 pb-2">
          <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Système</p>
        </div>

        <!-- Paramètres -->
        <router-link
          to="/Cofinoistg@admin/settings"
          class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-primary/10 hover:text-primary transition-colors group"
          active-class="bg-primary/10 text-gray-400"

        >
          <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <span v-if="isExpanded" class="font-medium">Paramètres</span>
        </router-link>
      </div>
    </nav>

    <!-- User Profile at Bottom -->
    <div class="border-t border-gray-200 p-4">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-green-400 to-blue-500 flex items-center justify-center text-white font-bold flex-shrink-0">
          JD
        </div>
        <div v-if="isExpanded" class="flex-1 min-w-0">
          <p class="text-sm font-medium text-gray-900 truncate">John Doe</p>
          <p class="text-xs text-gray-500 truncate">Admin</p>
        </div>
      </div>
    </div>
  </aside>
</template>

<script setup lang="ts">
import { useSidebar } from '../../composables/useSidebar'

const { isExpanded, isMobileOpen } = useSidebar()
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
