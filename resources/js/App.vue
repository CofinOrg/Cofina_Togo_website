<template>
  <router-view />
</template>

<script setup lang="ts">
import { useSidebarProvider } from './composables/useSidebar'

// Initialiser le provider pour toute l'application
useSidebarProvider()
</script>
