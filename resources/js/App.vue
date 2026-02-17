<template>
  <router-view />
</template>

<script setup lang="ts">
import { useSidebarProvider } from './composables/useSidebar'
import { useAuthStore } from './stores/auth'

// Initialiser le provider pour toute l'application
useSidebarProvider()

// Restaurer l'état d'authentification depuis le storage
const authStore = useAuthStore()
authStore.loadFromStorage()
</script>
