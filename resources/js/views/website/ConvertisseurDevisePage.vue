<template>
  <main class="min-h-screen bg-gray-50">

    <!-- Hero -->
    <section class="relative h-70 flex items-center overflow-hidden">
      <div class="absolute inset-0">
        <img src="@/assets/images/hero_produits.png" class="w-full h-full object-cover" alt="Hero Convertisseur" />
        <div class="absolute inset-0"></div>
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <p class="text-white/60 text-xs font-semibold uppercase tracking-widest mb-2">Change</p>
        <h1 class="text-4xl lg:text-5xl font-black text-white">Convertisseur de devise</h1>
        <p class="text-white/70 mt-2 text-base">Taux de change mis à jour quotidiennement.</p>
      </div>
    </section>

    <!-- Converter -->
    <section class="py-16">
      <div class="container mx-auto px-4 lg:px-6 max-w-3xl">

        <!-- Chargement -->
        <div v-if="chargement" class="bg-white rounded-3xl shadow-xl p-16 flex flex-col items-center gap-4">
          <div class="w-12 h-12 rounded-full border-4 border-gray-100 border-t-primary animate-spin"></div>
          <p class="text-gray-400 text-sm">Chargement des taux…</p>
        </div>

        <!-- Erreur -->
        <div v-else-if="erreur" class="bg-white rounded-3xl shadow-xl p-12 text-center">
          <p class="text-gray-500 mb-6 text-sm">{{ erreur }}</p>
          <button @click="chargerTaux" class="bg-primary text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-red-700 transition-colors">
            Réessayer
          </button>
        </div>

        <!-- Convertisseur -->
        <div v-else class="bg-white rounded-3xl shadow-xl overflow-hidden">
          <div class="grid grid-cols-1 lg:grid-cols-5">

            <!-- Inputs -->
            <div class="lg:col-span-3 p-8 lg:p-10 space-y-6">
              <div>
                <h2 class="text-xl font-black text-gray-900">Conversion</h2>
                <p class="text-gray-400 text-xs mt-1">{{ derniereMAJ ? 'Taux du ' + derniereMAJ : '' }}</p>
              </div>

              <!-- Montant -->
              <div>
                <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-2">Montant</label>
                <input
                  v-model.number="montant"
                  type="number"
                  min="0"
                  step="0.01"
                  placeholder="0"
                  class="w-full px-4 py-3 bg-gray-50 rounded-xl text-right text-2xl font-black text-gray-900 outline-none focus:ring-2 focus:ring-primary/30 transition"
                />
              </div>

              <!-- De / Vers -->
              <div class="flex items-end gap-3">
                <div class="flex-1">
                  <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-2">De</label>
                  <select
                    v-model="deviseSource"
                    class="w-full px-4 py-3 bg-gray-50 rounded-xl font-bold text-gray-900 outline-none focus:ring-2 focus:ring-primary/30 transition appearance-none cursor-pointer"
                  >
                    <option v-for="d in devisesPrincipales" :key="d.code" :value="d.code">
                      {{ d.code.toUpperCase() }} — {{ d.nom }}
                    </option>
                  </select>
                </div>

                <!-- Swap -->
                <button
                  @click="inverserDevises"
                  class="mb-0.5 w-11 h-11 shrink-0 bg-primary text-white rounded-xl flex items-center justify-center hover:bg-red-700 transition-all hover:rotate-180 duration-300 shadow-md"
                  title="Inverser"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                  </svg>
                </button>

                <div class="flex-1">
                  <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-2">Vers</label>
                  <select
                    v-model="deviseCible"
                    class="w-full px-4 py-3 bg-gray-50 rounded-xl font-bold text-gray-900 outline-none focus:ring-2 focus:ring-primary/30 transition appearance-none cursor-pointer"
                  >
                    <option v-for="d in devisesPrincipales" :key="d.code" :value="d.code">
                      {{ d.code.toUpperCase() }} — {{ d.nom }}
                    </option>
                  </select>
                </div>
              </div>

              <!-- Taux inverse -->
              <p class="text-xs text-gray-400 text-right">
                1 {{ deviseCible.toUpperCase() }} = {{ formatPrice(1 / tauxConversion) }} {{ deviseSource.toUpperCase() }}
              </p>
            </div>

            <!-- Résultat -->
            <div class="lg:col-span-2 bg-primary p-8 lg:p-10 flex flex-col justify-center gap-6">
              <p class="text-white/50 text-xs font-bold uppercase tracking-widest">Résultat</p>

              <div>
                <p class="text-white/60 text-xs uppercase tracking-wide mb-1">Vous avez</p>
                <p class="text-white text-xl font-black">{{ formatPrice(montant) }} <span class="text-white/50 text-sm font-normal">{{ deviseSource.toUpperCase() }}</span></p>
              </div>

              <div class="border-t border-white/15 pt-6">
                <p class="text-white/60 text-xs uppercase tracking-wide mb-1">Taux appliqué</p>
                <p class="text-white text-sm font-bold">1 {{ deviseSource.toUpperCase() }} = {{ formatPrice(tauxConversion) }} {{ deviseCible.toUpperCase() }}</p>
              </div>

              <div class="bg-white/10 rounded-2xl p-6">
                <p class="text-white/50 text-xs uppercase tracking-widest mb-2">Équivaut à</p>
                <p class="text-2xl font-black text-white leading-none">{{ formatPrice(montantConverti) }}</p>
                <p class="text-white/50 text-sm mt-1">{{ deviseCible.toUpperCase() }}</p>
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

interface Devise { code: string; nom: string; }
interface TauxAPI { [key: string]: number; }

const API_BASE_URL = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies';
const API_FALLBACK = 'https://latest.currency-api.pages.dev/v1/currencies';

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
  { code: 'sgd', nom: 'Dollar de Singapour' },
];

const montant = ref<number>(1000);
const deviseSource = ref<string>('eur');
const deviseCible = ref<string>('xof');
const tauxDeChange = ref<TauxAPI>({});
const chargement = ref<boolean>(true);
const erreur = ref<string>('');
const derniereMAJ = ref<string>('');

const tauxConversion = computed(() => tauxDeChange.value[deviseCible.value] || 0);
const montantConverti = computed(() => montant.value && tauxConversion.value ? montant.value * tauxConversion.value : 0);

const chargerTaux = async () => {
  try {
    chargement.value = true;
    erreur.value = '';
    const url = `${API_BASE_URL}/${deviseSource.value.toLowerCase()}.json`;
    let response = await fetch(url);
    if (!response.ok) response = await fetch(`${API_FALLBACK}/${deviseSource.value.toLowerCase()}.json`);
    if (!response.ok) throw new Error();
    const data = await response.json();
    const key = deviseSource.value.toLowerCase();
    if (data[key]) {
      tauxDeChange.value = data[key];
      derniereMAJ.value = new Date().toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' });
    } else throw new Error();
  } catch {
    erreur.value = 'Impossible de charger les taux de change. Vérifiez votre connexion et réessayez.';
  } finally {
    chargement.value = false;
  }
};

const inverserDevises = () => {
  [deviseSource.value, deviseCible.value] = [deviseCible.value, deviseSource.value];
};

const formatPrice = (value: number): string => {
  if (!value || isNaN(value)) return '0,00';
  return new Intl.NumberFormat('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 4 }).format(value);
};

onMounted(() => chargerTaux());
watch(deviseSource, () => chargerTaux());
</script>
