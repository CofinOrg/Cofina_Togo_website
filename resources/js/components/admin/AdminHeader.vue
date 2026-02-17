<template>
  <header class="bg-white border-b border-gray-200 sticky top-0 z-30">
    <div class="flex items-center justify-between px-4 py-3">

      <!-- Left Section: Toggle + Search -->
      <div class="flex items-center gap-4 flex-1">
        <!-- Mobile Menu Toggle -->
        <button
          @click="toggleMobileSidebar"
          class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors"
        >
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

        <!-- Desktop Sidebar Toggle -->
        <button
          @click="toggleSidebar"
          class="hidden lg:block p-2 rounded-lg hover:bg-gray-100 transition-colors"
        >
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

        <!-- Search Bar -->
        <div class="hidden md:flex items-center flex-1 max-w-xl">
          <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <input
              type="text"
              placeholder="Rechercher..."
              class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            />
          </div>
        </div>
      </div>

      <!-- Right Section: Actions + User -->
      <div class="flex items-center gap-3">

        <!-- Search Icon (Mobile) -->
        <button class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </button>

        <!-- Notifications -->
        <div class="relative">
          <button
            @click="showNotifications = !showNotifications; if(showNotifications) fetchNotifications()"
            class="relative p-2 rounded-lg hover:bg-gray-100 transition-colors"
          >
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <!-- Notification Badge -->
            <span
              v-if="unreadCount > 0"
              class="absolute -top-1 -right-1 min-w-5 h-5 px-1 bg-red-500 rounded-full text-white text-xs flex items-center justify-center font-bold"
            >
              {{ unreadCount > 99 ? '99+' : unreadCount }}
            </span>
          </button>

          <!-- Notifications Dropdown -->
          <Transition name="dropdown">
            <div
              v-if="showNotifications"
              v-click-outside="() => showNotifications = false"
              class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden"
            >
              <div class="px-4 py-3 border-b border-gray-200">
                <div class="flex items-center justify-between">
                  <h3 class="text-sm font-semibold text-gray-900">Notifications</h3>
                  <span
                    v-if="unreadCount > 0"
                    @click="markAllAsRead"
                    class="text-xs text-blue-600 font-medium cursor-pointer hover:underline"
                  >
                    Tout marquer comme lu
                  </span>
                </div>
              </div>
              <div class="max-h-96 overflow-y-auto">
                <!-- Empty State -->
                <div v-if="notifications.length === 0" class="px-4 py-8 text-center">
                  <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                  </svg>
                  <p class="text-sm text-gray-500">Aucune notification</p>
                </div>

                <!-- Notification Items -->
                <div
                  v-for="notif in notifications"
                  :key="notif.id"
                  @click="markAsRead(notif.id)"
                  class="px-4 py-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100"
                  :class="{ 'bg-blue-50/50': !notif.is_read }"
                >
                  <div class="flex gap-3">
                    <div
                      class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                      :class="getNotificationIcon(notif.type).bg"
                    >
                      <svg
                        class="w-5 h-5"
                        :class="getNotificationIcon(notif.type).color"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                      <p class="text-sm font-medium text-gray-900" :class="{ 'font-semibold': !notif.is_read }">
                        {{ notif.title }}
                      </p>
                      <p class="text-sm text-gray-500 truncate">{{ notif.message }}</p>
                      <p class="text-xs text-gray-400 mt-1">{{ formatTimeAgo(notif.created_at) }}</p>
                    </div>
                    <div v-if="!notif.is_read" class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0 mt-2"></div>
                  </div>
                </div>
              </div>
              <div v-if="notifications.length > 0" class="px-4 py-3 bg-gray-50 text-center">
                <router-link
                  to="/Cofinoistg@admin/notifications"
                  class="text-sm text-blue-600 font-medium hover:underline"
                  @click="showNotifications = false"
                >
                  Voir toutes les notifications
                </router-link>
              </div>
            </div>
          </Transition>
        </div>

        <!-- Messages -->
    <!--     <button class="relative p-2 rounded-lg hover:bg-gray-100 transition-colors">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
          <span class="absolute top-1 right-1 w-5 h-5 bg-blue-600 rounded-full text-white text-xs flex items-center justify-center font-bold">3</span>
        </button> -->

        <!-- Divider -->
        <div class="hidden md:block w-px h-8 bg-gray-300"></div>

        <!-- User Menu -->
        <div class="relative">
          <button
            @click="showUserMenu = !showUserMenu"
            class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-gray-100 transition-colors"
          >
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-background/50 to-primary flex items-center justify-center text-white font-bold text-sm">
              {{ userInitials }}
            </div>
            <div class="hidden md:block text-left">
              <p class="text-sm font-medium text-gray-900">{{ userName }}</p>
              <p class="text-xs text-gray-500">{{ userProfile }}</p>
            </div>
            <svg class="hidden md:block w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <!-- User Dropdown -->
          <Transition name="dropdown">
            <div
              v-if="showUserMenu"
              v-click-outside="() => showUserMenu = false"
              class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden"
            >
              <div class="px-4 py-3 border-b border-gray-200">
                <p class="text-sm font-semibold text-gray-900">{{ userName }}</p>
                <p class="text-xs text-gray-500">{{ userEmail }}</p>
              </div>
              <div class="py-2">
                <router-link to="/Cofinoistg@admin/profile" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" @click="showUserMenu = false">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                  Mon profil
                </router-link>

              </div>
              <div class="py-2">

               <router-link to="/Cofinoistg@admin/notifications" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" @click="showUserMenu = false">

                <Bell class="w-5 h-5 flex-shrink-0" />
                <span  class="font-medium">Notifications</span>
                </router-link>
              </div>

              <div class="border-t border-gray-200 py-2">
                <button
                  @click="handleLogout"
                  :disabled="isLoggingOut"
                  class="flex items-center gap-3 px-4 py-2 text-sm text-red-600 hover:bg-red-50 w-full text-left disabled:opacity-50"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                  </svg>
                  {{ isLoggingOut ? 'Déconnexion...' : 'Déconnexion' }}
                </button>
              </div>
            </div>
          </Transition>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted } from 'vue'
import { useRouter } from 'vue-router'
import { useSidebar } from '../../composables/useSidebar'
import { useAuthStore } from '../../stores/auth'
import api from '../../utils/api'
import { Bell } from 'lucide-vue-next'


const router = useRouter()
const { toggleSidebar, toggleMobileSidebar } = useSidebar()
const authStore = useAuthStore()
const can = (action: string, subject: string) => authStore.can(action, subject)


const showNotifications = ref(false)
const showUserMenu = ref(false)

// Notifications
interface Notification {
  id: number
  title: string
  message: string
  type: string
  is_read: boolean
  created_at: string
}

const notifications = ref<Notification[]>([])
const unreadCount = ref(0)
let notificationInterval: ReturnType<typeof setInterval> | null = null

const fetchNotifications = async () => {
  try {
    const response = await api.get('/notifications')
    const data = response.data.data || response.data
    notifications.value = Array.isArray(data) ? data : (data.Notifications || [])
    console.log('Notifications chargées:', notifications.value)
  } catch (error) {
    console.error('Erreur chargement notifications:', error)
  }
}

const fetchUnreadCount = async () => {
  try {
    const response = await api.get('/notifications/unread-count')
    unreadCount.value = response.data.count || 0
  } catch (error) {
    console.error('Erreur comptage notifications:', error)
  }
}

const markAsRead = async (id: number) => {
  try {
    await api.put(`/notifications/${id}/mark-as-read`)
    const notif = notifications.value.find(n => n.id === id)
    if (notif && !notif.is_read) {
      notif.is_read = true
      unreadCount.value = Math.max(0, unreadCount.value - 1)
    }
  } catch (error) {
    console.error('Erreur marquage notification:', error)
  }
}

const markAllAsRead = async () => {
  try {
    await api.put('/notifications/mark-all-as-read')
    notifications.value.forEach(n => n.is_read = true)
    unreadCount.value = 0
  } catch (error) {
    console.error('Erreur marquage notifications:', error)
  }
}

const formatTimeAgo = (dateString: string) => {
  const date = new Date(dateString)
  const now = new Date()
  const diffMs = now.getTime() - date.getTime()
  const diffMins = Math.floor(diffMs / 60000)
  const diffHours = Math.floor(diffMs / 3600000)
  const diffDays = Math.floor(diffMs / 86400000)

  if (diffMins < 1) return "À l'instant"
  if (diffMins < 60) return `Il y a ${diffMins} minute${diffMins > 1 ? 's' : ''}`
  if (diffHours < 24) return `Il y a ${diffHours} heure${diffHours > 1 ? 's' : ''}`
  return `Il y a ${diffDays} jour${diffDays > 1 ? 's' : ''}`
}

const getNotificationIcon = (type: string) => {
  switch (type) {
    case 'pre_registration':
    case 'info':
      return { bg: 'bg-blue-100', color: 'text-blue-600' }
    case 'success':
      return { bg: 'bg-green-100', color: 'text-green-600' }
    case 'warning':
      return { bg: 'bg-yellow-100', color: 'text-yellow-600' }
    case 'error':
      return { bg: 'bg-red-100', color: 'text-red-600' }
    default:
      return { bg: 'bg-gray-100', color: 'text-gray-600' }
  }
}

onMounted(() => {
  fetchNotifications()
  fetchUnreadCount()
  // Rafraîchir toutes les 30 secondes
  notificationInterval = setInterval(() => {
    fetchUnreadCount()
  }, 30000)
})

onUnmounted(() => {
  if (notificationInterval) {
    clearInterval(notificationInterval)
  }
})

const userName = computed(() => authStore.user?.name || '')
const userEmail = computed(() => authStore.user?.email || '')
const userProfile = computed(() => {
  const profiles: Record<string, string> = {
    admin: 'Administrateur',
    rh: 'Ressources Humaines',
    marketing: 'Marketing',
    cc: 'Chargé de Clientèle',
  }
  return profiles[authStore.user?.profile || ''] || authStore.user?.profile || ''
})
const userInitials = computed(() => {
  const parts = userName.value.trim().split(/\s+/)
  if (parts.length >= 2) return (parts[0][0] + parts[1][0]).toUpperCase()
  return userName.value.substring(0, 2).toUpperCase()
})

const isLoggingOut = ref(false)

async function handleLogout() {
  if (isLoggingOut.value) return
  isLoggingOut.value = true
  try {
    await api.delete('/auth/logout')
  } catch {
    // On déconnecte même si l'appel API échoue
  } finally {
    authStore.logout()
    router.push('/login')
  }
}

// Interface pour étendre HTMLElement
interface HTMLElementWithClickOutside extends HTMLElement {
  clickOutsideEvent?: (event: Event) => void
}

// Click outside directive
const vClickOutside = {
  mounted(el: HTMLElementWithClickOutside, binding: any) {
    el.clickOutsideEvent = (event: Event) => {
      const target = event.target as Node
      // Vérifier que le clic n'est ni sur l'élément, ni sur son parent (le bouton toggle)
      const parent = el.parentElement
      if (
        !(el === target || el.contains(target)) &&
        !(parent && parent.contains(target))
      ) {
        binding.value()
      }
    }
    document.addEventListener('click', el.clickOutsideEvent)
  },
  unmounted(el: HTMLElementWithClickOutside) {
    if (el.clickOutsideEvent) {
      document.removeEventListener('click', el.clickOutsideEvent)
    }
  }
}
</script>

<style scoped>
/* Dropdown Animation */
.dropdown-enter-active,
.dropdown-leave-active {
  transition: all 0.2s ease;
}

.dropdown-enter-from,
.dropdown-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}
</style>
