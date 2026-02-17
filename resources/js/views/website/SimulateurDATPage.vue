<template>
  <main class="min-h-screen bg-white">
    <section class="relative h-[300px] flex items-center bg-[#333] overflow-hidden">
      <div class="absolute inset-0 opacity-40">
        <img src="@/assets/images/hero_produits.png" class="w-full h-full object-cover" alt="Hero Simulateur" />
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <h1 class="text-4xl font-bold text-white tracking-tight">Simulateurs de DAT</h1>
      </div>
    </section>

    <section class="py-12 bg-white">
      <div class="container mx-auto px-6 max-w-5xl">
        <p class="text-gray-700 leading-relaxed mb-4">
          Le Dépôt à Terme est une épargne bloquée sur un compte en contrepartie du versement d’intérêts.
        </p>
        <p class="text-gray-700 leading-relaxed mb-4">
          Pour une durée minimale de 6 mois, profitez du DAT (Dépôt à terme) avec un taux de rémunération allant jusqu’à 7,5% pour une prise de risque complètement nulle et 0 frais de tenue de compte.
        </p>
        <p class="text-gray-700 leading-relaxed font-medium">
          La garantie d’un investissement sûr et rentable avec les meilleurs taux du marché.
        </p>
      </div>
    </section>

    <section class="pb-20 container mx-auto px-6">
      <div class="flex flex-col lg:flex-row items-center gap-12">

        <div class="lg:w-1/2 flex justify-center">
          <img
            src="../../assets/images/simulateurs/Design_sans_titre_2_-removebg-preview.png"
            alt="Simulation DAT"
            class="max-w-2xl w-full h-auto"
            />

        </div>

        <div class="lg:w-1/2 bg-[#F2F2F2] p-8 md:p-12 rounded-3xl shadow-sm">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

            <div class="space-y-8">
              <div>
                <label class="block text-sm font-bold text-gray-800 mb-3">Montant du dépôt</label>
                <div class="relative">
                  <input
                    v-model.number="montant"
                    type="number"
                    placeholder="0"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none text-right font-bold focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>
              </div>

              <div>
                <label class="block text-sm font-bold text-gray-800 mb-3">Durée du dépôt (en mois)</label>
                <div class="relative">
                  <input
                    v-model.number="dureeMois"
                    type="number"
                    placeholder="0"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none text-right font-bold focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>
              </div>

                <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Taux annuel (%)</label>
                <input v-model="taux" type="number" step="0.01" class="w-full p-3 bg-white border rounded-lg outline-none" />
              </div>
            </div>

            <div class="space-y-4">
              <h3 class="text-lg font-black text-gray-900 mb-6">Résultat de la simulation</h3>

              <div class="flex justify-between items-center border-b border-gray-300 pb-2">
                <span class="text-sm text-gray-700">Montant total</span>
                <span class="font-bold text-gray-900">{{ formatPrice(montant) }} FCFA</span>
              </div>

              <div class="flex justify-between items-center border-b border-gray-300 pb-2">
                <span class="text-sm text-gray-700">Taux</span>
                <span class="font-bold text-gray-900">{{ taux }} %</span>
              </div>

              <div class="flex justify-between items-center border-b border-gray-300 pb-2">
                <span class="text-sm text-gray-700">Intérêt</span>
                <span class="font-bold text-gray-900">{{ formatPrice(calculs.interet) }} FCFA</span>
              </div>

              <div class="flex justify-between items-center pt-2">
                <span class="font-black text-gray-900 uppercase">Total</span>
                <span class="font-black text-gray-900">{{ formatPrice(calculs.total) }} FCFA</span>
              </div>
            </div>
          </div>

          <p class="text-[11px] text-gray-500 mt-10 leading-snug italic">
            NB: Cette simulation est à titre indicatif et ne tient pas compte de l’assurance. Pour plus d’informations nous vous invitons à vous rapprocher de votre gestionnaire en agence.
          </p>
        </div>

      </div>
    </section>
  </main>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';

// Données réactives
const montant = ref<number>(0);
const dureeMois = ref<number>(0);
const taux = ref<number>(4); // Taux par défaut à 4% selon la maquette

// Logique de calcul du DAT
const calculs = computed(() => {
  if (!montant.value || !dureeMois.value) {
    return { interet: 0, total: 0 };
  }

  // Formule d'intérêt simple : Montant * Taux * (Temps en mois / 12)
  const interetGenere = montant.value * (taux.value / 100) * (dureeMois.value / 12);
  const montantFinal = montant.value + interetGenere;

  return {
    interet: Math.round(interetGenere),
    total: Math.round(montantFinal)
  };
});

// Utilitaire de formatage
const formatPrice = (value: number) => {
  return new Intl.NumberFormat('fr-FR', { minimumFractionDigits: 2 }).format(value);
};
</script>
