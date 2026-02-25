<template>
  <div class="space-y-6">
    <!-- Header -->
    <div>
      <h1 class="text-2xl font-bold text-gray-900">Statistiques de scoring</h1>
      <p class="text-sm text-gray-500 mt-1">Vue d'ensemble du système de scoring des candidatures</p>
    </div>

    <!-- Loading -->
    <div v-if="loading" class="space-y-6">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div v-for="i in 4" :key="i" class="bg-white rounded-xl border border-gray-200 p-5 animate-pulse">
          <div class="h-3 bg-gray-200 rounded w-24 mb-3"></div>
          <div class="h-8 bg-gray-200 rounded w-20 mb-2"></div>
          <div class="h-2 bg-gray-100 rounded w-16"></div>
        </div>
      </div>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div v-for="i in 4" :key="i" class="bg-white rounded-xl border border-gray-200 p-6 animate-pulse">
          <div class="h-4 bg-gray-200 rounded w-40 mb-6"></div>
          <div class="h-52 bg-gray-100 rounded"></div>
        </div>
      </div>
    </div>

    <template v-else>
      <!-- KPI Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl border border-gray-200 p-5">
          <div class="flex items-center justify-between mb-3">
            <p class="text-sm font-medium text-gray-500">Total candidatures</p>
            <div class="w-9 h-9 bg-blue-100 rounded-lg flex items-center justify-center">
              <FileText class="w-5 h-5 text-blue-600" />
            </div>
          </div>
          <p class="text-3xl font-bold text-gray-900">{{ applications.length }}</p>
          <p class="text-xs text-gray-400 mt-1">{{ cvs.length }} CVs reçus</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-5">
          <div class="flex items-center justify-between mb-3">
            <p class="text-sm font-medium text-gray-500">Score moyen</p>
            <div class="w-9 h-9 bg-purple-100 rounded-lg flex items-center justify-center">
              <TrendingUp class="w-5 h-5 text-purple-600" />
            </div>
          </div>
          <p class="text-3xl font-bold" :class="getScoreTextColor(avgScore)">{{ avgScore }}%</p>
          <p class="text-xs text-gray-400 mt-1">Score médian : {{ medianScore }}%</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-5">
          <div class="flex items-center justify-between mb-3">
            <p class="text-sm font-medium text-gray-500">Retenus</p>
            <div class="w-9 h-9 bg-green-100 rounded-lg flex items-center justify-center">
              <UserCheck class="w-5 h-5 text-green-600" />
            </div>
          </div>
          <p class="text-3xl font-bold text-green-600">{{ acceptedCount }}</p>
          <p class="text-xs text-gray-400 mt-1">
            {{ acceptedRate }}% de taux de sélection
          </p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-5">
          <div class="flex items-center justify-between mb-3">
            <p class="text-sm font-medium text-gray-500">En attente</p>
            <div class="w-9 h-9 bg-orange-100 rounded-lg flex items-center justify-center">
              <Clock class="w-5 h-5 text-orange-600" />
            </div>
          </div>
          <p class="text-3xl font-bold text-orange-600">{{ pendingCount }}</p>
          <p class="text-xs text-gray-400 mt-1">{{ rejectedCount }} refusés</p>
        </div>
      </div>

      <!-- Ligne 1 : Distribution scores + Statuts -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Distribution des scores (2/3) -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 p-6">
          <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider mb-1">Distribution des scores</h2>
          <p class="text-xs text-gray-400 mb-5">Nombre de candidatures par tranche de score</p>
          <Bar :data="scoreDistributionData" :options="barOptions" class="max-h-64" />
        </div>

        <!-- Répartition statuts (1/3) -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
          <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider mb-1">Statuts</h2>
          <p class="text-xs text-gray-400 mb-5">Répartition des décisions RH</p>
          <div class="flex items-center justify-center">
            <Doughnut :data="statusChartData" :options="doughnutOptions" class="max-h-52" />
          </div>
          <!-- Légende manuelle -->
          <div class="mt-4 space-y-2">
            <div v-for="item in statusLegend" :key="item.label" class="flex items-center justify-between text-sm">
              <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full" :style="`background:${item.color}`"></div>
                <span class="text-gray-600">{{ item.label }}</span>
              </div>
              <span class="font-semibold text-gray-900">{{ item.value }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Ligne 2 : Par offre + Source -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Candidatures par offre (2/3) -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 p-6">
          <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider mb-1">Candidatures par offre</h2>
          <p class="text-xs text-gray-400 mb-5">Nombre de candidats et score moyen par offre d'emploi</p>
          <Bar :data="perOfferData" :options="perOfferOptions" class="max-h-64" />
        </div>

        <!-- Source (1/3) -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
          <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider mb-1">Source des CVs</h2>
          <p class="text-xs text-gray-400 mb-5">Origine des candidatures reçues</p>
          <div class="flex items-center justify-center">
            <Doughnut :data="sourceChartData" :options="doughnutOptions" class="max-h-52" />
          </div>
          <div class="mt-4 space-y-2">
            <div class="flex items-center justify-between text-sm">
              <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full bg-purple-500"></div>
                <span class="text-gray-600">Spontanées</span>
              </div>
              <span class="font-semibold text-gray-900">{{ spontaneousCount }}</span>
            </div>
            <div class="flex items-center justify-between text-sm">
              <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                <span class="text-gray-600">Sur offre</span>
              </div>
              <span class="font-semibold text-gray-900">{{ offerCount }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Top 10 meilleurs profils -->
      <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider mb-1">Top 10 meilleurs profils</h2>
        <p class="text-xs text-gray-400 mb-5">Les candidatures avec les scores les plus élevés, tous postes confondus</p>
        <div class="overflow-x-auto">
          <table class="w-full text-sm">
            <thead>
              <tr class="text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-100">
                <th class="pb-3 pr-4">#</th>
                <th class="pb-3 pr-4">Candidat</th>
                <th class="pb-3 pr-4">Offre</th>
                <th class="pb-3 pr-4">Source</th>
                <th class="pb-3 pr-4">Score</th>
                <th class="pb-3">Statut</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
              <tr v-for="(app, i) in top10" :key="app.id" class="hover:bg-gray-50 transition-colors">
                <td class="py-3 pr-4">
                  <span class="font-bold" :class="i === 0 ? 'text-yellow-500' : i === 1 ? 'text-gray-400' : i === 2 ? 'text-amber-600' : 'text-gray-400'">
                    {{ i + 1 }}
                  </span>
                </td>
                <td class="py-3 pr-4">
                  <p class="font-medium text-gray-900">{{ app.cv?.name || '—' }}</p>
                  <p class="text-xs text-gray-400">{{ app.cv?.email || '' }}</p>
                </td>
                <td class="py-3 pr-4 text-gray-600 max-w-xs truncate">
                  {{ app.job_offer?.title || `Offre #${app.job_offer_id}` }}
                </td>
                <td class="py-3 pr-4">
                  <span :class="app.cv?.source === 'spontaneous' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700'"
                    class="px-2 py-0.5 rounded-full text-xs font-semibold">
                    {{ app.cv?.source === 'spontaneous' ? 'Spontanée' : 'Sur offre' }}
                  </span>
                </td>
                <td class="py-3 pr-4">
                  <div class="flex items-center gap-2">
                    <div class="w-16 bg-gray-200 rounded-full h-1.5">
                      <div class="h-1.5 rounded-full" :class="getScoreColor(app.score)" :style="`width:${app.score}%`"></div>
                    </div>
                    <span class="font-bold" :class="getScoreTextColor(app.score)">{{ app.score }}%</span>
                  </div>
                </td>
                <td class="py-3">
                  <span :class="getStatusClass(app.status)" class="px-2 py-0.5 rounded-full text-xs font-semibold">
                    {{ getStatusLabel(app.status) }}
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </template>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import { Bar, Doughnut } from 'vue-chartjs'
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  BarElement,
  ArcElement,
  Title,
  Tooltip,
  Legend,
} from 'chart.js'
import { FileText, TrendingUp, UserCheck, Clock } from 'lucide-vue-next'
import api from '../../utils/api'

ChartJS.register(CategoryScale, LinearScale, BarElement, ArcElement, Title, Tooltip, Legend)

const loading = ref(true)
const applications = ref<any[]>([])
const cvs = ref<any[]>([])
const jobOffers = ref<any[]>([])

// --- KPIs ---
const avgScore = computed(() => {
  if (!applications.value.length) return 0
  return Math.round(applications.value.reduce((s, a) => s + a.score, 0) / applications.value.length)
})

const medianScore = computed(() => {
  if (!applications.value.length) return 0
  const sorted = [...applications.value].map(a => a.score).sort((a, b) => a - b)
  const mid = Math.floor(sorted.length / 2)
  return sorted.length % 2 !== 0 ? sorted[mid] : Math.round((sorted[mid - 1] + sorted[mid]) / 2)
})

const acceptedCount = computed(() => applications.value.filter(a => a.status === 'accepted').length)
const rejectedCount = computed(() => applications.value.filter(a => a.status === 'rejected').length)
const pendingCount  = computed(() => applications.value.filter(a => a.status === 'pending').length)

const acceptedRate = computed(() => {
  if (!applications.value.length) return 0
  return Math.round((acceptedCount.value / applications.value.length) * 100)
})

const spontaneousCount = computed(() => cvs.value.filter(c => c.source === 'spontaneous').length)
const offerCount = computed(() => cvs.value.filter(c => c.source === 'offer').length)

const top10 = computed(() =>
  [...applications.value].sort((a, b) => b.score - a.score).slice(0, 10)
)

// --- Chart : Distribution des scores ---
const scoreDistributionData = computed(() => {
  const ranges = ['0–20', '21–40', '41–60', '61–80', '81–100']
  const counts = [0, 0, 0, 0, 0]
  applications.value.forEach(a => {
    if (a.score <= 20) counts[0]++
    else if (a.score <= 40) counts[1]++
    else if (a.score <= 60) counts[2]++
    else if (a.score <= 80) counts[3]++
    else counts[4]++
  })
  return {
    labels: ranges,
    datasets: [{
      label: 'Candidatures',
      data: counts,
      backgroundColor: ['#f87171', '#fb923c', '#facc15', '#4ade80', '#22c55e'],
      borderRadius: 6,
      borderSkipped: false,
    }]
  }
})

const barOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: { legend: { display: false } },
  scales: {
    y: { beginAtZero: true, ticks: { stepSize: 1 }, grid: { color: '#f3f4f6' } },
    x: { grid: { display: false } }
  }
}

// --- Chart : Statuts ---
const statusChartData = computed(() => ({
  labels: ['En attente', 'Retenu', 'Refusé'],
  datasets: [{
    data: [pendingCount.value, acceptedCount.value, rejectedCount.value],
    backgroundColor: ['#e5e7eb', '#4ade80', '#f87171'],
    borderWidth: 0,
  }]
}))

const statusLegend = computed(() => [
  { label: 'En attente', color: '#e5e7eb', value: pendingCount.value },
  { label: 'Retenus',    color: '#4ade80', value: acceptedCount.value },
  { label: 'Refusés',   color: '#f87171', value: rejectedCount.value },
])

// --- Chart : Par offre ---
const perOfferData = computed(() => {
  const offerMap: Record<number, { title: string; count: number; totalScore: number }> = {}

  applications.value.forEach(a => {
    const id = a.job_offer_id
    const title = a.job_offer?.title ?? `Offre #${id}`
    if (!offerMap[id]) offerMap[id] = { title, count: 0, totalScore: 0 }
    offerMap[id].count++
    offerMap[id].totalScore += a.score
  })

  const entries = Object.values(offerMap).sort((a, b) => b.count - a.count).slice(0, 8)

  return {
    labels: entries.map(e => e.title.length > 22 ? e.title.slice(0, 22) + '…' : e.title),
    datasets: [
      {
        label: 'Candidats',
        data: entries.map(e => e.count),
        backgroundColor: '#818cf8',
        borderRadius: 4,
        borderSkipped: false,
        yAxisID: 'y',
      },
      {
        label: 'Score moyen (%)',
        data: entries.map(e => Math.round(e.totalScore / e.count)),
        backgroundColor: '#34d399',
        borderRadius: 4,
        borderSkipped: false,
        yAxisID: 'y',
      }
    ]
  }
})

const perOfferOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: { legend: { position: 'top' as const } },
  scales: {
    y: { beginAtZero: true, grid: { color: '#f3f4f6' } },
    x: { grid: { display: false } }
  }
}

// --- Chart : Source ---
const sourceChartData = computed(() => ({
  labels: ['Spontanées', 'Sur offre'],
  datasets: [{
    data: [spontaneousCount.value, offerCount.value],
    backgroundColor: ['#a855f7', '#3b82f6'],
    borderWidth: 0,
  }]
}))

const doughnutOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: { legend: { display: false } },
  cutout: '65%',
}

// --- Helpers ---
const getScoreColor = (score: number) => {
  if (score >= 70) return 'bg-green-500'
  if (score >= 40) return 'bg-yellow-500'
  return 'bg-red-400'
}
const getScoreTextColor = (score: number) => {
  if (score >= 70) return 'text-green-700'
  if (score >= 40) return 'text-yellow-700'
  return 'text-red-600'
}
const getStatusClass = (status: string) => {
  const c: Record<string, string> = {
    pending:  'bg-gray-100 text-gray-700',
    accepted: 'bg-green-100 text-green-800',
    rejected: 'bg-red-100 text-red-700',
  }
  return c[status] ?? 'bg-gray-100 text-gray-700'
}
const getStatusLabel = (status: string) => {
  const l: Record<string, string> = { pending: 'En attente', accepted: 'Retenu', rejected: 'Refusé' }
  return l[status] ?? status
}

// --- Fetch ---
onMounted(async () => {
  try {
    const [appsRes, cvsRes, offersRes] = await Promise.all([
      api.get('/applications?paginate=false'),
      api.get('/cvs?paginate=false'),
      api.get('/job_offers?paginate=false'),
    ])
    applications.value = appsRes.data.data ?? appsRes.data
    cvs.value          = cvsRes.data.data  ?? cvsRes.data
    jobOffers.value    = offersRes.data.data ?? offersRes.data
  } catch (e) {
    console.error('Erreur chargement stats', e)
  } finally {
    loading.value = false
  }
})
</script>
