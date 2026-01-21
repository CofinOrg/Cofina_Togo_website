<template>
  <main class="min-h-screen bg-white">
    <section class="relative h-[300px] flex items-center bg-[#333]">
      <div class="absolute inset-0 opacity-40">
        <img src="@/assets/images/hero_produits.png" class="w-full h-full object-cover" />
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <h1 class="text-4xl font-bold text-white">Simulateurs de prêt</h1>
      </div>
    </section>

    <section class="py-20 container mx-auto px-6">
      <div class="flex flex-col lg:flex-row items-center gap-12">

        <div class="lg:w-1/2 flex justify-center">
          <img src="../../assets/images/simulateurs/calculatrice_piece.png" alt="Simulation" class="max-w-md" />
        </div>

        <div class="lg:w-1/2 bg-gray-50 p-10 rounded-3xl shadow-sm border border-gray-100">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <div class="space-y-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Montant du crédit</label>
                <div class="relative">
                  <input v-model="montant" type="number" class="w-full p-3 bg-white border rounded-lg outline-none focus:border-[#D10000]" />
                  <span class="absolute right-3 top-3 text-gray-400">0</span>
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Durée en année</label>
                <input v-model="duree" type="number" class="w-full p-3 bg-white border rounded-lg outline-none" />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Taux nominal annuel</label>
                <input v-model="taux" type="number" class="w-full p-3 bg-white border rounded-lg outline-none" />
              </div>
            </div>

            <div class="space-y-4">
              <h3 class="text-xl font-bold mb-6">Résultat de la simulation</h3>
              <div class="flex justify-between border-b pb-2">
                <span>Montant du crédit</span>
                <span class="font-bold">{{ montant.toLocaleString() }} FCFA</span>
              </div>
              <div class="flex justify-between border-b pb-2">
                <span>Durée en année</span>
                <span class="font-bold">{{ duree }}</span>
              </div>
              <div class="flex justify-between border-b pb-2">
                <span>Taux</span>
                <span class="font-bold">{{ taux }} %</span>
              </div>
              <div class="flex justify-between border-b pb-2">
                <span>Montant de l'échéance</span>
                <span class="font-bold text-[#D10000]">{{ resultats.echeance.toLocaleString() }} FCFA</span>
              </div>
              <div class="flex justify-between pt-2">
                <span class="font-bold">Total</span>
                <span class="font-bold">{{ resultats.total.toLocaleString() }} FCFA</span>
              </div>
            </div>
          </div>

          <p class="text-[10px] text-gray-400 mt-8 leading-tight italic">
            NB: cette simulation est à titre indicatif...
          </p>

          <div class="mt-8 flex gap-4">
            <button class="flex-1 bg-[#D10000] text-white py-3 px-1 rounded-lg font-bold text-sm uppercase">Voir le tableau d'amortissement</button>
            <button class="flex-1 bg-[#D10000] text-white py-3 rounded-lg font-bold text-sm uppercase">Imprimer le tableau d'amortissement</button>
          </div>
        </div>

      </div>
    </section>
  </main>
</template>

<script setup>
import { ref, computed } from 'vue';

const montant = ref(0);
const duree = ref(0);
const taux = ref(18); // Taux par défaut selon la maquette

const resultats = computed(() => {
  if (!montant.value || !duree.value) return { echeance: 0, total: 0 };
  const n = duree.value * 12;
  const r = (taux.value / 100) / 12;
  const ech = montant.value * (r / (1 - Math.pow(1 + r, -n)));
  return { echeance: Math.round(ech), total: Math.round(ech * n) };
});
</script>
