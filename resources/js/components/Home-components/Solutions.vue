<script setup>
import { ref, computed, onMounted } from 'vue'
import api from '@/utils/api'
import ScrollReveal from '@/components/ScrollReveal.vue'

// Toutes les services chargées depuis l'API
const services = ref([])

const fetchServices = async () => {
  try {
    const response = await api.get('/services?with_service_product=true')
    services.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur du chargement des services', error)
  }
}

// ==================== SOLUTIONS FINANCIÈRES ====================

const financialServices = computed(() => {
  return services.value.filter(s => s.type === 'financial_solution').sort((a, b) => a.id - b.id)
})

// Onglet actif = id du premier service financial_solution
const activeFinancialId = ref(null)

const activeFinancialService = computed(() => {
  return financialServices.value.find(s => s.id === activeFinancialId.value)
})

const activeFinancialProducts = computed(() => {
  return (activeFinancialService.value?.service_product || []).filter(p => p.section !== 'premium')
})

const isCredit = computed(() => {
  return activeFinancialService.value?.name?.toLowerCase().includes('crédit') || activeFinancialService.value?.name?.toLowerCase().includes('credit')
})

const changeFinancialTab = (id) => {
  activeFinancialId.value = id
}

// ==================== PACKS ====================

const packServices = computed(() => {
  return services.value.filter(s => s.type === 'pack').sort((a, b) => a.id - b.id)
})

// Onglet actif = id du premier service pack
const activePackId = ref(null)

const activePackProducts = computed(() => {
  const service = packServices.value.find(s => s.id === activePackId.value)
  return (service?.service_product || [])
})

const changePackTab = (id) => {
  activePackId.value = id
}

// ==================== INFOS CREDIT (statique) ====================

const creditFeesParticulier = [
  { range: 'De 100 000 à 500 000', fee: '10 000 F CFA' },
  { range: 'De 500 001 à 1 000 000', fee: '15 000 F CFA' },
  { range: 'De 1 000 001 à 5 000 000', fee: '20 000 F CFA' },
  { range: 'De 5 000 001 à 10 000 000', fee: '25 000 F CFA' },
  { range: 'De 10 000 001 à 25 000 000', fee: '30 000 F CFA' },
  { range: 'De 25 000 001 à 50 000 000', fee: '40 000 F CFA' },
  { range: 'A partir de 50 000 000', fee: '50 000 F CFA' },
]

const creditFeesEntreprise = [
  { range: 'De 100 000 à 500 000', fee: '15 000 F CFA' },
  { range: 'De 500 001 à 1 000 000', fee: '25 000 F CFA' },
  { range: 'De 1 000 001 à 5 000 000', fee: '35 000 F CFA' },
  { range: 'De 5 000 001 à 10 000 000', fee: '45 000 F CFA' },
  { range: 'De 10 000 001 à 25 000 000', fee: '55 000 F CFA' },
  { range: 'De 25 000 001 à 50 000 000', fee: '65 000 F CFA' },
  { range: 'A partir de 50 000 000', fee: '75 000 F CFA' },
]

const isCreditEntreprise = computed(() => {
  const name = activeFinancialService.value?.name?.toLowerCase() || ''
  return name.includes('entreprise') || name.includes('morale')
})

const creditFees = computed(() => {
  return isCreditEntreprise.value ? creditFeesEntreprise : creditFeesParticulier
})

const creditTitle = computed(() => {
  return isCreditEntreprise.value
    ? 'Frais de demande de crédit — Personne Morale'
    : 'Frais de demande de crédit — Personne Physique'
})

const creditKeyInfos = [
  { label: "Taux d'intérêt max", value: '1,5% mensuel dégressif' },
  { label: 'Frais de dossier max', value: '3%' },
  { label: 'Dépôt de garantie', value: 'Min 10%' },
  { label: 'Assurance Emprunteur', value: 'Suivant Grille Assureur' },
]

// ==================== INIT ====================

onMounted(async () => {
  await fetchServices()
  // Sélectionner le premier onglet par défaut
  if (financialServices.value.length > 0) {
    activeFinancialId.value = financialServices.value[0].id
  }
  if (packServices.value.length > 0) {
    activePackId.value = packServices.value[0].id
  }
})
</script>

<template>
  <section class="py-16 md:py-20 bg-gray-50">
    <div class="max-w-350 mx-auto px-4 lg:px-14">

      <!-- ===================== SOLUTIONS FINANCIÈRES ===================== -->
      <div class="text-center mb-8 md:mb-10">
        <h2 class="text-gray-900 text-3xl md:text-4xl lg:text-5xl font-bold mb-4">
          Nos solutions financières
        </h2>
        <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto">
          Des produits adaptés à chaque étape de votre vie, ou de vos ambitions entreprise
        </p>
      </div>

      <!-- Onglets solutions financières (dynamiques) -->
      <div v-if="financialServices.length > 0" class="flex justify-center gap-4 mb-12 flex-wrap">
        <button
          v-for="service in financialServices"
          :key="service.id"
          @click="changeFinancialTab(service.id)"
          class="px-8 py-3 rounded-full text-sm md:text-base font-bold transition-all duration-300"
          :class="activeFinancialId === service.id
            ? 'bg-primary text-white shadow-lg'
            : 'bg-white text-gray-700 border-2 border-gray-300 hover:border-primary'"
        >
          {{ service.name }}
        </button>
      </div>

      <!-- Contenu de l'onglet financier actif -->
      <ScrollReveal
        v-if="activeFinancialProducts.length > 0"
        :key="activeFinancialId"
        :stagger="true"
        :stagger-delay="80"
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 mb-16"
      >
          <div
            v-for="product in activeFinancialProducts"
            :key="product.id"
            class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-4 lg:p-5 border border-gray-100 hover:-translate-y-1 group"
          >
            <!-- Icône -->
            <div class="w-12 h-12 bg-pink-50 rounded-lg flex items-center justify-center mb-4 group-hover:bg-primary group-hover:scale-110 transition-all duration-300">
              <svg class="w-6 h-6 text-primary group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>

            <!-- Nom -->
            <h3 class="text-gray-900 text-xl font-bold mb-3">
              {{ product.name }}
            </h3>

            <!-- Avantage -->
            <p class="text-gray-600 text-sm leading-relaxed mb-4">
              {{ product.advantage }}
            </p>

            <!-- Crédit -->
            <p v-if="product.credit_access" class="text-gray-500 text-xs mb-2">
              Taux de rémunération : {{ product.credit_access }}
            </p>

            <!-- Dépôt -->
            <p v-if="product.deposit_at_opening" class="text-gray-500 text-xs mb-4">
              Dépôt à l'ouverture : {{ product.deposit_at_opening }}
            </p>

            <!-- Lien -->
            <router-link
              v-if="!isCredit"
              :to="{ name: 'pack-form', params: { productId: product.id } }"
              class="inline-flex items-center text-primary text-sm font-semibold hover:gap-2 gap-1 transition-all duration-300"
            >
              Souscrire &rarr;
            </router-link>
          </div>
      </ScrollReveal>

      <!-- État vide solutions -->
      <div v-else-if="financialServices.length > 0" class="text-center py-12 mb-16">
        <p class="text-gray-600 text-lg">Aucun produit pour cette solution.</p>
      </div>



      <!-- ===================== INFOS CREDIT ===================== -->
      <div v-if="isCredit" class="mt-12 mb-16 animate-fade-in">

        <!-- Tableau des frais -->
   <!--      <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden mb-10">
          <div class="bg-primary px-6 py-4">
            <h3 class="text-white text-lg md:text-xl font-bold text-center">
              {{ creditTitle }}
            </h3>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="bg-gray-50">
                  <th class="px-6 py-3 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                    Montant de la demande (en FCFA)
                  </th>
                  <th class="px-6 py-3 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                    Montant Frais
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
                <tr v-for="(row, idx) in creditFees" :key="idx" class="hover:bg-gray-50 transition-colors">
                  <td class="px-6 py-3 text-sm text-gray-700">{{ row.range }}</td>
                  <td class="px-6 py-3 text-sm font-semibold text-primary">{{ row.fee }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div> -->

        <!-- 4 badges infos clés -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
          <div
            v-for="(info, idx) in creditKeyInfos"
            :key="idx"
            class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300"
          >
            <div class="w-14 h-14 bg-pink-50 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg v-if="idx === 0" class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
              </svg>
              <svg v-else-if="idx === 1" class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <svg v-else-if="idx === 2" class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
              <svg v-else class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <h4 class="text-gray-900 font-bold text-sm mb-1">{{ info.label }}</h4>
            <p class="text-primary font-bold text-lg">{{ info.value }}</p>
          </div>
        </div>

        <!-- Pénalités & Commissions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Pénalités de retard -->
          <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <h4 class="text-gray-900 font-bold text-base">Pénalités de retard</h4>
            </div>
            <ul class="space-y-2">
              <li class="flex items-start gap-2 text-sm text-gray-600">
                <span class="text-primary mt-1">&#8226;</span>
                Intérêt de retard : 0,3% de l'échéance due / jour + 1 000 F Forfaitaire
              </li>
            </ul>
          </div>

          <!-- Commissions sur remboursement anticipé -->
          <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-10 h-10 bg-orange-50 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <h4 class="text-gray-900 font-bold text-base">Commissions sur remboursement anticipé</h4>
            </div>
            <ul class="space-y-2">
              <li class="flex items-start gap-2 text-sm text-gray-600">
                <span class="text-primary mt-1">&#8226;</span>
                Rachat interne : 2% sur l'encours restant dû (pour les clients qui restent)
              </li>
              <li class="flex items-start gap-2 text-sm text-gray-600">
                <span class="text-primary mt-1">&#8226;</span>
                Rachat externe : 5% sur l'encours restant dû (pour les clients qui nous quittent)
              </li>
            </ul>
          </div>
        </div>

      </div>



      <!-- ===================== PACKS ===================== -->
      <div class="mt-16">
        <div class="text-center mb-10">
          <h2 class="text-primary text-2xl md:text-3xl lg:text-4xl font-bold">
            Nos Packs
          </h2>
        </div>

        <!-- Onglets packs (dynamiques) -->
        <div v-if="packServices.length > 0" class="flex justify-center gap-4 mb-12 flex-wrap">
          <button
            v-for="service in packServices"
            :key="service.id"
            @click="changePackTab(service.id)"
            class="px-8 py-3 rounded-full text-sm md:text-base font-bold transition-all duration-300"
            :class="activePackId === service.id
              ? 'bg-primary text-white shadow-lg'
              : 'bg-white text-gray-700 border-2 border-gray-300 hover:border-primary'"
          >
            {{ service.name }}
          </button>
        </div>

        <!-- Cartes des produits du pack actif -->
        <ScrollReveal
          v-if="activePackProducts.length > 0"
          :key="activePackId"
          :stagger="true"
          :stagger-delay="80"
          class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6"
        >
            <div
              v-for="(product, index) in activePackProducts"
              :key="product.id"
              :class="[
                'bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-2 lg:p-6 border-2 hover:-translate-y-1 relative',
                index === 0 ? 'border-primary' : 'border-gray-200'
              ]"
            >
              <!-- Badge premier produit -->
              <div
                v-if="index === 0"
                class="absolute -top-3 left-1/2 -translate-x-1/2 bg-primary text-white text-xs font-bold px-4 py-1 rounded-full"
              >
                Populaire
              </div>

              <!-- Titre -->
              <h3 class="text-xl md:text-2xl font-bold mb-4 text-center text-gray-900">
                {{ product.name }}
              </h3>

              <!-- Description / Avantage -->
              <p class="text-gray-600 text-sm leading-relaxed  text-center min-h-20">
                {{ product.advantage }}
              </p>

              <!-- Crédit -->
              <p v-if="product.credit_access" class="text-gray-500 text-xs text-center mb-2">
                Crédit : {{ product.credit_access }} de FCFA
              </p>

              <!-- Dépôt -->
              <p v-if="product.deposit_at_opening" class="text-gray-500 text-xs text-center mb-4">
                Dépôt à l'ouverture : {{ product.deposit_at_opening }} FCFA
              </p>

              <!-- Bouton -->
              <router-link
                :to="{ name: 'pack-form', params: { productId: product.id } }"
                :class="[
                  'block w-full text-center px-6 py-3 rounded-lg text-sm font-bold transition-all duration-300',
                  index === 0
                    ? 'bg-primary text-white hover:bg-secondary shadow-md hover:shadow-lg'
                    : 'bg-white text-primary border-2 border-primary hover:bg-primary hover:text-white'
                ]"
              >
                Souscrire
              </router-link>
            </div>
        </ScrollReveal>

        <!-- État vide packs -->
        <div v-else-if="packServices.length > 0" class="text-center py-12">
          <p class="text-gray-600 text-lg">Aucun produit pour ce pack.</p>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in {
  animation: fadeIn 0.5s ease-out;
}
</style>
