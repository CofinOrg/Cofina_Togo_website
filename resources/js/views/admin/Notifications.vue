<template>
  <div class="p-6">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
      <div>
        <h1 class="text-2xl font-bold text-gray-900">Notifications</h1>
        <p class="text-gray-500 mt-1">Gérez vos notifications</p>
      </div>
      <button
        v-if="unreadCount > 0"
        @click="markAllAsRead"
        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors"
      >
        Tout marquer comme lu
      </button>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
      <div class="bg-white rounded-xl p-4 border border-gray-200">
        <p class="text-sm text-gray-500">Total</p>
        <p class="text-2xl font-bold text-gray-900">{{ notifications.length }}</p>
      </div>
      <div class="bg-white rounded-xl p-4 border border-gray-200">
        <p class="text-sm text-gray-500">Non lues</p>
        <p class="text-2xl font-bold text-red-600">{{ unreadCount }}</p>
      </div>
      <div class="bg-white rounded-xl p-4 border border-gray-200">
        <p class="text-sm text-gray-500">Lues</p>
        <p class="text-2xl font-bold text-green-600">{{ notifications.length - unreadCount }}</p>
      </div>
    </div>

    <!-- Filters -->
    <div class="flex gap-2 mb-6">
      <button
        @click="filter = 'all'"
        :class="[
          'px-4 py-2 rounded-lg font-medium transition-colors',
          filter === 'all' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
        ]"
      >
        Toutes
      </button>
      <button
        @click="filter = 'unread'"
        :class="[
          'px-4 py-2 rounded-lg font-medium transition-colors',
          filter === 'unread' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
        ]"
      >
        Non lues
      </button>
      <button
        @click="filter = 'read'"
        :class="[
          'px-4 py-2 rounded-lg font-medium transition-colors',
          filter === 'read' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
        ]"
      >
        Lues
      </button>
    </div>

    <!-- Loading -->
    <div v-if="isLoading" class="flex justify-center py-12">
      <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary"></div>
    </div>

    <!-- Empty State -->
    <div v-else-if="filteredNotifications.length === 0" class="bg-white rounded-xl p-12 text-center border border-gray-200">
      <Bell class="w-16 h-16 text-gray-300 mx-auto mb-4" />
      <p class="text-gray-500 text-lg">Aucune notification</p>
    </div>

    <!-- Notifications List -->
    <div v-else class="space-y-3">
      <div
        v-for="notif in filteredNotifications"
        :key="notif.id"
        class="bg-white rounded-xl p-4 border border-gray-200 hover:shadow-md transition-shadow cursor-pointer"
        :class="{ 'bg-blue-50/50 border-blue-200': !notif.is_read }"
        @click="markAsRead(notif.id)"
      >
        <div class="flex items-start gap-4">
          <div
            class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0"
            :class="getNotificationIcon(notif.type).bg"
          >
            <Bell class="w-6 h-6" :class="getNotificationIcon(notif.type).color" />
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex items-start justify-between gap-4">
              <div>
                <p class="font-semibold text-gray-900" :class="{ 'font-bold': !notif.is_read }">
                  {{ notif.title }}
                </p>
                <p class="text-gray-600 mt-1">{{ notif.message }}</p>
                <p class="text-sm text-gray-400 mt-2">{{ formatDate(notif.created_at) }}</p>
              </div>
              <div class="flex items-center gap-2">
                <span
                  v-if="!notif.is_read"
                  class="w-3 h-3 bg-blue-500 rounded-full flex-shrink-0"
                ></span>
                <button
                  @click.stop="deleteNotification(notif.id)"
                  class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors"
                >
                  <Trash2 class="w-4 h-4" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import { Bell, Trash2 } from 'lucide-vue-next'
import api from '../../utils/api'

interface Notification {
  id: number
  title: string
  message: string
  type: string
  is_read: boolean
  created_at: string
}

const notifications = ref<Notification[]>([])
const isLoading = ref(true)
const filter = ref<'all' | 'unread' | 'read'>('all')

const unreadCount = computed(() => notifications.value.filter(n => !n.is_read).length)

const filteredNotifications = computed(() => {
  switch (filter.value) {
    case 'unread':
      return notifications.value.filter(n => !n.is_read)
    case 'read':
      return notifications.value.filter(n => n.is_read)
    default:
      return notifications.value
  }
})

const fetchNotifications = async () => {
  isLoading.value = true
  try {
    const response = await api.get('/notifications')
    const data = response.data.data || response.data
    notifications.value = Array.isArray(data) ? data : []
  } catch (error) {
    console.error('Erreur chargement notifications:', error)
  } finally {
    isLoading.value = false
  }
}

const markAsRead = async (id: number) => {
  try {
    await api.put(`/notifications/${id}/mark-as-read`)
    const notif = notifications.value.find(n => n.id === id)
    if (notif) notif.is_read = true
  } catch (error) {
    console.error('Erreur:', error)
  }
}

const markAllAsRead = async () => {
  try {
    await api.put('/notifications/mark-all-as-read')
    notifications.value.forEach(n => n.is_read = true)
  } catch (error) {
    console.error('Erreur:', error)
  }
}

const deleteNotification = async (id: number) => {
  try {
    await api.delete(`/notifications/${id}`)
    notifications.value = notifications.value.filter(n => n.id !== id)
  } catch (error) {
    console.error('Erreur:', error)
  }
}

const formatDate = (dateString: string) => {
  const date = new Date(dateString)
  return date.toLocaleDateString('fr-FR', {
    day: '2-digit',
    month: 'long',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  })
}

const getNotificationIcon = (type: string) => {
  switch (type) {
    case 'info':
      return { bg: 'bg-blue-100', color: 'text-blue-600' }
    case 'warning':
      return { bg: 'bg-yellow-100', color: 'text-yellow-600' }
    case 'alert':
      return { bg: 'bg-red-100', color: 'text-red-600' }
    default:
      return { bg: 'bg-gray-100', color: 'text-gray-600' }
  }
}

onMounted(() => {
  fetchNotifications()
})
</script>
