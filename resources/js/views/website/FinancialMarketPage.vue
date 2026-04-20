<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import {
  TrendingUp, TrendingDown, BarChart3, Globe,
  ArrowUpRight, ArrowDownLeft, Briefcase,
  Sparkles, Zap, Award, ArrowRight
} from 'lucide-vue-next'
import ScrollReveal from '@/components/ScrollReveal.vue'
import { financeService, type NewsItem } from '@/data/financeService'


// ── 1. Refs simples (tous déclarés en premier) ────────────────────────────────
const loading     = ref(true)
const error       = ref('')
const usdToXofRate = ref(610)

const goldPrices = ref({
  current: 0, change: 0, changePercent: 0,
  high: 0, low: 0, currency: 'USD/oz',
  updatedAt: null as string | null,
})

const brvmData = ref({
  index: 0, change: 0, changePercent: 0,
  volume: 0, listed_companies: 45, market_cap: 8_200_000_000_000,
  updatedAt: null as string | null,
  is_fallback: false,
})

const macroData = ref({ gdp: '0%', inflation: '0%' })


const news = ref<NewsItem[]>([])

// ── 2. Fonctions utilitaires ──────────────────────────────────────────────────
const formatPrice = (price: number) =>
  new Intl.NumberFormat('fr-FR', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  }).format(price)

const formatLargeNumber = (num: number) => {
  if (num >= 1_000_000_000) return (num / 1_000_000_000).toFixed(1) + 'B'
  if (num >= 1_000_000)     return (num / 1_000_000).toFixed(1) + 'M'
  if (num >= 1_000)         return (num / 1_000).toFixed(1) + 'K'
  return num.toString()
}

// ── 3. Computed (après les refs et fonctions) ─────────────────────────────────
const keyIndicators = computed(() => [
  { name: 'Croissance UEMOA', value: macroData.value.gdp,       change: 0.15,  icon: TrendingUp  },
  { name: 'Inflation',        value: macroData.value.inflation,  change: -0.08, icon: TrendingDown },
  { name: 'Taux EUR/FCFA',   value: '655.96',                   change: 0,     icon: Globe       },
  { name: 'Volume BRVM',     value: formatLargeNumber(brvmData.value.volume),
                              change: brvmData.value.changePercent,             icon: BarChart3   },
])

const goldStats = computed(() => {
  const gramPerOunce    = 31.1035
  const priceUsd        = goldPrices.value.current
  const priceXofPerOunce = priceUsd * usdToXofRate.value
  const priceXofPerGram  = priceXofPerOunce / gramPerOunce
  return {
    ounceXof: priceXofPerOunce,
    gramXof:  priceXofPerGram,
    kiloXof:  priceXofPerGram * 1000
  }
})

// ── 4. Fetch ──────────────────────────────────────────────────────────────────
const fetchData = async () => {
  try {
    loading.value = true
    error.value   = ''

      const { gold, brvm, gdp, inflation, news: newsData } = await financeService.fetchAll()

       console.log('BRVM raw:', brvm)


    if (newsData) news.value = newsData

    if (gold) {
      goldPrices.value = { ...goldPrices.value, ...gold }
    }
    if (brvm) {
    brvmData.value = {
        ...brvmData.value,
        index:            brvm.index,
        change:           brvm.change,
        changePercent:    brvm.changePercent ?? (brvm as any).change_percent ?? 0,
        volume:           brvm.volume,
        listed_companies: brvm.listed_companies,
        market_cap:       brvm.market_cap,
        updatedAt:        (brvm as any).updatedAt ?? (brvm as any).updated_at ?? (brvm as any).scraped_at ?? null,
        is_fallback:      (brvm as any).is_fallback ?? false,
    }
    }

    if (gdp)       macroData.value.gdp       = gdp.value + '%'
    if (inflation) macroData.value.inflation = inflation.value + '%'

  } catch (err) {
    error.value = 'Erreur de synchronisation avec les marchés.'
    console.error(err)
  } finally {
    loading.value = false
  }
}

// ── 5. Lifecycle ──────────────────────────────────────────────────────────────
onMounted(fetchData)
</script>

<template>
  <div class="bg-[#060D1A] min-h-screen overflow-hidden font-sans">

    <section class="relative pt-20 pb-12 overflow-hidden text-center">
      <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-40 left-1/4 w-200 h-100 bg-yellow-500/8 rounded-full blur-3xl" />
        <div class="absolute inset-0 opacity-[0.015]" style="background-image: linear-gradient(#D4AF37 1px, transparent 1px), linear-gradient(90deg, #D4AF37 1px, transparent 1px); background-size: 60px 60px;" />
      </div>

      <div class="relative z-10 max-w-7xl mx-auto px-4 lg:px-8">
        <ScrollReveal animation="fade-up" :duration="600">
          <span class="inline-flex items-center gap-2 bg-yellow-500/10 border border-yellow-500/30 text-yellow-400 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-6">
            <Sparkles :size="14" />
            Marchés & Investissements
          </span>
          <h1 class="text-5xl lg:text-7xl font-black text-white leading-tight mb-6">
            Suivez les <span class="text-transparent bg-clip-text bg-linear-to-r from-yellow-300 via-yellow-400 to-yellow-500">marchés en temps réel</span>
          </h1>
        </ScrollReveal>
      </div>
    </section>

    <div v-if="loading" class="py-24 text-center">
      <div class="inline-flex items-center gap-3">
        <div class="w-8 h-8 rounded-full border-4 border-yellow-500/20 border-t-yellow-400 animate-spin"></div>
        <p class="text-gray-400 font-medium">Récupération des flux financiers...</p>
      </div>
    </div>

    <div v-else-if="error" class="max-w-3xl mx-auto px-4 py-16">
      <div class="bg-red-500/10 border border-red-500/30 rounded-2xl p-8 text-center">
        <p class="text-red-300 mb-6 font-medium">{{ error }}</p>
        <button @click="fetchData" class="bg-accent text-black font-black px-8 py-3 rounded-xl hover:bg-yellow-400 transition-all">
          Réessayer la connexion
        </button>
      </div>
    </div>

    <template v-else>

      <section class="py-8 max-w-7xl mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
          <div v-for="(indicator, i) in keyIndicators" :key="i" class="bg-white/3 border border-white/10 rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-lg bg-yellow-500/10 flex items-center justify-center">
                <component :is="indicator.icon" :size="18" class="text-yellow-400" />
              </div>
              <div :class="`flex items-center gap-1 px-2 py-1 rounded-lg ${indicator.change >= 0 ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400'}`">
                <component :is="indicator.change >= 0 ? TrendingUp : TrendingDown" :size="14" />
                <span class="text-xs font-bold">{{ indicator.change >= 0 ? '+' : '' }}{{ indicator.change }}%</span>
              </div>
            </div>
            <p class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">{{ indicator.name }}</p>
            <p class="text-3xl font-black text-white">{{ indicator.value }}</p>
          </div>
        </div>
      </section>

      <section class="py-12 max-w-7xl mx-auto px-4 lg:px-8">
        <h2 class="text-white text-3xl font-black mb-8 flex items-center gap-3">
          <span class="w-2 h-8 bg-yellow-500 rounded-full"></span>
          Cours de l'Or
        </h2>
        <div class="bg-linear-to-br from-yellow-500/10 to-transparent border border-white/10 rounded-3xl p-8 lg:p-12">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">

              <p class="text-gray-400 text-sm font-bold uppercase mb-4">Prix SPOT (XAU/USD)</p>
              <div class="flex items-baseline gap-4 mb-8">
                <h3 class="text-6xl lg:text-6xl font-black text-white leading-none">
                  {{ formatPrice(goldPrices.current) }}
                </h3>
                <span class="text-xl text-gray-500 font-bold">USD/oz</span>
              </div>

              <div class="flex gap-4">
                <div class="bg-white/5 border border-white/10 rounded-xl p-4 flex-1">
                  <p class="text-gray-500 text-xs mb-2">VARIATION DU JOUR</p>
                  <p :class="`text-2xl font-black ${goldPrices.change >= 0 ? 'text-green-400' : 'text-red-400'}`">
                    {{ goldPrices.change >= 0 ? '+' : '' }}{{ formatPrice(goldPrices.change) }}
                  </p>
                </div>
                <div class="bg-white/5 border border-white/10 rounded-xl p-4 flex-1">
                  <p class="text-gray-500 text-xs mb-2">EN POURCENTAGE</p>
                  <p :class="`text-2xl font-black ${goldPrices.changePercent >= 0 ? 'text-green-400' : 'text-red-400'}`">
                    {{ goldPrices.changePercent >= 0 ? '+' : '' }}{{ goldPrices.changePercent.toFixed(2) }}%
                  </p>
                </div>
              </div>
            </div>

            <div class="space-y-4">
             <p v-if="goldPrices.updatedAt" class="text-gray-600 text-xs mb-4">
                Mis à jour le {{ new Date(goldPrices.updatedAt).toLocaleString('fr-FR') }}
             </p>
              <div class="bg-white/3 border border-white/10 rounded-2xl p-6">
                <p class="text-gray-500 text-xs uppercase mb-1">Plus Haut (24h)</p>
                <p class="text-2xl font-black text-white">{{ formatPrice(goldPrices.high) }}</p>
              </div>
              <div class="bg-white/3 border border-white/10 rounded-2xl p-6">
                <p class="text-gray-500 text-xs uppercase mb-1">Plus Bas (24h)</p>
                <p class="text-2xl font-black text-white">{{ formatPrice(goldPrices.low) }}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-yellow-500/5 border border-yellow-500/20 rounded-2xl p-6 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-3 opacity-20 group-hover:scale-110 transition-transform">
                <Zap class="text-yellow-500" :size="40" />
                </div>
                <p class="text-yellow-500/60 text-xs font-black uppercase tracking-widest mb-2">Estimation au Gramme</p>
                <div class="flex items-baseline gap-2">
                <h4 class="text-3xl font-black text-white">{{ formatPrice(goldStats.gramXof) }}</h4>
                <span class="text-sm font-bold text-gray-500">FCFA / g</span>
                </div>
                <p class="text-[10px] text-gray-500 mt-4 italic">*Basé sur l'or pur (24 carats)</p>
            </div>

            <div class="bg-white/3 border border-white/10 rounded-2xl p-6">
                <p class="text-gray-500 text-xs font-black uppercase tracking-widest mb-2">Lingot de 1 KG</p>
                <div class="flex items-baseline gap-2">
                <h4 class="text-2xl font-black text-white">{{ formatLargeNumber(goldStats.kiloXof) }}</h4>
                <span class="text-sm font-bold text-gray-500">FCFA</span>
                </div>
            </div>

            <div class="bg-white/3 border border-white/10 rounded-2xl p-6">
                <p class="text-gray-500 text-xs font-black uppercase tracking-widest mb-2">Taux de Change Ref.</p>
                <div class="flex items-baseline gap-2">
                <h4 class="text-2xl font-black text-white">{{ usdToXofRate }}</h4>
                <span class="text-sm font-bold text-gray-500">USD/XOF</span>
                </div>
            </div>
        </div>
      </section>
        <section class="py-6 max-w-7xl mx-auto px-4 lg:px-8 mb-20">
        <h2 class="text-white text-3xl font-black mb-8 flex items-center gap-3">
            <span class="w-2 h-8 bg-blue-500 rounded-full"></span>
            Marché BRVM
        </h2>

        <div :class="`relative bg-linear-to-br ${brvmData.change >= 0 ? 'from-green-500/5' : 'from-red-500/5'} to-transparent border border-white/10 rounded-3xl p-8 text-white`">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">

            <div class="lg:col-span-2">
                <p class="text-gray-400 text-sm font-bold uppercase mb-2">Indice BRVM Composite</p>
                <h3 class="text-6xl font-black mb-4">{{ formatPrice(brvmData.index) }}</h3>
                <div class="flex items-center gap-3 flex-wrap">
                <div :class="`inline-flex items-center gap-2 px-4 py-2 rounded-full font-bold ${brvmData.change >= 0 ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400'}`">
                    <component :is="brvmData.change >= 0 ? ArrowUpRight : ArrowDownLeft" :size="16" />
                    {{ brvmData.change >= 0 ? '+' : '' }}{{ formatPrice(brvmData.change) }}
                </div>
                <div :class="`inline-flex items-center gap-2 px-4 py-2 rounded-full font-bold ${brvmData.changePercent >= 0 ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400'}`">
                    {{ brvmData.changePercent >= 0 ? '+' : '' }}{{ brvmData.changePercent.toFixed(2) }}%
                </div>
                </div>
            </div>

            <div class="flex flex-col justify-center">
                <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
                <p class="text-gray-500 text-xs uppercase mb-1">Dernière mise à jour</p>
                <p class="text-white font-bold text-sm">{{ brvmData.updatedAt ? new Date(brvmData.updatedAt).toLocaleString('fr-FR') : '—' }}</p>
                <div v-if="brvmData.is_fallback" class="mt-2 inline-flex items-center gap-1 text-xs text-yellow-400 bg-yellow-500/10 px-2 py-1 rounded-full">
                    <Zap :size="10" />
                    Données estimées
                </div>
                </div>
            </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <div class="bg-white/3 border border-white/10 rounded-2xl p-5">
                <div class="flex items-center gap-2 mb-3">
                <BarChart3 :size="16" class="text-blue-400" />
                <p class="text-gray-500 text-xs font-bold uppercase">Volume échangé</p>
                </div>
                <p class="text-2xl font-black text-white">{{ formatLargeNumber(brvmData.volume) }}</p>
                <p class="text-gray-600 text-xs mt-1">FCFA</p>
            </div>

            <div class="bg-white/3 border border-white/10 rounded-2xl p-5">
                <div class="flex items-center gap-2 mb-3">
                <Briefcase :size="16" class="text-purple-400" />
                <p class="text-gray-500 text-xs font-bold uppercase">Capitalisation</p>
                </div>
                <p class="text-2xl font-black text-white">{{ formatLargeNumber(brvmData.market_cap) }}</p>
                <p class="text-gray-600 text-xs mt-1">FCFA</p>
            </div>

            <div class="bg-white/3 border border-white/10 rounded-2xl p-5">
                <div class="flex items-center gap-2 mb-3">
                <Award :size="16" class="text-yellow-400" />
                <p class="text-gray-500 text-xs font-bold uppercase">Sociétés cotées</p>
                </div>
                <p class="text-2xl font-black text-white">{{ brvmData.listed_companies }}</p>
                <p class="text-gray-600 text-xs mt-1">Entreprises</p>
            </div>

            <div class="bg-white/3 border border-white/10 rounded-2xl p-5">
                <div class="flex items-center gap-2 mb-3">
                <component :is="brvmData.changePercent >= 0 ? TrendingUp : TrendingDown" :size="16" :class="brvmData.changePercent >= 0 ? 'text-green-400' : 'text-red-400'" />
                <p class="text-gray-500 text-xs font-bold uppercase">Tendance</p>
                </div>
                <p :class="`text-2xl font-black ${brvmData.changePercent >= 0 ? 'text-green-400' : 'text-red-400'}`">
                {{ brvmData.changePercent >= 0 ? 'Haussier' : 'Baissier' }}
                </p>
                <p class="text-gray-600 text-xs mt-1">Séance du jour</p>
            </div>

            </div>
        </div>
        </section>

        <!-- Actualités du marché -->
        <section class="py-4 max-w-7xl mx-auto px-4 lg:px-8 mb-20">
            <h2 class="text-white text-3xl font-black mb-8 flex items-center gap-3">
                <span class="w-2 h-8 bg-purple-500 rounded-full"></span>
                Actualités des marchés
            </h2>

            <div v-if="news.length === 0" class="text-center py-12 text-gray-500">
                Aucune actualité disponible
            </div>

            <div v-else class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a

                v-for="(item, i) in news.slice(0, 6)"
                :key="i"
                :href="item.url"
                target="_blank"
                rel="noopener noreferrer"
                class="group bg-white/3 border border-white/10 hover:border-white/20 rounded-2xl p-6 transition-all hover:bg-white/5"
                >
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-xs font-bold text-purple-400 uppercase tracking-wider">
                            {{ item.source }}
                            </span>
                            <span class="text-gray-600 text-xs">
                            {{ new Date(item.date).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short' }) }}
                            </span>
                        </div>

                        <h3 class="text-white font-bold text-base leading-snug mb-2 line-clamp-2 group-hover:text-yellow-400 transition-colors">
                            {{ item.title }}
                        </h3>

                        <p class="text-gray-500 text-sm line-clamp-2">
                            {{ item.description }}
                        </p>
                        </div>

                        <img
                        v-if="item.image"
                        :src="item.image"
                        :alt="item.title"
                        class="w-20 h-20 rounded-xl object-cover shrink-0 opacity-80"
                        @error="($event.target as HTMLImageElement).style.display = 'none'"
                        />
                    </div>

                    <div class="flex items-center gap-1 mt-4 text-xs text-gray-600 group-hover:text-yellow-400 transition-colors">
                        <ArrowRight :size="12" />
                        <span>Lire l'article</span>
                    </div>
                </a>
            </div>
        </section>
    </template>
  </div>
</template>

<style scoped>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-8px); }
}

.line-clamp-2 {
  display: -webkit-box;
  line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
