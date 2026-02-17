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
          <img
            src="../../assets/images/simulateurs/Design_sans_titre_2_-removebg-preview.png"
            alt="Simulation DAT"
            class="max-w-2xl w-full h-auto"
            />

        </div>


        <div class="lg:w-1/2 bg-gray-50 p-10 rounded-3xl shadow-sm border border-gray-100">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <div class="space-y-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Montant du crédit</label>
                <div class="relative">
                  <input v-model="montant" type="number" class="w-full p-3 bg-white border rounded-lg outline-none focus:border-[#D10000]" />
                  <span class="absolute right-3 top-3 text-gray-400">FCFA</span>
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Durée en année</label>
                <input v-model="duree" type="number" class="w-full p-3 bg-white border rounded-lg outline-none" />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Taux annuel (%)</label>
                <input v-model="taux" type="number" step="0.01" class="w-full p-3 bg-white border rounded-lg outline-none" />
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
            <button
              @click="afficherTableau = true"
              class="flex-1 bg-primary text-white py-3 px-1 rounded-lg font-bold text-sm uppercase hover:bg-red-700 transition"
            >
              Voir le tableau d'amortissement
            </button>
            <button
              @click="imprimerTableau"
              class="flex-1 bg-primary text-white py-3 rounded-lg font-bold text-sm uppercase hover:bg-red-700 transition"
            >
              Imprimer le tableau d'amortissement
            </button>
          </div>
        </div>

      </div>
    </section>

    <!-- Modal Tableau d'amortissement -->
    <div v-if="afficherTableau" class="fixed inset-0 bg-black/50 bg-opacity-50 z-50 flex items-center justify-center p-4">
      <div class="bg-white rounded-lg max-w-7xl w-full max-h-[90vh] overflow-hidden">
        <div class="p-6 border-b flex justify-between items-center">
          <h2 class="text-2xl font-bold">Tableau d'amortissement</h2>
          <button @click="afficherTableau = false" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>

        <div class="p-6 overflow-auto max-h-[calc(90vh-180px)]" id="tableau-impression">
          <div class="mb-6 grid grid-cols-3 gap-4 text-sm print:grid-cols-3">
            <div><strong>Montant du crédit:</strong> {{ montant.toLocaleString() }} FCFA</div>
            <div><strong>Durée:</strong> {{ duree }} an(s) ({{ duree * 12 }} mois)</div>
            <div><strong>Taux annuel:</strong> {{ taux }}%</div>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full border-collapse text-sm">
              <thead>
                <tr class="bg-[#D10000] text-white">
                  <th class="border border-gray-300 p-2">Période</th>
                  <th class="border border-gray-300 p-2">Capital restant dû</th>
                  <th class="border border-gray-300 p-2">Intérêt</th>
                  <th class="border border-gray-300 p-2">TAF (10%)</th>
                  <th class="border border-gray-300 p-2">Capital</th>
                  <th class="border border-gray-300 p-2">Échéance</th>
                  <th class="border border-gray-300 p-2">Capital amorti</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="ligne in tableauAmortissement" :key="ligne.periode" class="hover:bg-gray-50">
                  <td class="border border-gray-300 p-2 text-center">{{ ligne.periode }}</td>
                  <td class="border border-gray-300 p-2 text-right">{{ ligne.capitalRestant.toLocaleString() }}</td>
                  <td class="border border-gray-300 p-2 text-right">{{ ligne.interet.toLocaleString() }}</td>
                  <td class="border border-gray-300 p-2 text-right">{{ ligne.taf.toLocaleString() }}</td>
                  <td class="border border-gray-300 p-2 text-right font-semibold text-green-700">{{ ligne.capital.toLocaleString() }}</td>
                  <td class="border border-gray-300 p-2 text-right font-bold">{{ ligne.echeance.toLocaleString() }}</td>
                  <td class="border border-gray-300 p-2 text-right">{{ ligne.capitalAmorti.toLocaleString() }}</td>
                </tr>
                <tr class="bg-gray-100 font-bold">
                  <td colspan="2" class="border border-gray-300 p-2 text-right">TOTAL</td>
                  <td class="border border-gray-300 p-2 text-right">{{ totaux.interets.toLocaleString() }}</td>
                  <td class="border border-gray-300 p-2 text-right">{{ totaux.taf.toLocaleString() }}</td>
                  <td class="border border-gray-300 p-2 text-right">{{ totaux.capital.toLocaleString() }}</td>
                  <td class="border border-gray-300 p-2 text-right">{{ totaux.total.toLocaleString() }}</td>
                  <td class="border border-gray-300 p-2"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="p-6 border-t flex justify-end gap-4">
          <button
            @click="afficherTableau = false"
            class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50"
          >
            Fermer
          </button>
          <button
            @click="imprimerTableau"
            class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-red-700"
          >
            Imprimer
          </button>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup>
import { ref, computed, nextTick } from 'vue';

const montant = ref(0);
const duree = ref(0);
const taux = ref(14);
const afficherTableau = ref(false);

const resultats = computed(() => {
  if (!montant.value || !duree.value) return { echeance: 0, total: 0 };
  const n = duree.value * 12;
  const r = (taux.value / 100) / 12;
    const ech = montant.value * (r / (1 - Math.pow(1 + r, -n)));
  console.log("Echéance mensuelle:", ech);
  return { echeance: Math.round(ech), total: Math.round(ech) * n };
});

const tableauAmortissement = computed(() => {
  if (!montant.value || !duree.value || !taux.value) return [];

  const tableau = [];
  const nombreMois = duree.value * 12;
  const tauxMensuel = (taux.value / 100) / 12;
  let capitalRestant = montant.value;
  let capitalAmorti = 0;

  // Calcul de l'échéance mensuelle
  const echeanceMensuelle = montant.value * (tauxMensuel / (1 - Math.pow(1 + tauxMensuel, -nombreMois)));

  for (let i = 1; i <= nombreMois; i++) {
    // Calcul de l'intérêt sur le capital restant (dégressif)
    const interet = capitalRestant * tauxMensuel;

    // Calcul de la TAF (10% de l'intérêt)
    const taf = interet * 0.10;

    // Calcul du capital amorti (progressif)
    const capital = echeanceMensuelle - interet - taf;

    // Mise à jour du capital amorti cumulé
    capitalAmorti += capital;

    // Échéance totale
    const echeance = capital + interet + taf;

    tableau.push({
      periode: i,
      capitalRestant: Math.round(capitalRestant),
      interet: Math.round(interet),
      taf: Math.round(taf),
      capital: Math.round(capital),
      echeance: Math.round(echeance),
      capitalAmorti: Math.round(capitalAmorti)
    });

    // Mise à jour du capital restant pour le prochain mois
    capitalRestant -= capital;

    // Ajustement pour éviter les valeurs négatives dues aux arrondis
    if (capitalRestant < 0) capitalRestant = 0;
  }

  return tableau;
});

const totaux = computed(() => {
  if (tableauAmortissement.value.length === 0) {
    return { interets: 0, taf: 0, capital: 0, total: 0 };
  }

  return tableauAmortissement.value.reduce((acc, ligne) => ({
    interets: acc.interets + ligne.interet,
    taf: acc.taf + ligne.taf,
    capital: acc.capital + ligne.capital,
    total: acc.total + ligne.echeance
  }), { interets: 0, taf: 0, capital: 0, total: 0 });
});

const imprimerTableau = async () => {
  afficherTableau.value = true;
  await nextTick();
  window.print();
};
</script>

<style>
@media print {
  body * {
    visibility: hidden;
  }

  #tableau-impression,
  #tableau-impression * {
    visibility: visible;
  }

  #tableau-impression {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    max-height: none !important;
    overflow: visible !important;
  }

  .fixed {
    position: absolute !important;
    background: transparent !important;
    inset: 0;
  }

  .fixed > div {
    max-height: none !important;
    overflow: visible !important;
    box-shadow: none !important;
  }

  button {
    display: none !important;
  }

  .border-t, .border-b {
    border-color: #d1d5db !important;
  }
}
</style>
