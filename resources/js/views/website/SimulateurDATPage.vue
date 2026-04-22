<template>
  <main class="min-h-screen bg-gray-50">

    <!-- Hero -->
    <section class="relative h-70 flex items-center overflow-hidden">
      <div class="absolute inset-0">
        <img src="@/assets/images/hero_produits.jpg" class="w-full h-full object-cover" alt="Hero DAT" />
        <div class="absolute inset-0"></div>
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <p class="text-white/60 text-xs font-semibold uppercase tracking-widest mb-2">Épargne</p>
        <h1 class="text-4xl lg:text-5xl font-black text-white">Simulateur de DAT</h1>
        <p class="text-white/70 mt-2 text-base max-w-xl">
          Dépôt à terme jusqu'à <span class="text-white font-bold">7,5%</span> de rendement annuel — zéro risque, zéro frais.
        </p>
      </div>
    </section>

    <!-- Calculator -->
    <section class="py-16">
      <div class="container mx-auto px-4 lg:px-6 max-w-5xl">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
          <div class="grid grid-cols-1 lg:grid-cols-5">

            <!-- Sliders -->
            <div class="lg:col-span-3 p-8 lg:p-12 space-y-10">
              <div>
                <h2 class="text-2xl font-black text-gray-900">Paramétrez votre dépôt</h2>
                <p class="text-gray-400 text-sm mt-1">Bougez les curseurs pour simuler en temps réel</p>
              </div>

              <!-- Montant -->
              <div class="space-y-3">
                <div class="flex justify-between items-end">
                  <label class="text-xs font-bold text-gray-400 uppercase tracking-widest">Montant du dépôt</label>
                  <div class="text-right">
                    <span class="text-3xl font-black text-gray-900">{{ formatCompact(montant) }}</span>
                    <span class="text-gray-400 text-sm ml-1">FCFA</span>
                  </div>
                </div>
                <input
                  type="range" v-model.number="montant"
                  :min="100000" :max="50000000" :step="100000"
                  :style="sliderStyle(montant, 100000, 50000000)"
                  class="slider w-full"
                />
                <div class="flex justify-between text-xs text-gray-300 font-medium">
                  <span>100 K</span><span>50 M</span>
                </div>
              </div>

              <!-- Durée -->
              <div class="space-y-3">
                <div class="flex justify-between items-end">
                  <label class="text-xs font-bold text-gray-400 uppercase tracking-widest">Durée du dépôt</label>
                  <div class="text-right">
                    <span class="text-3xl font-black text-gray-900">{{ dureeMois }}</span>
                    <span class="text-gray-400 text-sm ml-1">mois</span>
                  </div>
                </div>
                <input
                  type="range" v-model.number="dureeMois"
                  :min="6" :max="60" :step="1"
                  :style="sliderStyle(dureeMois, 6, 60)"
                  class="slider w-full"
                />
                <div class="flex justify-between text-xs text-gray-300 font-medium">
                  <span>6 mois</span><span>60 mois</span>
                </div>
              </div>

              <!-- Taux -->
              <div class="space-y-3">
                <div class="flex justify-between items-end">
                  <label class="text-xs font-bold text-gray-400 uppercase tracking-widest">Taux annuel</label>
                  <div class="text-right">
                    <span class="text-3xl font-black text-primary">{{ taux }}%</span>
                  </div>
                </div>
                <input
                  type="range" v-model.number="taux"
                  :min="1" :max="7.5" :step="0.5"
                  :style="sliderStyle(taux, 1, 7.5)"
                  class="slider w-full"
                />
                <div class="flex justify-between text-xs text-gray-300 font-medium">
                  <span>1%</span><span>7,5%</span>
                </div>
              </div>
            </div>

            <!-- Results -->
            <div class="lg:col-span-2 bg-primary p-8 lg:p-12 flex flex-col justify-between">
              <div>
                <p class="text-white/50 text-xs font-bold uppercase tracking-widest mb-8">Résultats</p>

                <div class="space-y-6">
                  <div>
                    <p class="text-white/50 text-xs uppercase tracking-wide mb-1">Montant déposé</p>
                    <p class="text-white text-xl font-black">{{ formatPrice(montant) }} <span class="text-white/50 text-sm font-normal">FCFA</span></p>
                  </div>

                  <div class="border-t border-white/15 pt-6">
                    <p class="text-white/50 text-xs uppercase tracking-wide mb-1">Intérêts générés</p>
                    <p class="text-white text-xl font-black">
                      <span class="text-green-300">+</span> {{ formatPrice(calculs.interet) }}
                      <span class="text-white/50 text-sm font-normal">FCFA</span>
                    </p>
                  </div>
                </div>

                <!-- Total -->
                <div class="mt-8 bg-white/10 backdrop-blur rounded-2xl p-6">
                  <p class="text-white/50 text-xs uppercase tracking-widest mb-3">Vous percevrez</p>
                  <p class="text-4xl font-black text-white leading-none">{{ formatPrice(calculs.total) }}</p>
                  <p class="text-white/50 text-sm mt-1">FCFA après {{ dureeMois }} mois</p>

                  <!-- Mini progress bar -->
                  <div class="mt-5">
                    <div class="flex justify-between text-white/40 text-xs mb-1">
                      <span>Capital</span><span>Intérêts</span>
                    </div>
                    <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                      <div
                        class="h-full bg-white/80 rounded-full transition-all duration-500"
                        :style="`width: ${calculs.total ? Math.round((montant / calculs.total) * 100) : 100}%`"
                      ></div>
                    </div>
                    <div class="flex justify-between text-white/40 text-xs mt-1">
                      <span>{{ calculs.total ? Math.round((montant / calculs.total) * 100) : 100 }}%</span>
                      <span>{{ calculs.total ? Math.round((calculs.interet / calculs.total) * 100) : 0 }}%</span>
                    </div>
                  </div>
                </div>
              </div>

              <p class="text-white text-[10px] mt-8 leading-relaxed">
                Simulation indicative, hors assurance. Rapprochez-vous de votre agence pour plus d'informations.
              </p>
            </div>

          </div>
        </div>

      </div>
    </section>

  </main>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
const montant = ref<number>(5000000);
const dureeMois = ref<number>(12);
const taux = ref<number>(4);

const calculs = computed(() => {
  if (!montant.value || !dureeMois.value) return { interet: 0, total: 0 };
  const interetGenere = montant.value * (taux.value / 100) * (dureeMois.value / 12);
  return {
    interet: Math.round(interetGenere),
    total: Math.round(montant.value + interetGenere),
  };
});

const sliderStyle = (value: number, min: number, max: number) => {
  const pct = ((value - min) / (max - min)) * 100;
  return `background: linear-gradient(to right, #D10000 ${pct}%, #e5e7eb ${pct}%)`;
};

const formatPrice = (value: number) => new Intl.NumberFormat('fr-FR').format(value);

const formatCompact = (value: number) => {
  if (value >= 1000000) return (value / 1000000).toLocaleString('fr-FR', { maximumFractionDigits: 1 }) + ' M';
  if (value >= 1000) return (value / 1000).toLocaleString('fr-FR', { maximumFractionDigits: 0 }) + ' K';
  return value.toLocaleString('fr-FR');
};

</script>

<style scoped>
.slider {
  -webkit-appearance: none;
  appearance: none;
  height: 6px;
  border-radius: 9999px;
  outline: none;
  cursor: pointer;
  transition: opacity 0.2s;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background: #D10000;
  cursor: pointer;
  border: 3px solid white;
  box-shadow: 0 2px 10px rgba(209, 0, 0, 0.45);
  transition: transform 0.15s, box-shadow 0.15s;
}

.slider::-webkit-slider-thumb:hover {
  transform: scale(1.2);
  box-shadow: 0 4px 16px rgba(209, 0, 0, 0.55);
}

.slider::-moz-range-thumb {
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background: #D10000;
  cursor: pointer;
  border: 3px solid white;
  box-shadow: 0 2px 10px rgba(209, 0, 0, 0.45);
}
</style>
