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
          Convertissez facilement vos devises avec nos taux de change actualisés.
        </p>
        <p class="text-gray-700 leading-relaxed mb-4">
          Notre convertisseur vous permet d'effectuer des conversions rapides et précises entre différentes devises internationales et le Franc CFA.
        </p>
        <p class="text-gray-700 leading-relaxed font-medium">
          Un outil simple et efficace pour vos opérations de change.
        </p>
      </div>
    </section>

    <section class="pb-20 container mx-auto px-6">
      <div class="max-w-4xl mx-auto">
        <div class="bg-[#F2F2F2] p-8 md:p-12 rounded-3xl shadow-sm">

          <!-- Montant à convertir -->
          <div class="mb-8">
            <label class="block text-sm font-bold text-gray-800 mb-3">Montant à convertir</label>
            <input
              v-model.number="montant"
              type="number"
              placeholder="0"
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
                <option v-for="devise in devises" :key="devise.code" :value="devise.code">
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
                class="p-4 bg-[#D10000] text-white rounded-full hover:bg-[#A00000] transition-colors shadow-lg"
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
                <option v-for="devise in devises" :key="devise.code" :value="devise.code">
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
          <div class="bg-white p-6 rounded-lg">
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-700">Taux de change</span>
              <span class="font-bold text-gray-900">1 {{ deviseSource }} = {{ formatPrice(tauxConversion) }} {{ deviseCible }}</span>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';

interface Devise {
  code: string;
  nom: string;
  tauxVersFCFA: number;
}

const devises = ref<Devise[]>([
  { code: 'XOF', nom: 'Franc CFA (BCEAO)', tauxVersFCFA: 1 },
  { code: 'EUR', nom: 'Euro', tauxVersFCFA: 655.957 },
  { code: 'USD', nom: 'Dollar Américain', tauxVersFCFA: 600 },
  { code: 'GBP', nom: 'Livre Sterling', tauxVersFCFA: 780 },
  { code: 'CAD', nom: 'Dollar Canadien', tauxVersFCFA: 450 },
  { code: 'CHF', nom: 'Franc Suisse', tauxVersFCFA: 680 },
  { code: 'JPY', nom: 'Yen Japonais', tauxVersFCFA: 5.5 },
  { code: 'CNY', nom: 'Yuan Chinois', tauxVersFCFA: 85 },
]);

const montant = ref<number>(0);
const deviseSource = ref<string>('EUR');
const deviseCible = ref<string>('XOF');

const inverserDevises = () => {
  const temp = deviseSource.value;
  deviseSource.value = deviseCible.value;
  deviseCible.value = temp;
};

const tauxConversion = computed(() => {
  const source = devises.value.find(d => d.code === deviseSource.value);
  const cible = devises.value.find(d => d.code === deviseCible.value);

  if (!source || !cible) return 0;

  return source.tauxVersFCFA / cible.tauxVersFCFA;
});

const montantConverti = computed(() => {
  if (!montant.value) return 0;
  return montant.value * tauxConversion.value;
});

const formatPrice = (value: number) => {
  return new Intl.NumberFormat('fr-FR', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  }).format(value);
};
</script>
