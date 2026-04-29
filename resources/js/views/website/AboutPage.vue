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
  { year: '2021', text: 'Démarrage des activités' },
  { year: '2022', text: 'Extension du réseau' },
  { year: '2023', text: 'Obtention de la certification RSE Groupe' },
  { year: '2024', text: 'Consolidation de la position sur le marché' },
  { year: '2025', text: 'Croissance' },
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
      <div class="h-75 md:h-112.5 overflow-hidden">
        <img
          src="../../assets/images/about_images/Gemini_Generated_Image_21h5qu21h5qu21h5.png"
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
          <div class="h-px bg-gray-300 w-12"></div>
          <EyeIcon class="w-5 h-5 mx-3 text-primary" />
          <div class="h-px bg-gray-300 w-12"></div>
        </div>
        <p class="italic text-gray-600 font-medium px-4">"Être le modèle panafricain de la finance inclusive"</p>
      </div>

      <div class="text-center group">
        <div class="w-56 h-56 mx-auto rounded-full overflow-hidden border-8 border-gray-100 mb-8 shadow-inner transition-transform group-hover:scale-105 duration-500">
          <img src="../../assets/images/about_images/business-hands-joined-together-teamwork.jpg" class="w-full h-full object-cover" alt="Mission" />
        </div>
        <h2 class="text-2xl font-bold uppercase tracking-tighter">Notre <span class="text-primary">Mission</span></h2>
        <div class="flex items-center justify-center my-4">
          <div class="h-px bg-gray-300 w-12"></div>
          <TargetIcon class="w-5 h-5 mx-3 text-primary" />
          <div class="h-px bg-gray-300 w-12"></div>
        </div>
        <p class="italic text-gray-600 font-medium px-4">"Créer de la valeur ajoutée pour nos partenaires et participer durablement au développement du continent africain"</p>
      </div>
    </section>

    <section class="bg-white py-8 px-6">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold uppercase">Nos <span class="text-primary">Valeurs</span></h2>
          <div class="flex items-center justify-center mt-2">
             <div class="h-px bg-gray-300 w-12"></div>
             <StarIcon class="w-5 h-5 mx-3 text-primary" />
             <div class="h-px bg-gray-300 w-12"></div>
          </div>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div class="space-y-10">
            <h3 class="font-bold text-gray-400 uppercase tracking-widest text-sm">Valeurs du Groupe Cofina : 2R - 2S - 2I</h3>
            <div v-for="val in values" :key="val.code" class="flex items-center gap-8 group">
              <span class="text-4xl font-black text-primary w-16 opacity-80 group-hover:opacity-100 transition-opacity">{{ val.code }}</span>
              <div class="h-10 w-0.5 bg-gray-200 group-hover:bg-primary transition-colors"></div>
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
             <div class="h-px bg-gray-300 w-12"></div>
             <StarIcon class="w-5 h-5 mx-3 text-primary" />
             <div class="h-px bg-gray-300 w-12"></div>
          </div>
        </div>

        <div class="relative mt-10">
          <div class="absolute top-1/2 left-0 w-full h-0.75 bg-gray-300 -translate-y-1/2">
            <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1 w-4 h-4 bg-primary rotate-45 border-b-4 border-l-4 border-gray-100"></div>
            <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1 w-4 h-4 bg-primary rotate-45 border-t-4 border-r-4 border-gray-100"></div>
          </div>

          <div class="relative flex justify-between items-center min-h-87.5">
            <div v-for="(event, index) in timelineEvents" :key="index" class="relative flex flex-col items-center flex-1 group">

              <div class="absolute w-44 p-4 bg-white rounded-xl shadow-md border border-gray-100 transition-all duration-700 transform"
                :class="[
                  index % 2 === 0 ? 'bottom-15 group-hover:-translate-y-2' : 'top-15 group-hover:translate-y-2',
                  showTimeline ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'
                ]"
                :style="{ transitionDelay: (index * 200) + 'ms' }">
                <p class="text-[11px] font-medium text-gray-700 leading-tight">{{ event.text }}</p>
                <div class="absolute left-1/2 -translate-x-1/2 w-0.5 bg-primary transition-all duration-1000"
                  :class="[index % 2 === 0 ? 'top-full h-10' : 'bottom-full h-10', showTimeline ? 'scale-y-100' : 'scale-y-0']"
                  :style="{ transformOrigin: index % 2 === 0 ? 'top' : 'bottom', transitionDelay: (index * 200 + 300) + 'ms' }">
                </div>
              </div>

              <div class="w-5 h-5 rounded-full bg-white border-4 border-primary z-20 shadow transition-transform duration-500 group-hover:scale-150"
                   :class="showTimeline ? 'scale-100' : 'scale-0'"
                   :style="{ transitionDelay: (index * 200 + 100) + 'ms' }"></div>

              <div class="absolute font-black text-xl text-gray-300 group-hover:text-primary transition-colors duration-300"
                   :class="index % 2 === 0 ? 'top-10' : 'bottom-10'">
                {{ event.year }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="bg-primary py-4 text-center text-white font-bold text-xl uppercase tracking-widest shadow-lg">
      Notre Engagement RSE
    </div>

    <!-- Section Citation -->
    <section class="bg-linear-to-r from-primary/10 to-transparent py-10 px-6">
      <div class="max-w-4xl mx-auto text-center">
        <p class="text-2xl md:text-3xl font-bold text-primary italic">
          « Nous sommes la mésofinance innovante et responsable »
        </p>
      </div>
    </section>

    <!-- Section Présentation RSE -->
    <section class="max-w-6xl mx-auto py-10 px-6 grid md:grid-cols-2 gap-12 items-center">
      <div class="rounded-lg overflow-hidden shadow-2xl transition-transform hover:-rotate-1">
        <img src="../../assets/images/about_images/interviewer-holding-meeting-with-job-candidate-doing-greeting-handshake-closeup.jpg" alt="Engagement RSE" />
      </div>
      <div class="text-sm text-gray-600 leading-relaxed text-justify space-y-4">
        <p class="font-semibold text-gray-800">
          La démarche RSE du Groupe Cofina s'inscrit dans une optique volontariste qui vise à répondre aux exigences environnementales, sociales (E&S) et de bonne gouvernance vis-à-vis de nos clients, nos partenaires, nos actionnaires, nos collaborateurs et toutes nos parties prenantes.
        </p>
        <p>
          Afin de concrétiser sa mission et les engagements d'impact intrinsèque à son cœur de métier, le Groupe COFINA a adopté une Politique de gestion E&S formalisant son intention d'avoir un impact positif interne et externe et spécifiant ses engagements clés.
        </p>
     
      </div>
    </section>

    <!-- Section Engagements clés -->
    <section class="max-w-6xl mx-auto py-12 px-6">
      <h3 class="text-center text-2xl font-bold mb-12 uppercase">Nos <span class="text-primary">Engagements Clés</span></h3>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="group border-l-4 border-primary pl-6 py-4 hover:bg-gray-50 transition-colors rounded-r-lg">
          <div class="flex items-start gap-4">
            <CheckCircleIcon class="w-6 h-6 text-primary shrink-0 mt-1 group-hover:scale-110 transition-transform" />
            <p class="text-sm text-gray-700 leading-snug font-medium">
              Respecter, protéger et défendre la dignité des individus en positionnant les Droits de l'Homme et la lutte contre les inégalités au cœur de la politique RSE.
            </p>
          </div>
        </div>
        <div class="group border-l-4 border-primary pl-6 py-4 hover:bg-gray-50 transition-colors rounded-r-lg">
          <div class="flex items-start gap-4">
            <CheckCircleIcon class="w-6 h-6 text-primary shrink-0 mt-1 group-hover:scale-110 transition-transform" />
            <p class="text-sm text-gray-700 leading-snug font-medium">
              Agir contre tous les facteurs d'isolement sociétal et familial consécutifs à la discrimination et la stigmatisation.
            </p>
          </div>
        </div>
        <div class="group border-l-4 border-primary pl-6 py-4 hover:bg-gray-50 transition-colors rounded-r-lg">
          <div class="flex items-start gap-4">
            <CheckCircleIcon class="w-6 h-6 text-primary shrink-0 mt-1 group-hover:scale-110 transition-transform" />
            <p class="text-sm text-gray-700 leading-snug font-medium">
              Participer à la préservation des patrimoines environnementaux et culturels locaux.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Performance Globale -->
    <section class="max-w-6xl mx-auto py-12 px-6 bg-gray-50 rounded-lg">
      <h3 class="text-2xl font-bold mb-8 uppercase text-center">Performance Globale <span class="text-primary">Interne et Externe</span></h3>
      <p class="text-sm text-gray-600 mb-8 text-center font-semibold">L'engagement RSE du Groupe COFINA se manifeste ainsi à travers une double perspective d'impact positif :</p>

      <div class="grid md:grid-cols-2 gap-12">
        <div class="space-y-4">
          <h4 class="text-lg font-bold text-primary flex items-center gap-2">
            <span class="inline-block w-3 h-3 bg-primary rounded-full"></span> En Interne
          </h4>
          <p class="text-sm text-gray-700 leading-relaxed">
            Une organisation respectueuse et inclusive, ancrée dans l'égalité des genres, la formation continue, l'emploi de qualité, la préservation de l'environnement, une offre de produits et services qui assurent notre performance sociale.
          </p>
        </div>

        <div class="space-y-4">
          <h4 class="text-lg font-bold text-primary flex items-center gap-2">
            <span class="inline-block w-3 h-3 bg-primary rounded-full"></span> En Externe
          </h4>
          <p class="text-sm text-gray-700 leading-relaxed">
            La culture de relations fondées sur l'inclusivité, la protection des clients, l'évaluation de l'impact environnemental et social, la sensibilisation, la coopération avec nos clients, fournisseurs et autres parties prenantes et l'engagement pour le développement local.
          </p>
        </div>
      </div>
    </section>

    <!-- Section 5 Engagements de la Politique E&S -->
    <section class="max-w-6xl mx-auto py-12 px-6">
      <h3 class="text-2xl font-bold mb-8 uppercase text-center">Politique de Gestion <span class="text-primary">E&S</span></h3>
      <p class="text-sm text-gray-600 mb-12 text-center">La politique de gestion E&S du Groupe COFINA comprend 5 engagements clés :</p>

      <div class="space-y-6">
        <div class="border-l-4 border-primary pl-6 py-4 hover:bg-gray-50 transition-colors rounded-r-lg">
          <h4 class="font-bold text-gray-800 mb-2">1. Conditions de Travail</h4>
          <p class="text-sm text-gray-700">Améliorer continuellement les conditions de travail de nos collaborateurs, en optimisant leur environnement professionnel et en favorisant leur épanouissement global.</p>
        </div>

        <div class="border-l-4 border-primary pl-6 py-4 hover:bg-gray-50 transition-colors rounded-r-lg">
          <h4 class="font-bold text-gray-800 mb-2">2. Représentation des Femmes</h4>
          <p class="text-sm text-gray-700">Accroître la représentation des femmes au sein des instances de direction et des portefeuilles de nos entités financières, tout en contribuant à leur autonomisation.</p>
        </div>

        <div class="border-l-4 border-primary pl-6 py-4 hover:bg-gray-50 transition-colors rounded-r-lg">
          <h4 class="font-bold text-gray-800 mb-2">3. Inclusion Financière et Sociale</h4>
          <p class="text-sm text-gray-700">Promouvoir l'inclusion financière et sociale au sein des communautés desservies par les entités du Groupe COFINA.</p>
        </div>

        <div class="border-l-4 border-primary pl-6 py-4 hover:bg-gray-50 transition-colors rounded-r-lg">
          <h4 class="font-bold text-gray-800 mb-2">4. Résilience et Gestion des Risques</h4>
          <p class="text-sm text-gray-700">Renforcer la résilience de nos clients face aux défis économiques et au changement climatique, tout en améliorant notre capacité à comprendre, surveiller et gérer les risques environnementaux et sociaux au sein de nos opérations.</p>
        </div>

        <div class="border-l-4 border-primary pl-6 py-4 hover:bg-gray-50 transition-colors rounded-r-lg">
          <h4 class="font-bold text-gray-800 mb-2">5. Responsabilités Sociétales</h4>
          <p class="text-sm text-gray-700">Encourager nos clients à assumer leurs responsabilités sociétales envers leurs parties prenantes et participer au développement local.</p>
        </div>
      </div>
    </section>

    <!-- Section 5 Thématiques d'Impact -->
    <section class="max-w-6xl mx-auto py-12 px-6 bg-gray-50 rounded-lg">
      <h3 class="text-2xl font-bold mb-8 uppercase text-center">Nos 5 Thématiques <span class="text-primary">d'Impact</span></h3>
      <p class="text-sm text-gray-600 mb-12 text-center">Notre démarche RSE s'articule autour de 3 axes : Économique, Social et Environnemental</p>

      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-primary">
          <h4 class="font-bold text-lg text-primary mb-2">Emplois et Conditions de Travail</h4>
          <p class="text-sm text-gray-700 leading-relaxed">
            Le Groupe COFINA s'engage fermement à combattre le déficit d'emplois garantissant un minimum décent. Nous considérons la création d'emplois comme une thématique clé du développement durable, visant à créer des emplois de qualité avec un minimum décent, la productivité, le bien-être et l'attractivité.
          </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-primary">
          <h4 class="font-bold text-lg text-primary mb-2">Genre</h4>
          <p class="text-sm text-gray-700 leading-relaxed">
            Le Groupe COFINA reconnaît l'importance cruciale de l'égalité des genres. En accord avec notre ambition de devenir le modèle panafricain de la finance inclusive, nous nous engageons à jouer un rôle actif dans la promotion de l'émancipation des femmes et de l'égalité des chances.
          </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-primary">
          <h4 class="font-bold text-lg text-primary mb-2">Changement Climatique</h4>
          <p class="text-sm text-gray-700 leading-relaxed">
            Le changement climatique et ses risques pour les activités entrepreneuriales africaines sont des réalités incontournables. Le Groupe Cofina s'engage à renforcer la résilience de ses clients face à ces défis.
          </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-primary">
          <h4 class="font-bold text-lg text-primary mb-2">Inclusion Financière</h4>
          <p class="text-sm text-gray-700 leading-relaxed">
            L'accès difficile au financement pour de nombreux entrepreneurs est la raison de la création de COFINA. Notre ambition est de promouvoir l'inclusion financière sur le continent africain chaque jour davantage.
          </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-primary md:col-span-2">
          <h4 class="font-bold text-lg text-primary mb-2">Engagement Sociétal</h4>
          <p class="text-sm text-gray-700 leading-relaxed">
            La responsabilité sociétale et la gestion de la performance globale sont cruciales pour passer de « ne pas nuire » à « faire du bien ». Chez COFINA, cet engagement se concrétise quotidiennement par notre proximité avec nos collaborateurs, clients, parties prenantes et communautés locales.
          </p>
        </div>
      </div>
    </section>
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
