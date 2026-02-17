<template>
  <main class="min-h-screen bg-white">
    <section class="relative h-[300px] flex items-center bg-[#333] overflow-hidden">
      <div class="absolute inset-0 opacity-40">
        <img src="@/assets/images/hero_produits.png" class="w-full h-full object-cover" alt="Hero Convertisseur" />
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <h1 class="text-4xl font-bold text-white tracking-tight">Convertisseur de devise</h1>
      </div>
    </section>

    <section class="py-12 bg-white">
      <div class="container mx-auto px-6 max-w-5xl">
        <p class="text-gray-700 leading-relaxed mb-4">
          Convertissez facilement vos devises avec nos taux de change actualisés en temps réel.
        </p>
        <p class="text-gray-700 leading-relaxed mb-4">
          Notre convertisseur vous permet d'effectuer des conversions rapides et précises entre différentes devises internationales et le Franc CFA.
        </p>
        <p class="text-gray-700 leading-relaxed font-medium">
          Un outil simple, gratuit et efficace pour vos opérations de change.
        </p>
        <div v-if="derniereMAJ" class="mt-4 text-sm text-gray-500">
          📅 Taux mis à jour le : {{ derniereMAJ }}
        </div>
      </div>
    </section>

    <section class="pb-20 container mx-auto px-6">
      <div class="max-w-4xl mx-auto">

        <!-- Message de chargement -->
        <div v-if="chargement" class="bg-[#F2F2F2] p-12 rounded-3xl shadow-sm text-center">
          <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-[#D10000] mb-4"></div>
          <p class="text-gray-700">Chargement des taux de change...</p>
        </div>

        <!-- Message d'erreur -->
        <div v-else-if="erreur" class="bg-red-50 border border-red-200 p-6 rounded-3xl shadow-sm">
          <p class="text-red-700 font-medium mb-4">❌ {{ erreur }}</p>
          <button
            @click="chargerTaux"
            class="px-6 py-2 bg-[#D10000] text-white rounded-lg hover:bg-[#A00000] transition-colors"
          >
            🔄 Réessayer
          </button>
        </div>

        <!-- Formulaire de conversion -->
        <div v-else class="bg-[#F2F2F2] p-8 md:p-12 rounded-3xl shadow-sm">

          <!-- Montant à convertir -->
          <div class="mb-8">
            <label class="block text-sm font-bold text-gray-800 mb-3">Montant à convertir</label>
            <input
              v-model.number="montant"
              type="number"
              placeholder="0"
              min="0"
              step="0.01"
              class="w-full p-4 bg-white border-none rounded-lg outline-none text-right font-bold text-lg focus:ring-2 focus:ring-[#D10000]"
            />
          </div>

          <!-- Conversion horizontale -->
          <div class="grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-6 items-end mb-8">

            <!-- Devise source -->
            <div>
              <label class="block text-sm font-bold text-gray-800 mb-3">De</label>
              <select
                v-model="deviseSource"
                class="w-full p-4 bg-white border-none rounded-lg outline-none font-bold focus:ring-2 focus:ring-[#D10000]"
              >
                <option v-for="devise in devisesPrincipales" :key="devise.code" :value="devise.code">
                  {{ devise.code }} - {{ devise.nom }}
                </option>
              </select>
              <div class="mt-3 text-right">
                <span class="text-2xl font-black text-gray-900">{{ formatPrice(montant) }}</span>
                <span class="text-lg font-bold text-gray-600 ml-2">{{ deviseSource }}</span>
              </div>
            </div>

            <!-- Bouton d'inversion -->
            <div class="flex justify-center pb-10">
              <button
                @click="inverserDevises"
                class="p-4 bg-[#D10000] text-white rounded-full hover:bg-[#A00000] transition-all transform hover:scale-110 hover:rotate-180 duration-300 shadow-lg"
                title="Inverser les devises"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                </svg>
              </button>
            </div>

            <!-- Devise cible -->
            <div>
              <label class="block text-sm font-bold text-gray-800 mb-3">Vers</label>
              <select
                v-model="deviseCible"
                class="w-full p-4 bg-white border-none rounded-lg outline-none font-bold focus:ring-2 focus:ring-[#D10000]"
              >
                <option v-for="devise in devisesPrincipales" :key="devise.code" :value="devise.code">
                  {{ devise.code }} - {{ devise.nom }}
                </option>
              </select>
              <div class="mt-3 text-right">
                <span class="text-2xl font-black text-[#D10000]">{{ formatPrice(montantConverti) }}</span>
                <span class="text-lg font-bold text-gray-600 ml-2">{{ deviseCible }}</span>
              </div>
            </div>

          </div>

          <!-- Informations complémentaires -->
          <div class="bg-white p-6 rounded-lg mb-6">
            <div class="flex justify-between items-center mb-3">
              <span class="text-sm text-gray-700">💱 Taux de change</span>
              <span class="font-bold text-gray-900">1 {{ deviseSource }} = {{ formatPrice(tauxConversion) }} {{ deviseCible }}</span>
            </div>
            <div class="flex justify-between items-center text-xs text-gray-500">
              <span>🔄 Taux inverse</span>
              <span>1 {{ deviseCible }} = {{ formatPrice(1 / tauxConversion) }} {{ deviseSource }}</span>
            </div>
          </div>

          <!-- Devises populaires -->
          <div class="bg-white p-6 rounded-lg">
            <h3 class="font-bold text-gray-800 mb-4">⭐ Taux populaires (base: 1 {{ deviseSource }})</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
              <div
                v-for="devise in devisesPopulaires"
                :key="devise"
                class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-lg text-center hover:from-[#FFF0F0] hover:to-[#FFE5E5] transition-all cursor-pointer transform hover:scale-105 shadow-sm hover:shadow-md"
                @click="changerDeviseCible(devise)"
              >
                <div class="font-bold text-[#D10000] mb-1 text-lg">{{ devise }}</div>
                <div class="text-sm text-gray-600 font-semibold">{{ formatPrice(obtenirTaux(devise)) }}</div>
                <div class="text-xs text-gray-400 mt-1">{{ getNomDevise(devise) }}</div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
</template>

<script setup lang="ts">
import { ref, computed, onMounted, watch } from 'vue';

interface Devise {
  code: string;
  nom: string;
}

interface TauxAPI {
  [key: string]: number;
}

// API GRATUITE ILLIMITÉE avec support XOF - Fawaz Currency API
const API_BASE_URL = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies';
const API_FALLBACK = 'https://latest.currency-api.pages.dev/v1/currencies';

// Liste des devises principales avec noms complets
const devisesPrincipales: Devise[] = [
  { code: 'xof', nom: 'Franc CFA (BCEAO)' },
  { code: 'eur', nom: 'Euro' },
  { code: 'usd', nom: 'Dollar Américain' },
  { code: 'gbp', nom: 'Livre Sterling' },
  { code: 'cad', nom: 'Dollar Canadien' },
  { code: 'chf', nom: 'Franc Suisse' },
  { code: 'jpy', nom: 'Yen Japonais' },
  { code: 'cny', nom: 'Yuan Chinois' },
  { code: 'aud', nom: 'Dollar Australien' },
  { code: 'inr', nom: 'Roupie Indienne' },
  { code: 'brl', nom: 'Réal Brésilien' },
  { code: 'zar', nom: 'Rand Sud-Africain' },
  { code: 'mxn', nom: 'Peso Mexicain' },
  { code: 'sgd', nom: 'Dollar de Singapour' },
  { code: 'nzd', nom: 'Dollar Néo-Zélandais' },
];

const devisesPopulaires = ['eur', 'usd', 'gbp', 'xof', 'cad', 'chf', 'jpy', 'cny'];

// États
const montant = ref<number>(1000);
const deviseSource = ref<string>('eur');
const deviseCible = ref<string>('xof');
const tauxDeChange = ref<TauxAPI>({});
const chargement = ref<boolean>(true);
const erreur = ref<string>('');
const derniereMAJ = ref<string>('');

// Computed
const tauxConversion = computed(() => {
  if (!tauxDeChange.value[deviseCible.value]) return 0;
  return tauxDeChange.value[deviseCible.value];
});

const montantConverti = computed(() => {
  if (!montant.value || !tauxConversion.value) return 0;
  return montant.value * tauxConversion.value;
});

// Méthodes
const chargerTaux = async () => {
  try {
    chargement.value = true;
    erreur.value = '';

    // Construire l'URL avec la devise source en minuscules
    const url = `${API_BASE_URL}/${deviseSource.value.toLowerCase()}.json`;

    let response = await fetch(url);

    // Fallback sur l'API secondaire si la première échoue
    if (!response.ok) {
      const fallbackUrl = `${API_FALLBACK}/${deviseSource.value.toLowerCase()}.json`;
      response = await fetch(fallbackUrl);
    }

    if (!response.ok) {
      throw new Error('Erreur lors de la récupération des taux de change');
    }

    const data = await response.json();

    // L'API retourne les taux dans un objet avec la devise source comme clé
    const deviseKey = deviseSource.value.toLowerCase();
    if (data[deviseKey]) {
      tauxDeChange.value = data[deviseKey];

      // Mettre à jour la date (la date actuelle car l'API est mise à jour quotidiennement)
      derniereMAJ.value = new Date().toLocaleDateString('fr-FR', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
      });
    } else {
      throw new Error('Format de données inattendu');
    }

  } catch (err) {
    console.error('Erreur de chargement:', err);
    erreur.value = 'Impossible de charger les taux de change. Veuillez vérifier votre connexion internet et réessayer.';
  } finally {
    chargement.value = false;
  }
};

const inverserDevises = () => {
  const temp = deviseSource.value;
  deviseSource.value = deviseCible.value;
  deviseCible.value = temp;
};

const changerDeviseCible = (devise: string) => {
  if (devise !== deviseSource.value) {
    deviseCible.value = devise;
  }
};

const obtenirTaux = (codeDevise: string): number => {
  return tauxDeChange.value[codeDevise.toLowerCase()] || 0;
};

const getNomDevise = (code: string): string => {
  const devise = devisesPrincipales.find(d => d.code === code.toLowerCase());
  return devise ? devise.nom : code.toUpperCase();
};

const formatPrice = (value: number): string => {
  if (!value || isNaN(value)) return '0,00';

  return new Intl.NumberFormat('fr-FR', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 4
  }).format(value);
};

// Lifecycle
onMounted(() => {
  chargerTaux();
});

// Watchers - Recharger les taux quand la devise source change
watch(deviseSource, () => {
  chargerTaux();
});
</script>

<style scoped>
/* Animations pour le spinner de chargement */
@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}

.animate-spin {
  animation: spin 1s linear infinite;
}

/* Améliorer l'apparence des inputs number */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  opacity: 1;
}
</style>
