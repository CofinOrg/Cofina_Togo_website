<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4">
    <div class="max-w-7xl mx-auto">
      <!-- Header -->
      <div class="mb-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
          <h1 class="text-4xl font-bold text-gray-900 mb-2">Performance du site</h1>
          <p class="text-gray-600">Statistiques Google Analytics en temps reel</p>
        </div>
        <div class="flex items-center gap-2 bg-white rounded-xl shadow-sm p-1">
          <button
            v-for="p in periods"
            :key="p.value"
            @click="selectedPeriod = p.value"
            :class="[
              'px-4 py-2 rounded-lg text-sm font-semibold transition-all',
              selectedPeriod === p.value
                ? 'bg-primary text-white shadow-sm'
                : 'text-gray-600 hover:bg-gray-100'
            ]"
          >
            {{ p.label }}
          </button>
        </div>
      </div>

      <!-- Loading State -->
      <div v-if="loading" class="space-y-6">
        <!-- KPI Skeletons -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <div v-for="i in 4" :key="i" class="bg-white rounded-2xl shadow-xl p-6 animate-pulse">
            <div class="h-4 bg-gray-200 rounded w-24 mb-3"></div>
            <div class="h-8 bg-gray-200 rounded w-20 mb-2"></div>
            <div class="h-3 bg-gray-100 rounded w-16"></div>
          </div>
        </div>
        <!-- Chart Skeletons -->
        <div class="bg-white rounded-2xl shadow-xl p-8 animate-pulse">
          <div class="h-4 bg-gray-200 rounded w-40 mb-6"></div>
          <div class="h-64 bg-gray-100 rounded"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <div class="bg-white rounded-2xl shadow-xl p-8 animate-pulse">
            <div class="h-4 bg-gray-200 rounded w-36 mb-6"></div>
            <div class="h-48 bg-gray-100 rounded"></div>
          </div>
          <div class="bg-white rounded-2xl shadow-xl p-8 animate-pulse">
            <div class="h-4 bg-gray-200 rounded w-36 mb-6"></div>
            <div class="h-48 bg-gray-100 rounded"></div>
          </div>
        </div>
      </div>

      <!-- Error State -->
      <div v-else-if="error" class="bg-white rounded-2xl shadow-xl p-12 text-center">
        <AlertCircle class="mx-auto h-12 w-12 text-red-400 mb-4" />
        <h3 class="text-lg font-semibold text-gray-900 mb-2">Erreur de chargement</h3>
        <p class="text-gray-500 mb-6 max-w-md mx-auto">{{ error }}</p>
        <button
          @click="fetchData"
          class="px-6 py-3 bg-primary text-white rounded-xl hover:opacity-90 transition-all font-semibold"
        >
          Reessayer
        </button>
      </div>

      <!-- Data loaded -->
      <div v-else-if="data" class="space-y-6">
        <!-- KPI Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <div
            v-for="kpi in kpis"
            :key="kpi.label"
            class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow"
          >
            <div class="flex items-center justify-between mb-3">
              <span class="text-sm font-medium text-gray-500">{{ kpi.label }}</span>
              <component :is="kpi.icon" class="h-5 w-5 text-gray-400" />
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ kpi.value }}</p>
          </div>
        </div>

        <!-- Line Chart: Daily Visitors -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
          <h2 class="text-xl font-bold text-gray-900 mb-6">Visiteurs & Pages vues</h2>
          <div v-if="data.daily_visitors.length" class="h-80">
            <Line :data="lineChartData" :options="lineChartOptions" />
          </div>
          <p v-else class="text-gray-400 text-center py-12">Aucune donnee pour cette periode</p>
        </div>

        <!-- Doughnut Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <!-- Traffic Sources -->
          <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Sources de trafic</h2>
            <div v-if="data.traffic_sources.length" class="flex items-center justify-center h-64">
              <Doughnut :data="trafficChartData" :options="doughnutOptions" />
            </div>
            <p v-else class="text-gray-400 text-center py-12">Aucune donnee</p>
          </div>
          <!-- Devices -->
          <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Appareils</h2>
            <div v-if="data.devices.length" class="flex items-center justify-center h-64">
              <Doughnut :data="devicesChartData" :options="doughnutOptions" />
            </div>
            <p v-else class="text-gray-400 text-center py-12">Aucune donnee</p>
          </div>
        </div>

        <!-- Top Pages Table -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
          <h2 class="text-xl font-bold text-gray-900 mb-6">Top 10 pages</h2>
          <div v-if="data.top_pages.length" class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Page</th>
                  <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Pages vues</th>
                  <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateurs</th>
                  <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Duree moy.</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="(page, index) in data.top_pages" :key="page.page" class="hover:bg-gray-50 transition-colors">
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 font-medium">{{ index + 1 }}</td>
                  <td class="px-6 py-4 text-sm font-medium text-gray-900 max-w-xs truncate">{{ page.page }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-right">{{ formatNumber(page.pageViews) }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-right">{{ formatNumber(page.users) }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-right">{{ formatDuration(page.avgDuration) }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <p v-else class="text-gray-400 text-center py-12">Aucune donnee</p>
        </div>

        <!-- Countries Table -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
          <h2 class="text-xl font-bold text-gray-900 mb-6">Top 10 pays</h2>
          <div v-if="data.countries.length" class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pays</th>
                  <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Sessions</th>
                  <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateurs</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="(country, index) in data.countries" :key="country.country" class="hover:bg-gray-50 transition-colors">
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 font-medium">{{ index + 1 }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ country.country }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-right">{{ formatNumber(country.sessions) }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-right">{{ formatNumber(country.users) }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <p v-else class="text-gray-400 text-center py-12">Aucune donnee</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, watch, onMounted } from 'vue'
import { Line, Doughnut } from 'vue-chartjs'
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  ArcElement,
  Title,
  Tooltip,
  Legend,
  Filler,
} from 'chart.js'
import { Users, Eye, MousePointerClick, TrendingDown, AlertCircle } from 'lucide-vue-next'
import api from '../../utils/api'

ChartJS.register(
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  ArcElement,
  Title,
  Tooltip,
  Legend,
  Filler
)

interface Summary {
  totalUsers: number
  newUsers: number
  sessions: number
  screenPageViews: number
  averageSessionDuration: number
  bounceRate: number
}

interface DailyVisitor {
  date: string
  users: number
  pageViews: number
  sessions: number
}

interface TopPage {
  page: string
  pageViews: number
  users: number
  avgDuration: number
}

interface TrafficSource {
  channel: string
  sessions: number
}

interface Device {
  device: string
  sessions: number
}

interface Country {
  country: string
  sessions: number
  users: number
}

interface AnalyticsData {
  summary: Summary
  daily_visitors: DailyVisitor[]
  top_pages: TopPage[]
  traffic_sources: TrafficSource[]
  devices: Device[]
  countries: Country[]
}

const periods = [
  { label: '7 jours', value: '7d' },
  { label: '30 jours', value: '30d' },
  { label: '90 jours', value: '90d' },
]

const selectedPeriod = ref('30d')
const loading = ref(true)
const error = ref<string | null>(null)
const data = ref<AnalyticsData | null>(null)

const kpis = computed(() => {
  if (!data.value) return []
  const s = data.value.summary
  return [
    { label: 'Visiteurs', value: formatNumber(s.totalUsers), icon: Users },
    { label: 'Pages vues', value: formatNumber(s.screenPageViews), icon: Eye },
    { label: 'Sessions', value: formatNumber(s.sessions), icon: MousePointerClick },
    { label: 'Taux de rebond', value: s.bounceRate + '%', icon: TrendingDown },
  ]
})

// Theme colors: primary=#DB0031, accent=#FDB63E, secondary=#636466, background=#1E1E1E
const colors = {
  primary: '#DB0031',
  primaryRgb: '219, 0, 49',
  accent: '#FDB63E',
  accentRgb: '253, 182, 62',
  secondary: '#636466',
  secondaryRgb: '99, 100, 102',
  background: '#1E1E1E',
  backgroundRgb: '30, 30, 30',
}

const chartColors = [
  `rgba(${colors.primaryRgb}, 0.8)`,
  `rgba(${colors.accentRgb}, 0.8)`,
  `rgba(${colors.secondaryRgb}, 0.8)`,
  `rgba(${colors.backgroundRgb}, 0.7)`,
  `rgba(${colors.primaryRgb}, 0.5)`,
  `rgba(${colors.accentRgb}, 0.5)`,
  `rgba(${colors.secondaryRgb}, 0.5)`,
  `rgba(${colors.backgroundRgb}, 0.4)`,
]

const lineChartData = computed(() => {
  if (!data.value) return { labels: [], datasets: [] }
  const daily = data.value.daily_visitors
  return {
    labels: daily.map(d => {
      const date = new Date(d.date)
      return date.toLocaleDateString('fr-FR', { day: '2-digit', month: 'short' })
    }),
    datasets: [
      {
        label: 'Visiteurs',
        data: daily.map(d => d.users),
        borderColor: colors.primary,
        backgroundColor: `rgba(${colors.primaryRgb}, 0.1)`,
        fill: true,
        tension: 0.4,
        pointRadius: daily.length > 30 ? 0 : 3,
        pointHoverRadius: 5,
      },
      {
        label: 'Pages vues',
        data: daily.map(d => d.pageViews),
        borderColor: colors.accent,
        backgroundColor: `rgba(${colors.accentRgb}, 0.1)`,
        fill: true,
        tension: 0.4,
        pointRadius: daily.length > 30 ? 0 : 3,
        pointHoverRadius: 5,
      },
    ],
  }
})

const lineChartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  interaction: { intersect: false, mode: 'index' as const },
  plugins: {
    legend: { position: 'top' as const },
    tooltip: {
      backgroundColor: `rgba(${colors.backgroundRgb}, 0.95)`,
      padding: 12,
      cornerRadius: 8,
    },
  },
  scales: {
    x: {
      grid: { display: false },
      ticks: { maxTicksLimit: 12 },
    },
    y: {
      beginAtZero: true,
      grid: { color: 'rgba(0, 0, 0, 0.05)' },
    },
  },
}

const doughnutOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: { position: 'bottom' as const },
    tooltip: {
      backgroundColor: `rgba(${colors.backgroundRgb}, 0.95)`,
      padding: 12,
      cornerRadius: 8,
    },
  },
  cutout: '60%',
}

const trafficChartData = computed(() => {
  if (!data.value) return { labels: [], datasets: [] }
  const sources = data.value.traffic_sources
  return {
    labels: sources.map(s => s.channel),
    datasets: [{
      data: sources.map(s => s.sessions),
      backgroundColor: chartColors.slice(0, sources.length),
      borderWidth: 2,
      borderColor: '#ffffff',
    }],
  }
})

const devicesChartData = computed(() => {
  if (!data.value) return { labels: [], datasets: [] }
  const devices = data.value.devices
  const deviceLabels: Record<string, string> = {
    desktop: 'Ordinateur',
    mobile: 'Mobile',
    tablet: 'Tablette',
  }
  return {
    labels: devices.map(d => deviceLabels[d.device] || d.device),
    datasets: [{
      data: devices.map(d => d.sessions),
      backgroundColor: [
        `rgba(${colors.primaryRgb}, 0.8)`,
        `rgba(${colors.accentRgb}, 0.8)`,
        `rgba(${colors.secondaryRgb}, 0.8)`,
      ],
      borderWidth: 2,
      borderColor: '#ffffff',
    }],
  }
})

function formatNumber(n: number): string {
  return new Intl.NumberFormat('fr-FR').format(n)
}

function formatDuration(seconds: number): string {
  if (seconds < 60) return `${Math.round(seconds)}s`
  const minutes = Math.floor(seconds / 60)
  const secs = Math.round(seconds % 60)
  return `${minutes}m ${secs}s`
}

async function fetchData() {
  loading.value = true
  error.value = null
  try {
    const response = await api.get(`/analytics/overview?period=${selectedPeriod.value}`)
    data.value = response.data
  } catch (err: any) {
    const message = err.response?.data?.message || err.message || 'Erreur inconnue'
    error.value = `Impossible de charger les donnees analytics. ${message}`
  } finally {
    loading.value = false
  }
}

watch(selectedPeriod, () => {
  fetchData()
})

onMounted(() => {
  fetchData()
})
</script>
