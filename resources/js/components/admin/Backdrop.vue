<template>
  <Transition name="fade">
    <div
      v-if="isMobileOpen"
      @click="toggleMobileSidebar"
      class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden"
    ></div>
  </Transition>
</template>

<script setup lang="ts">
import { useSidebar } from '../../composables/useSidebar'

const { isMobileOpen, toggleMobileSidebar } = useSidebar()
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
