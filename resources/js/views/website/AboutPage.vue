<script setup>
import { ref, onMounted } from 'vue';
import {
  EyeIcon, TargetIcon, StarIcon, CheckCircleIcon, BriefcaseIcon, ShapesIcon
} from 'lucide-vue-next';
import cofina_logo from '../../assets/cofina_petit_logo.png';
import PanAfricanMap from '@/components/about/PanAfricanMap.vue';

// Etats réactifs
const showTimeline = ref(false);

// Données
const pillars = [
  { title: 'Notre vision', icon: EyeIcon },
  { title: 'Notre mission', icon: BriefcaseIcon },
  { title: 'Nos symboles', icon: ShapesIcon },
  { title: 'Nos valeurs', icon: StarIcon },
];

const values = [
  { code: '2R', labels: 'Respect - Rigueur' },
  { code: '2S', labels: 'Service - Simplicité' },
  { code: '2I', labels: 'Innovation - Intégrité' },
];

const rseTasks = [
  "Respecter, protéger et défendre la dignité des individus en positionnant les Droits de l'Homme et la lutte contre les inégalités au cœur de la politique RSE.",
  "Agir contre tous les facteurs d'isolement sociétal et familial consécutifs à la discrimination et la stigmatisation.",
  "Participer à la préservation des patrimoines environnementaux et culturels locaux."
];

const timelineEvents = [
  { year: '2020', text: 'Démarrage des activités au Togo' },
  { year: '2021', text: 'Expansion du réseau d\'agences locales' },
  { year: '2022', text: 'Lancement des services digitaux innovants' },
  { year: '2023', text: 'Obtention de la certification RSE Groupe' },
];

// const countries = [
//   { name: 'France', date: '2018', code: 'fr', top: '2%', left: '48%' },
//   { name: 'Sénégal', date: '2014', code: 'sn', top: '35%', left: '12%' },
//   { name: 'Mali', date: '2018', code: 'ml', top: '30%', left: '28%' },
//   { name: 'Guinée', date: '2018', code: 'gn', top: '45%', left: '18%' },
//   { name: 'Côte d\'ivoire', date: '2018', code: 'ci', top: '55%', left: '24%' },
//   { name: 'Burkina-Faso', date: '2018', code: 'bf', top: '44%', left: '33%' },
//   { name: 'Togo', date: 'Mars 2020', code: 'tg', top: '55%', left: '38%' },
//   { name: 'Gabon', date: '2018', code: 'ga', top: '65%', left: '58%' },
//   { name: 'Congo', date: '2018', code: 'cg', top: '75%', left: '62%' },
// ];

onMounted(() => {
  setTimeout(() => { showTimeline.value = true; }, 400);
});
</script>

<template>
  <div class="bg-gray-50 font-sans text-gray-800 pb-10 overflow-x-hidden">

    <section class="relative">
      <div class="h-[300px] md:h-[450px] overflow-hidden">
        <img
          src="../../assets/images/about_images/cofina_building.jpg"
          alt="Cofina Building"
          class="w-full h-full object-cover"
        />
      </div>
      <div class="absolute -bottom-12 left-1/2 -translate-x-1/2">
        <div class="bg-white p-4 rounded-full shadow-xl border-4 border-white">
          <div class="w-30 h-30 md:w-24 md:h-24 rounded-full border-4 border-primary flex items-center justify-center">
            <img :src="cofina_logo" alt="Petit logo de confina TOGO" width="60">
          </div>
        </div>
      </div>
    </section>

    <section class="pt-24 px-6 max-w-6xl mx-auto text-center">
      <p class="text-lg md:text-xl font-medium max-w-3xl mx-auto mb-12 animate-fade-in">
        Notre Culture d'entreprise Cofina repose sur 4 composantes principales, définies comme les 4 piliers de notre ADN :
      </p>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4">
        <div v-for="pillar in pillars" :key="pillar.title"
             class="bg-primary text-white p-6 rounded-sm flex flex-col items-center justify-center transition-all hover:scale-105 hover:bg-red-700 cursor-default shadow-md">
          <component :is="pillar.icon" class="w-8 h-8 mb-3" />
          <span class="text-sm font-bold uppercase tracking-wider">{{ pillar.title }}</span>
        </div>
      </div>
    </section>

    <section class="py-15 px-6 max-w-6xl mx-auto grid md:grid-cols-2 gap-16">
      <div class="text-center group">
        <div class="w-56 h-56 mx-auto rounded-full overflow-hidden border-8 border-gray-100 mb-8 shadow-inner transition-transform group-hover:scale-105 duration-500">
          <img src="../../assets/images/about_images/african-american-business-woman-holding-laptop-standing-by-window.jpg" class="w-full h-full object-cover" alt="Vision" />
        </div>
        <h2 class="text-2xl font-bold uppercase tracking-tighter">Notre <span class="text-primary">Vision</span></h2>
        <div class="flex items-center justify-center my-4">
          <div class="h-[1px] bg-gray-300 w-12"></div>
          <EyeIcon class="w-5 h-5 mx-3 text-primary" />
          <div class="h-[1px] bg-gray-300 w-12"></div>
        </div>
        <p class="italic text-gray-600 font-medium px-4">"Être le modèle panafricain de la finance inclusive"</p>
      </div>

      <div class="text-center group">
        <div class="w-56 h-56 mx-auto rounded-full overflow-hidden border-8 border-gray-100 mb-8 shadow-inner transition-transform group-hover:scale-105 duration-500">
          <img src="../../assets/images/about_images/business-hands-joined-together-teamwork.jpg" class="w-full h-full object-cover" alt="Mission" />
        </div>
        <h2 class="text-2xl font-bold uppercase tracking-tighter">Notre <span class="text-primary">Mission</span></h2>
        <div class="flex items-center justify-center my-4">
          <div class="h-[1px] bg-gray-300 w-12"></div>
          <TargetIcon class="w-5 h-5 mx-3 text-primary" />
          <div class="h-[1px] bg-gray-300 w-12"></div>
        </div>
        <p class="italic text-gray-600 font-medium px-4">"Créer de la valeur ajoutée pour nos partenaires et participer durablement au développement du continent africain"</p>
      </div>
    </section>

    <section class="bg-white py-8 px-6">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold uppercase">Nos <span class="text-primary">Valeurs</span></h2>
          <div class="flex items-center justify-center mt-2">
             <div class="h-[1px] bg-gray-300 w-12"></div>
             <StarIcon class="w-5 h-5 mx-3 text-primary" />
             <div class="h-[1px] bg-gray-300 w-12"></div>
          </div>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div class="space-y-10">
            <h3 class="font-bold text-gray-400 uppercase tracking-widest text-sm">Valeurs du Groupe Cofina : 2R - 2S - 2I</h3>
            <div v-for="val in values" :key="val.code" class="flex items-center gap-8 group">
              <span class="text-4xl font-black text-primary w-16 opacity-80 group-hover:opacity-100 transition-opacity">{{ val.code }}</span>
              <div class="h-10 w-[2px] bg-gray-200 group-hover:bg-primary transition-colors"></div>
              <span class="text-xl font-bold text-gray-700">{{ val.labels }}</span>
            </div>
          </div>
          <div class="relative">
            <div class="rounded-xl overflow-hidden shadow-2xl rotate-2 hover:rotate-0 transition-transform duration-700">
              <img src="../../assets/images/about_images/successful-happy-business-team.jpg" alt="Equipe" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-10 px-6 bg-gray-100 overflow-hidden">
      <div class="max-w-6xl mx-auto text-center">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold uppercase">Notre <span class="text-primary">Histoire</span></h2>
          <div class="flex items-center justify-center mt-2">
             <div class="h-[1px] bg-gray-300 w-12"></div>
             <StarIcon class="w-5 h-5 mx-3 text-primary" />
             <div class="h-[1px] bg-gray-300 w-12"></div>
          </div>
        </div>

        <div class="relative mt-10">
          <div class="absolute top-1/2 left-0 w-full h-[3px] bg-gray-300 -translate-y-1/2">
            <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1 w-4 h-4 bg-primary rotate-45 border-b-4 border-l-4 border-gray-100"></div>
            <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1 w-4 h-4 bg-primary rotate-45 border-t-4 border-r-4 border-gray-100"></div>
          </div>

          <div class="relative flex justify-between items-center min-h-[350px]">
            <div v-for="(event, index) in timelineEvents" :key="index" class="relative flex flex-col items-center flex-1 group">

              <div class="absolute w-44 p-4 bg-white rounded-xl shadow-md border border-gray-100 transition-all duration-700 transform"
                :class="[
                  index % 2 === 0 ? 'bottom-[60px] group-hover:-translate-y-2' : 'top-[60px] group-hover:translate-y-2',
                  showTimeline ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'
                ]"
                :style="{ transitionDelay: (index * 200) + 'ms' }">
                <p class="text-[11px] font-medium text-gray-700 leading-tight">{{ event.text }}</p>
                <div class="absolute left-1/2 -translate-x-1/2 w-[2px] bg-primary transition-all duration-1000"
                  :class="[index % 2 === 0 ? 'top-full h-10' : 'bottom-full h-10', showTimeline ? 'scale-y-100' : 'scale-y-0']"
                  :style="{ transformOrigin: index % 2 === 0 ? 'top' : 'bottom', transitionDelay: (index * 200 + 300) + 'ms' }">
                </div>
              </div>

              <div class="w-5 h-5 rounded-full bg-white border-4 border-primary z-20 shadow transition-transform duration-500 group-hover:scale-150"
                   :class="showTimeline ? 'scale-100' : 'scale-0'"
                   :style="{ transitionDelay: (index * 200 + 100) + 'ms' }"></div>

              <div class="absolute font-black text-xl text-gray-300 group-hover:text-primary transition-colors duration-300"
                   :class="index % 2 === 0 ? 'top-[40px]' : 'bottom-[40px]'">
                {{ event.year }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="bg-primary py-4 text-center text-white font-bold text-xl uppercase tracking-widest shadow-lg">
      Notre Engagement
    </div>

    <section class="max-w-6xl mx-auto py-10 px-6 grid md:grid-cols-2 gap-12 items-center">
      <div class="rounded-lg overflow-hidden shadow-2xl transition-transform hover:-rotate-1">
        <img src="../../assets/images/about_images/interviewer-holding-meeting-with-job-candidate-doing-greeting-handshake-closeup.jpg" alt="Engagement" />
      </div>
      <div class="text-sm text-gray-600 leading-relaxed text-justify space-y-4">
        <p>Face aux réalités et aux besoins des pays africains, la création d'un réseau régional destiné à promouvoir et accompagner le développement économique semble tant opportun qu'approprié.</p>
        <p>COFINA Togo s'engage à créer, selon les standards internationaux, un modèle de finance inclusive offrant à sa clientèle, des micro-crédits, des produits de micro-assurance/bancassurance, des produits de m-banking et e-banking, des financements de logements sociaux ainsi que des financements structurés.</p>
      </div>
    </section>

    <section class="max-w-6xl mx-auto py-10 px-6">
      <h2 class="text-center text-2xl font-bold mb-16 uppercase">RSE <span class="text-gray-400 text-lg font-normal ml-2">(Responsabilité Sociétale des Entreprises)</span></h2>

      <div class="grid md:grid-cols-2 gap-16 mb-24 items-center">
        <div class="space-y-6">
          <h3 class="text-primary font-bold text-lg italic flex items-center gap-2">
            <span class="w-8 h-[2px] bg-primary"></span> Notre mission RSE
          </h3>
          <ul class="space-y-6">
            <li v-for="task in rseTasks" :key="task" class="flex gap-4 text-sm group">
              <CheckCircleIcon class="w-6 h-6 text-primary flex-shrink-0 group-hover:scale-110 transition-transform" />
              <span class="text-gray-700 leading-snug">{{ task }}</span>
            </li>
          </ul>
        </div>
        <div class="relative group">
            <img src="../../assets/images/about_images/black-manager-reviews-company-strategy-with-her-team-members.jpg" class="rounded-xl shadow-xl transition-all group-hover:brightness-110" alt="RSE" />
        </div>
      </div>

      <div class="grid md:grid-cols-2 gap-16 items-center">
        <img src="../../assets/images/about_images/people-office-work-day.jpg" class="rounded-xl shadow-xl order-2 md:order-1" alt="Inclusion" />
        <div class="order-1 md:order-2 space-y-6">
          <h2 class="text-3xl font-bold text-primary">Inclusion financière</h2>
          <p class="text-gray-600 leading-relaxed text-justify">
            Participer à la construction d'un environnement stable, juste et équitable pour tous, par une approche globale de lutte contre tous les facteurs de pauvreté, d'instabilité, d'inégalité en favorisant et promouvant l'accès à l'autonomie des populations (économiques, structurels, éducationnels, sanitaires).
          </p>
        </div>
      </div>
    </section>

    <section class="py-1 px-6 bg-white border-t border-gray-100">
      <div class="text-center mb-4">
        <h2 class="text-4xl font-black text-gray-900 uppercase tracking-tighter">
          Notre Empreinte <span class="text-primary">Panafricaine</span>
        </h2>
        <div class="w-24 h-1 bg-primary mx-auto mt-4"></div>
        <p class="text-gray-500 mt-6 max-w-2xl mx-auto">
          Présent dans 9 pays d'Afrique et en France, le Groupe COFINA accompagne l'émergence des entrepreneurs
          africains.
        </p>
      </div>
      <PanAfricanMap></PanAfricanMap>
    </section>

  </div>
</template>



<style scoped>
.animate-fade-in {
  animation: fadeIn 1s ease-out;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>
