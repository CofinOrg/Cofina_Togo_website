<template>
  <div class="min-h-screen bg-gray-50">
    <AdminSidebar />
    <Backdrop />

    <div
      class="transition-all duration-300"
      :class="[
        isExpanded ? 'lg:ml-64' : 'lg:ml-20'
      ]"
    >
      <AdminHeader />

      <main class="p-6">
        <router-view />
      </main>
    </div>
  </div>
</template>

<script setup lang="ts">
import AdminSidebar from '../components/admin/AdminSidebar.vue'
import AdminHeader from '../components/admin/AdminHeader.vue'
import Backdrop from '../components/admin/Backdrop.vue'
import { useSidebar } from '../composables/useSidebar'

const { isExpanded } = useSidebar()
</script>
