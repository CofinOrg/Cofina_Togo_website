<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import {
  ClipboardList, MessageSquare, PenSquare, Briefcase,
  FileText, Users, Crown, MapPin, BarChart3, UserCog,
  ArrowRight, TrendingUp, FileSlidersIcon
} from 'lucide-vue-next'
import { useAuthStore } from '../../stores/auth'
import api from '../../utils/api'

const authStore = useAuthStore()
const router = useRouter()
const can = (action: string, subject: string) => authStore.can(action, subject)

// ─── Stats ────────────────────────────────────────────────────────────────────
const stats = ref({
  preRegistrations: 0,
  messages: 0,
  blogs: 0,
  jobOffers: 0,
  applications: 0,
  spontaneousCvs: 0,
  businessClubMembers: 0,
  users: 0,
  agencies: 0,
})
const loading = ref(true)

const fetchStats = async () => {
  const fetches: Promise<void>[] = []

  if (can('menu', 'preregistration') || can('menu', 'service')) {
    fetches.push(
      api.get('/pre_registrations?with_product=true')
        .then(r => { stats.value.preRegistrations = (r.data.data ?? r.data).length })
        .catch(() => {})
    )
  }

  if (can('menu', 'customermessage') || can('menu', 'service')) {
    fetches.push(
      api.get('/customer_messages')
        .then(r => { stats.value.messages = (r.data.data ?? r.data).length })
        .catch(() => {})
    )
  }

  if (can('menu', 'blog')) {
    fetches.push(
      api.get('/blogs?with_user=true')
        .then(r => { stats.value.blogs = (r.data.data ?? r.data).length })
        .catch(() => {})
    )
  }

  if (can('menu', 'joboffer')) {
    fetches.push(
      api.get('/job_offers?paginate=false')
        .then(r => { stats.value.jobOffers = (r.data.data ?? r.data).length })
        .catch(() => {}),
      api.get('/applications?paginate=false')
        .then(r => { stats.value.applications = (r.data.data ?? r.data).length })
        .catch(() => {})
    )
  }

  if (can('menu', 'spontaneousapplication')) {
    fetches.push(
      api.get('/cvs?source=spontaneous&paginate=false')
        .then(r => { stats.value.spontaneousCvs = (r.data.data ?? r.data).length })
        .catch(() => {})
    )
  }

  if (can('menu', 'businessclubmember') || can('menu', 'service')) {
    fetches.push(
      api.get('/business_club_members')
        .then(r => { stats.value.businessClubMembers = (r.data.data ?? r.data).length })
        .catch(() => {})
    )
  }

  if (can('manage', 'all')) {
    fetches.push(
      api.get('/users')
        .then(r => { stats.value.users = (r.data.data ?? r.data).length })
        .catch(() => {}),
      api.get('/agences?with_user=true')
        .then(r => { stats.value.agencies = (r.data.data ?? r.data).length })
        .catch(() => {})
    )
  }

  await Promise.all(fetches)
  loading.value = false
}

onMounted(fetchStats)

// ─── Greeting ─────────────────────────────────────────────────────────────────
const greeting = computed(() => {
  const h = new Date().getHours()
  if (h < 12) return 'Bonjour'
  if (h < 18) return 'Bon après-midi'
  return 'Bonsoir'
})

const today = computed(() =>
  new Date().toLocaleDateString('fr-FR', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' })
)

// ─── KPI cards (visibles selon permissions) ───────────────────────────────────
const kpiCards = computed(() => {
  const cards = []

  if (can('menu', 'preregistration') || can('menu', 'service')) {
    cards.push({
      label: 'Pré-inscriptions',
      value: stats.value.preRegistrations,
      icon: ClipboardList,
      color: 'bg-blue-50 text-blue-600',
      route: 'pre-registrations',
    })
  }

  if (can('menu', 'customermessage') || can('menu', 'service')) {
    cards.push({
      label: 'Messages clients',
      value: stats.value.messages,
      icon: MessageSquare,
      color: 'bg-green-50 text-green-600',
      route: 'customer-messages',
    })
  }

  if (can('menu', 'businessclubmember') || can('menu', 'service')) {
    cards.push({
      label: 'Business Club',
      value: stats.value.businessClubMembers,
      icon: Crown,
      color: 'bg-yellow-50 text-yellow-600',
      route: 'admin-business-club-members',
    })
  }

  if (can('menu', 'blog')) {
    cards.push({
      label: 'Articles publiés',
      value: stats.value.blogs,
      icon: PenSquare,
      color: 'bg-purple-50 text-purple-600',
      route: 'add-blog',
    })
  }

  if (can('menu', 'joboffer')) {
    cards.push({
      label: "Offres d'emploi",
      value: stats.value.jobOffers,
      icon: Briefcase,
      color: 'bg-orange-50 text-orange-600',
      route: 'add-offer',
    })
    cards.push({
      label: 'Candidatures',
      value: stats.value.applications,
      icon: FileText,
      color: 'bg-pink-50 text-pink-600',
      route: 'offer-applications',
    })
  }

  if (can('menu', 'spontaneousapplication')) {
    cards.push({
      label: 'Candidatures spontanées',
      value: stats.value.spontaneousCvs,
      icon: Users,
      color: 'bg-teal-50 text-teal-600',
      route: 'spontaneous-applications',
    })
  }

  if (can('manage', 'all')) {
    cards.push({
      label: 'Utilisateurs',
      value: stats.value.users,
      icon: UserCog,
      color: 'bg-gray-100 text-gray-600',
      route: 'admin-users',
    })
    cards.push({
      label: 'Agences',
      value: stats.value.agencies,
      icon: MapPin,
      color: 'bg-red-50 text-red-600',
      route: 'add-agency',
    })
  }

  return cards
})

// ─── Quick actions (raccourcis vers pages clés) ────────────────────────────────
const quickActions = computed(() => {
  const actions = []

  if (can('menu', 'preregistration') || can('menu', 'service')) {
    actions.push({ label: 'Gérer les pré-inscriptions', route: 'pre-registrations', icon: ClipboardList })
  }
  if (can('menu', 'customermessage') || can('menu', 'service')) {
    actions.push({ label: 'Voir les messages clients', route: 'customer-messages', icon: MessageSquare })
  }
  if (can('menu', 'businessclubmember') || can('menu', 'service')) {
    actions.push({ label: 'Membres Business Club', route: 'admin-business-club-members', icon: Crown })
  }
  if (can('menu', 'blog')) {
    actions.push({ label: 'Gérer le blog', route: 'add-blog', icon: PenSquare })
  }
  if (can('menu', 'announcement')) {
    actions.push({ label: 'Performance du site', route: 'admin-insights', icon: BarChart3 })
    actions.push({ label: 'Gérer les annonces', route: 'add-announcement', icon: FileSlidersIcon })
  }
  if (can('menu', 'slider')) {
    actions.push({ label: 'Gérer les sliders', route: 'add-slider', icon: FileSlidersIcon })
  }
  if (can('menu', 'agence')) {
    actions.push({ label: 'Gérer les agences', route: 'add-agency', icon: MapPin })
  }
  if (can('menu', 'joboffer')) {
    actions.push({ label: "Offres d'emploi", route: 'add-offer', icon: Briefcase })
    actions.push({ label: 'Candidatures par offre', route: 'offer-applications', icon: FileText })
    actions.push({ label: 'Statistiques scoring', route: 'scoring-stats', icon: TrendingUp })
  }
  if (can('menu', 'spontaneousapplication')) {
    actions.push({ label: 'Candidatures spontanées', route: 'spontaneous-applications', icon: Users })
  }
  if (can('manage', 'all')) {
    actions.push({ label: 'Gérer les utilisateurs', route: 'admin-users', icon: UserCog })
    actions.push({ label: 'Services et Produits', route: 'service-product', icon: FileSlidersIcon })
  }

  return actions
})
</script>

<template>
  <div class="min-h-screen bg-gray-50 py-8 px-4 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-8">

      <!-- ── En-tête de bienvenue ─────────────────────────────────────────── -->
      <div class="bg-primary rounded-2xl p-6 lg:p-8 text-white shadow-lg">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
          <div>
            <p class="text-white/70 text-sm mb-1 capitalize">{{ today }}</p>
            <h1 class="text-2xl lg:text-3xl font-bold">
              {{ greeting }}, {{ authStore.user?.name }} 👋
            </h1>
        <!--     <p class="text-white/80 text-sm mt-1">
              Profil : <span class="font-semibold text-white">{{ authStore.user?.profile }}</span>
            </p> -->
          </div>
          <router-link
            to="/Cofinoistg@admin/profile"
            class="inline-flex items-center gap-2 bg-accent hover:bg-white/30 text-white text-sm font-medium px-4 py-2 rounded-xl transition-colors self-start sm:self-auto"
          >
            Mon profil
            <ArrowRight :size="16" />
          </router-link>
        </div>
      </div>

      <!-- ── KPIs ────────────────────────────────────────────────────────── -->
      <div v-if="kpiCards.length > 0">
        <h2 class="text-gray-700 font-semibold text-sm uppercase tracking-wider mb-4">
          Vue d'ensemble
        </h2>

        <!-- Skeleton loader -->
        <div v-if="loading" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
          <div
            v-for="n in 4"
            :key="n"
            class="bg-white rounded-2xl p-5 shadow-sm animate-pulse h-28"
          />
        </div>

        <div v-else class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
          <button
            v-for="card in kpiCards"
            :key="card.label"
            class="bg-white rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-200 text-left group hover:-translate-y-0.5"
            @click="router.push({ name: card.route })"
          >
            <div class="flex items-start justify-between mb-3">
              <div :class="['w-10 h-10 rounded-xl flex items-center justify-center', card.color]">
                <component :is="card.icon" :size="20" />
              </div>
              <ArrowRight :size="16" class="text-gray-300 group-hover:text-gray-500 transition-colors mt-1" />
            </div>
            <p class="text-2xl font-bold text-gray-900">{{ card.value }}</p>
            <p class="text-gray-500 text-xs mt-0.5">{{ card.label }}</p>
          </button>
        </div>
      </div>

      <!-- ── Accès rapides ───────────────────────────────────────────────── -->
      <div v-if="quickActions.length > 0">
        <h2 class="text-gray-700 font-semibold text-sm uppercase tracking-wider mb-4">
          Accès rapides
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
          <button
            v-for="action in quickActions"
            :key="action.label"
            class="flex items-center gap-3 bg-white rounded-xl px-4 py-3.5 shadow-sm hover:shadow-md hover:bg-primary/5 hover:border-primary/30 border border-transparent transition-all duration-200 text-left group"
            @click="router.push({ name: action.route })"
          >
            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:text-white transition-colors">
              <component :is="action.icon" :size="16" class="text-primary group-hover:text-white" />
            </div>
            <span class="text-gray-700 text-sm font-medium group-hover:text-primary transition-colors">
              {{ action.label }}
            </span>
            <ArrowRight :size="14" class="text-gray-300 group-hover:text-primary ml-auto shrink-0 transition-colors" />
          </button>
        </div>
      </div>

    </div>
  </div>
</template>
