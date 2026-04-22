<template>
  <main class="min-h-screen bg-gray-50">

    <!-- Hero -->
    <section class="relative h-70 flex items-center overflow-hidden">
      <div class="absolute inset-0">
        <img src="@/assets/images/hero_produits.jpg" class="w-full h-full object-cover" />
        <div class="absolute inset-0"></div>
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <p class="text-white/60 text-xs font-semibold uppercase tracking-widest mb-2">Crédit</p>
        <h1 class="text-4xl lg:text-5xl font-black text-white">Simulateur de prêt</h1>
        <p class="text-white/70 mt-2 text-base max-w-xl">
          Calculez votre échéance mensuelle et visualisez votre tableau d'amortissement.
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
                <h2 class="text-2xl font-black text-gray-900">Paramétrez votre crédit</h2>
                <p class="text-gray-400 text-sm mt-1">Bougez les curseurs pour simuler en temps réel</p>
              </div>

              <!-- Montant -->
              <div class="space-y-3">
                <div class="flex justify-between items-end">
                  <label class="text-xs font-bold text-gray-400 uppercase tracking-widest">Montant du crédit</label>
                  <div class="text-right">
                    <span class="text-3xl font-black text-gray-900">{{ formatCompact(montant) }}</span>
                    <span class="text-gray-400 text-sm ml-1">FCFA</span>
                  </div>
                </div>
                <input
                  type="range" v-model.number="montant"
                  :min="500000" :max="500000000" :step="500000"
                  :style="sliderStyle(montant, 500000, 500000000)"
                  class="slider w-full"
                />
                <div class="flex justify-between text-xs text-gray-300 font-medium">
                  <span>500 K</span><span>500 M</span>
                </div>
              </div>

              <!-- Durée -->
              <div class="space-y-3">
                <div class="flex justify-between items-end">
                  <label class="text-xs font-bold text-gray-400 uppercase tracking-widest">Durée de remboursement</label>
                  <div class="text-right">
                    <span class="text-3xl font-black text-gray-900">{{ duree }}</span>
                    <span class="text-gray-400 text-sm ml-1">{{ duree > 1 ? 'ans' : 'an' }}</span>
                  </div>
                </div>
                <input
                  type="range" v-model.number="duree"
                  :min="1" :max="10" :step="1"
                  :style="sliderStyle(duree, 1, 10)"
                  class="slider w-full"
                />
                <div class="flex justify-between text-xs text-gray-300 font-medium">
                  <span>1 an</span><span>10 ans</span>
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
                  :min="10" :max="24" :step="0.5"
                  :style="sliderStyle(taux, 10, 24)"
                  class="slider w-full"
                />
                <div class="flex justify-between text-xs text-gray-300 font-medium">
                  <span>10%</span><span>24%</span>
                </div>
              </div>

              <!-- CTA tableau -->
              <div class="flex gap-3 pt-2">
                <button
                  @click="afficherTableau = true"
                  class="flex-1 border-2 border-primary text-primary py-3 rounded-xl font-bold text-sm hover:bg-primary hover:text-white transition-all duration-200 cursor-pointer"
                >
                  Tableau d'amortissement
                </button>
                <button
                  @click="exporterPDF"
                  class="px-5 border-2 border-gray-200 text-gray-500 py-3 rounded-xl font-bold text-sm hover:bg-gray-50 transition-all duration-200 flex items-center gap-2 cursor-pointer"
                  title="Télécharger PDF"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                  </svg>
                  PDF
                </button>
              </div>
            </div>

            <!-- Results -->
            <div class="lg:col-span-2 bg-primary p-8 lg:p-12 flex flex-col justify-between">
              <div>
                <p class="text-white/50 text-xs font-bold uppercase tracking-widest mb-8">Résultats</p>

                <div class="space-y-6">
                  <div>
                    <p class="text-white/50 text-xs uppercase tracking-wide mb-1">Montant emprunté</p>
                    <p class="text-white text-xl font-black">{{ formatPrice(montant) }} <span class="text-white/50 text-sm font-normal">FCFA</span></p>
                  </div>

                  <div class="border-t border-white/15 pt-6">
                    <p class="text-white/50 text-xs uppercase tracking-wide mb-1">Durée</p>
                    <p class="text-white text-xl font-black">{{ duree }} {{ duree > 1 ? 'ans' : 'an' }} <span class="text-white/50 text-sm font-normal">({{ duree * 12 }} mois)</span></p>
                  </div>

                  <div class="border-t border-white/15 pt-6">
                    <p class="text-white/50 text-xs uppercase tracking-wide mb-1">Taux appliqué</p>
                    <p class="text-white text-xl font-black">{{ taux }}%</p>
                  </div>
                </div>

                <!-- Échéance -->
                <div class="mt-8 bg-white/10 backdrop-blur rounded-2xl p-6">
                  <p class="text-white/50 text-xs uppercase tracking-widest mb-1">Échéance mensuelle</p>
                  <p class="text-4xl font-black text-white leading-none">{{ formatPrice(resultats.echeance) }}</p>
                  <p class="text-white/50 text-sm mt-1">FCFA / mois</p>

                  <div class="border-t border-white/15 mt-5 pt-5">
                    <p class="text-white/40 text-xs uppercase tracking-wide mb-1">Coût total du crédit</p>
                    <p class="text-white text-2xl font-black">{{ formatPrice(resultats.total) }} <span class="text-white/50 text-sm font-normal">FCFA</span></p>
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

    <!-- Modal Tableau d'amortissement -->
    <div v-if="afficherTableau" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
      <div class="bg-white rounded-2xl max-w-7xl w-full max-h-[90vh] overflow-hidden shadow-2xl">
        <div class="p-6 border-b flex justify-between items-center">
          <h2 class="text-xl font-black text-gray-900">Tableau d'amortissement</h2>
          <button @click="afficherTableau = false" class="text-gray-400 hover:text-gray-700 transition-colors p-1">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <div class="p-6 overflow-auto max-h-[calc(90vh-160px)]" id="tableau-impression">
          <div class="mb-6 flex flex-wrap gap-4 text-sm">
            <div class="bg-gray-50 rounded-xl px-4 py-2"><strong>Montant :</strong> {{ formatPrice(montant) }} FCFA</div>
            <div class="bg-gray-50 rounded-xl px-4 py-2"><strong>Durée :</strong> {{ duree }} an(s) ({{ duree * 12 }} mois)</div>
            <div class="bg-gray-50 rounded-xl px-4 py-2"><strong>Taux :</strong> {{ taux }}%</div>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full border-collapse text-sm">
              <thead>
                <tr class="bg-primary text-white">
                  <th class="border border-gray-200 p-2 text-center">Période</th>
                  <th class="border border-gray-200 p-2 text-right">Capital restant dû</th>
                  <th class="border border-gray-200 p-2 text-right">Intérêt</th>
                  <th class="border border-gray-200 p-2 text-right">TAF (10%)</th>
                  <th class="border border-gray-200 p-2 text-right">Capital</th>
                  <th class="border border-gray-200 p-2 text-right">Échéance</th>
                  <th class="border border-gray-200 p-2 text-right">Capital amorti</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="ligne in tableauAmortissement" :key="ligne.periode" class="hover:bg-gray-50 even:bg-gray-50/50">
                  <td class="border border-gray-200 p-2 text-center font-medium">{{ ligne.periode }}</td>
                  <td class="border border-gray-200 p-2 text-right">{{ ligne.capitalRestant.toLocaleString() }}</td>
                  <td class="border border-gray-200 p-2 text-right">{{ ligne.interet.toLocaleString() }}</td>
                  <td class="border border-gray-200 p-2 text-right">{{ ligne.taf.toLocaleString() }}</td>
                  <td class="border border-gray-200 p-2 text-right font-semibold text-green-700">{{ ligne.capital.toLocaleString() }}</td>
                  <td class="border border-gray-200 p-2 text-right font-bold">{{ ligne.echeance.toLocaleString() }}</td>
                  <td class="border border-gray-200 p-2 text-right">{{ ligne.capitalAmorti.toLocaleString() }}</td>
                </tr>
                <tr class="bg-gray-100 font-bold">
                  <td colspan="2" class="border border-gray-200 p-2 text-right">TOTAL</td>
                  <td class="border border-gray-200 p-2 text-right">{{ totaux.interets.toLocaleString() }}</td>
                  <td class="border border-gray-200 p-2 text-right">{{ totaux.taf.toLocaleString() }}</td>
                  <td class="border border-gray-200 p-2 text-right">{{ totaux.capital.toLocaleString() }}</td>
                  <td class="border border-gray-200 p-2 text-right">{{ totaux.total.toLocaleString() }}</td>
                  <td class="border border-gray-200 p-2"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="p-4 border-t flex justify-end gap-3">
          <button @click="afficherTableau = false" class="px-5 py-2 border border-gray-200 rounded-xl text-sm hover:bg-gray-50 cursor-pointer">
            Fermer
          </button>
          <button @click="exporterPDF" class="px-5 py-2 bg-primary text-white rounded-xl text-sm hover:bg-red-700 transition-colors flex items-center gap-2 cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            Télécharger PDF
          </button>
        </div>
      </div>
    </div>

  </main>
</template>

<script setup>
import { ref, computed } from 'vue';
import jsPDF from 'jspdf';
import autoTable from 'jspdf-autotable';

const t = (str) => str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
const fmtPDF = (value) => String(new Intl.NumberFormat('fr-FR').format(value)).replace(/[\u00a0\u202f]/g, ' ');

const montant = ref(5000000);
const duree = ref(3);
const taux = ref(14);
const afficherTableau = ref(false);

const resultats = computed(() => {
  if (!montant.value || !duree.value) return { echeance: 0, total: 0 };
  const n = duree.value * 12;
  const r = (taux.value / 100) / 12;
  const ech = montant.value * (r / (1 - Math.pow(1 + r, -n)));
  return { echeance: Math.round(ech), total: Math.round(ech) * n };
});

const tableauAmortissement = computed(() => {
  if (!montant.value || !duree.value || !taux.value) return [];
  const tableau = [];
  const nombreMois = duree.value * 12;
  const tauxMensuel = (taux.value / 100) / 12;
  let capitalRestant = montant.value;
  let capitalAmorti = 0;
  const echeanceMensuelle = montant.value * (tauxMensuel / (1 - Math.pow(1 + tauxMensuel, -nombreMois)));

  for (let i = 1; i <= nombreMois; i++) {
    const interet = capitalRestant * tauxMensuel;
    const taf = interet * 0.10;
    const capital = echeanceMensuelle - interet - taf;
    capitalAmorti += capital;
    const echeance = capital + interet + taf;
    tableau.push({
      periode: i,
      capitalRestant: Math.round(capitalRestant),
      interet: Math.round(interet),
      taf: Math.round(taf),
      capital: Math.round(capital),
      echeance: Math.round(echeance),
      capitalAmorti: Math.round(capitalAmorti),
    });
    capitalRestant -= capital;
    if (capitalRestant < 0) capitalRestant = 0;
  }
  return tableau;
});

const totaux = computed(() => {
  if (!tableauAmortissement.value.length) return { interets: 0, taf: 0, capital: 0, total: 0 };
  return tableauAmortissement.value.reduce((acc, l) => ({
    interets: acc.interets + l.interet,
    taf: acc.taf + l.taf,
    capital: acc.capital + l.capital,
    total: acc.total + l.echeance,
  }), { interets: 0, taf: 0, capital: 0, total: 0 });
});

const sliderStyle = (value, min, max) => {
  const pct = ((value - min) / (max - min)) * 100;
  return `background: linear-gradient(to right, #D10000 ${pct}%, #e5e7eb ${pct}%)`;
};

const formatPrice = (value) => new Intl.NumberFormat('fr-FR').format(value);

const formatCompact = (value) => {
  if (value >= 1000000) return (value / 1000000).toLocaleString('fr-FR', { maximumFractionDigits: 1 }) + ' M';
  if (value >= 1000) return (value / 1000).toLocaleString('fr-FR', { maximumFractionDigits: 0 }) + ' K';
  return value.toLocaleString('fr-FR').replace(/[\u00a0\u202f]/g, ' ');
};

const exporterPDF = () => {
  const doc = new jsPDF({ orientation: 'portrait', unit: 'mm', format: 'a4' });

  // En-tete rouge
  doc.setFillColor(209, 0, 0);
  doc.rect(0, 0, 210, 22, 'F');
  doc.setTextColor(255, 255, 255);
  doc.setFontSize(15);
  doc.setFont('helvetica', 'bold');
  doc.text('COFINA TOGO', 14, 14);
  doc.setFontSize(10);
  doc.setFont('helvetica', 'normal');
  doc.text(t('Simulation de pret'), 196, 14, { align: 'right' });

  // Date de generation
  doc.setTextColor(120, 120, 120);
  doc.setFontSize(8.5);
/*   doc.text(t(`Generee le ${new Date().toLocaleDateString('fr-FR', { day: '2-digit', month: 'long', year: 'numeric' })}`), 14, 30); */

  // Titre section
  doc.setTextColor(30, 30, 30);
  doc.setFontSize(12);
  doc.setFont('helvetica', 'bold');
  doc.text(t('Parametres de la simulation'), 14, 40);

  // Parametres
  doc.setFont('helvetica', 'normal');
  doc.setFontSize(10);
  doc.setTextColor(60, 60, 60);
  doc.text(t('Montant du credit :'), 14, 50);
  doc.text(t('Duree :'), 14, 58);
  doc.text('Taux annuel :', 14, 66);
  doc.setFont('helvetica', 'bold');
  doc.setTextColor(30, 30, 30);
  doc.text(`${fmtPDF(montant.value)} FCFA`, 65, 50);
  doc.text(t(`${duree.value} an(s) - ${duree.value * 12} mois`), 65, 58);
  doc.text(`${taux.value}%`, 65, 66);

  // Encadre resultats
  doc.setFillColor(248, 248, 248);
  doc.roundedRect(14, 72, 182, 26, 3, 3, 'F');
  doc.setDrawColor(230, 230, 230);
  doc.roundedRect(14, 72, 182, 26, 3, 3, 'S');

  doc.setFont('helvetica', 'normal');
  doc.setFontSize(9);
  doc.setTextColor(120, 120, 120);
  doc.text(t('Echeance mensuelle'), 20, 81);
  doc.text(t('Cout total du credit'), 110, 81);

  doc.setFont('helvetica', 'bold');
  doc.setFontSize(13);
  doc.setTextColor(209, 0, 0);
  doc.text(`${fmtPDF(resultats.value.echeance)} FCFA`, 20, 91);
  doc.setTextColor(30, 30, 30);
  doc.text(`${fmtPDF(resultats.value.total)} FCFA`, 110, 91);

  // Tableau d'amortissement
  doc.setFont('helvetica', 'bold');
  doc.setFontSize(11);
  doc.setTextColor(30, 30, 30);
  doc.text(t("Tableau d'amortissement"), 14, 108);

  autoTable(doc, {
    startY: 112,
    head: [[t('Periode'), t('Capital restant du'), t('Interet'), 'TAF (10%)', 'Capital', t('Echeance'), 'Capital amorti']],
    body: tableauAmortissement.value.map(l => [
      l.periode,
      `${l.capitalRestant.toLocaleString('fr-FR').replace(/[\u00a0\u202f]/g, ' ')} F`,
      `${l.interet.toLocaleString('fr-FR').replace(/[\u00a0\u202f]/g, ' ')} F`,
      `${l.taf.toLocaleString('fr-FR').replace(/[\u00a0\u202f]/g, ' ')} F`,
      `${l.capital.toLocaleString('fr-FR').replace(/[\u00a0\u202f]/g, ' ')} F`,
      `${l.echeance.toLocaleString('fr-FR').replace(/[\u00a0\u202f]/g, ' ')} F`,
      `${l.capitalAmorti.toLocaleString('fr-FR').replace(/[\u00a0\u202f]/g, ' ')} F`,
    ]),
    foot: [['TOTAL', '',
      `${totaux.value.interets.toLocaleString('fr-FR').replace(/[\u00a0\u202f]/g, ' ')} F`,
      `${totaux.value.taf.toLocaleString('fr-FR').replace(/[\u00a0\u202f]/g, ' ')} F`,
      `${totaux.value.capital.toLocaleString('fr-FR').replace(/[\u00a0\u202f]/g, ' ')} F`,
      `${totaux.value.total.toLocaleString('fr-FR').replace(/[\u00a0\u202f]/g, ' ')} F`,
      '',
    ]],
    headStyles: { fillColor: [209, 0, 0], textColor: 255, fontStyle: 'bold', fontSize: 7.5, halign: 'right' },
    footStyles: { fillColor: [235, 235, 235], textColor: 30, fontStyle: 'bold', fontSize: 7.5, halign: 'right' },
    bodyStyles: { fontSize: 7.5, halign: 'right' },
    columnStyles: { 0: { halign: 'center' } },
    alternateRowStyles: { fillColor: [252, 252, 252] },
    margin: { left: 14, right: 14 },
    styles: { cellPadding: 2 },
  });

  // Pied de page sur chaque page
  const pageCount = doc.getNumberOfPages();
  for (let i = 1; i <= pageCount; i++) {
    doc.setPage(i);
    const pageH = doc.internal.pageSize.height;
    doc.setDrawColor(220, 220, 220);
    doc.line(14, pageH - 14, 196, pageH - 14);
    doc.setFontSize(7);
    doc.setTextColor(150);
    doc.setFont('helvetica', 'normal');
    doc.text("Simulation indicative, hors assurance. Rapprochez-vous de votre agence.", 14, pageH - 9);
    doc.text(`Page ${i} / ${pageCount}`, 196, pageH - 9, { align: 'right' });
  }

  doc.save(`simulation-pret-cofina-${new Date().toISOString().slice(0, 10)}.pdf`);
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

<style>
@media print {
  body * { visibility: hidden; }
  #tableau-impression, #tableau-impression * { visibility: visible; }
  #tableau-impression {
    position: absolute; left: 0; top: 0;
    width: 100%; max-height: none !important; overflow: visible !important;
  }
  .fixed { position: absolute !important; background: transparent !important; inset: 0; }
  .fixed > div { max-height: none !important; overflow: visible !important; box-shadow: none !important; }
  button { display: none !important; }
}
</style>
