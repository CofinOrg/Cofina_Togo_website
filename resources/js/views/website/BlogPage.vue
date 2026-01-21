<script setup>
import { computed } from 'vue'
import { Calendar, User, ArrowLeft, Share2 } from 'lucide-vue-next'
import heroImg1 from '@/assets/images/blog/close-up-colleagues-shaking-hands(1).jpg'
import heroImg2 from '@/assets/images/blog/people-office-work-day1.jpg'


// Prop ID reçue depuis la route
const props = defineProps({
  id: {
    type: [String, Number],
    required: true
  }
})

// Base de données des articles (à remplacer par une API plus tard)
const articlesData = [
  {
    id: 1,
    title: 'Comment Madame Kofi a développé son commerce de pagne',
    category: 'Success Story',
    date: '10 Janvier 2025',
    readTime: '4 min de lecture',
    heroImage: heroImg1,
    content: `
      <p>Madame Kofi, commerçante de pagne à Lomé, a vu son activité se transformer grâce au crédit PME COFINA.</p>

      <h2>Une histoire de persévérance</h2>
      <p>Avec un capital initial limité, Madame Kofi vendait ses pagnes sur un petit étalage au marché d'Adawlato. Grâce au financement COFINA, elle a pu agrandir considérablement son stock et ouvrir une nouvelle boutique.</p>

      <p>Les avantages dont elle a bénéficié :</p>
      <ul>
        <li>Un crédit PME adapté à son activité commerciale</li>
        <li>Un accompagnement personnalisé de nos conseillers</li>
        <li>Des conditions de remboursement flexibles</li>
        <li>Un suivi régulier de son activité</li>
      </ul>

      <h2>Des résultats concrets</h2>
      <p>Aujourd'hui, Madame Kofi emploie trois vendeuses et son chiffre d'affaires a triplé en deux ans. Elle témoigne : "COFINA a cru en mon projet quand d'autres institutions m'ont fermé leurs portes."</p>
    `,
    secondaryImage: heroImg2
  },
  {
    id: 2,
    title: 'COFINA TOGO AUX CÔTÉS DES ENTREPRENEURS',
    category: 'Événement',
    date: '15 Janvier 2025',
    readTime: '5 min de lecture',
    heroImage: heroImg1,
    content: `
      <p>Le 10 janvier 2025, COFINA Togo a organisé une journée de sensibilisation à Tsévié pour accompagner les entrepreneurs locaux dans le développement de leurs activités.</p>

      <h2>Un engagement pour les entrepreneurs</h2>
      <p>Cette initiative s'inscrit dans notre mission de soutien aux PME et aux entrepreneurs togolais. Nous avons rencontré plus de 150 entrepreneurs venus découvrir nos solutions de financement adaptées à leurs besoins.</p>

      <p>Lors de cette journée, nos experts ont présenté les différentes solutions de crédit disponibles, notamment :</p>
      <ul>
        <li>Le crédit PME avec des taux préférentiels</li>
        <li>Le crédit équipement pour moderniser les outils de production</li>
        <li>Le crédit fonds de roulement pour assurer la trésorerie</li>
        <li>Des accompagnements personnalisés tout au long du projet</li>
      </ul>

      <h2>Des témoignages encourageants</h2>
      <p>De nombreux entrepreneurs ont partagé leurs expériences positives avec COFINA. Madame Akossiwa, gérante d'un commerce de tissus, témoigne : "Grâce au crédit PME de COFINA, j'ai pu agrandir mon magasin et doubler mon chiffre d'affaires en un an."</p>

      <p>Monsieur Koffi, entrepreneur dans l'agroalimentaire, ajoute : "L'accompagnement de COFINA ne s'arrête pas au financement. Nos conseillers nous suivent régulièrement et nous aident à optimiser notre gestion."</p>
    `,
    secondaryImage: heroImg2
  },
  {
    id: 3,
    title: "L'histoire de Jean et son projet agricole",
    category: 'Success Story',
    date: '20 Janvier 2025',
    readTime: '6 min de lecture',
    heroImage: heroImg1,
    content: `
      <p>Jean, agriculteur dans la région des Plateaux, a transformé son exploitation grâce à l'accompagnement de COFINA.</p>

      <h2>Du rêve à la réalité</h2>
      <p>Avec un petit lopin de terre hérité de ses parents, Jean avait de grandes ambitions mais peu de moyens. Le crédit équipement COFINA lui a permis d'acquérir du matériel moderne et d'augmenter sa production.</p>

      <p>Son parcours avec COFINA :</p>
      <ul>
        <li>Financement pour l'achat d'un tracteur</li>
        <li>Crédit fonds de roulement pour les semences</li>
        <li>Formation en gestion agricole</li>
        <li>Accompagnement pour la commercialisation</li>
      </ul>

      <h2>Une réussite inspirante</h2>
      <p>Aujourd'hui, Jean cultive 15 hectares et approvisionne plusieurs marchés de la région. Il a créé 10 emplois permanents dans son village.</p>
    `,
    secondaryImage: heroImg2
  },
  {
    id: 4,
    title: "L'histoire de Jean et son projet agricole",
    category: 'Success Story',
    date: '20 Janvier 2025',
    readTime: '6 min de lecture',
    heroImage: heroImg1,
    content: `
      <p>Jean, agriculteur dans la région des Plateaux, a transformé son exploitation grâce à l'accompagnement de COFINA.</p>

      <h2>Du rêve à la réalité</h2>
      <p>Avec un petit lopin de terre hérité de ses parents, Jean avait de grandes ambitions mais peu de moyens. Le crédit équipement COFINA lui a permis d'acquérir du matériel moderne et d'augmenter sa production.</p>

      <p>Son parcours avec COFINA :</p>
      <ul>
        <li>Financement pour l'achat d'un tracteur</li>
        <li>Crédit fonds de roulement pour les semences</li>
        <li>Formation en gestion agricole</li>
        <li>Accompagnement pour la commercialisation</li>
      </ul>

      <h2>Une réussite inspirante</h2>
      <p>Aujourd'hui, Jean cultive 15 hectares et approvisionne plusieurs marchés de la région. Il a créé 10 emplois permanents dans son village.</p>
    `,
    secondaryImage: heroImg2
  },
  {
    id: 5,
    title: "L'histoire de Jean et son projet agricole",
    category: 'Success Story',
    date: '20 Janvier 2025',
    readTime: '6 min de lecture',
    heroImage: heroImg1,
    content: `
      <p>Jean, agriculteur dans la région des Plateaux, a transformé son exploitation grâce à l'accompagnement de COFINA.</p>

      <h2>Du rêve à la réalité</h2>
      <p>Avec un petit lopin de terre hérité de ses parents, Jean avait de grandes ambitions mais peu de moyens. Le crédit équipement COFINA lui a permis d'acquérir du matériel moderne et d'augmenter sa production.</p>

      <p>Son parcours avec COFINA :</p>
      <ul>
        <li>Financement pour l'achat d'un tracteur</li>
        <li>Crédit fonds de roulement pour les semences</li>
        <li>Formation en gestion agricole</li>
        <li>Accompagnement pour la commercialisation</li>
      </ul>

      <h2>Une réussite inspirante</h2>
      <p>Aujourd'hui, Jean cultive 15 hectares et approvisionne plusieurs marchés de la région. Il a créé 10 emplois permanents dans son village.</p>
    `,
    secondaryImage: heroImg2
  },
  {
    id: 6,
    title: "L'histoire de Jean et son projet agricole",
    category: 'Success Story',
    date: '20 Janvier 2025',
    readTime: '6 min de lecture',
    heroImage: heroImg1,
    content: `
      <p>Jean, agriculteur dans la région des Plateaux, a transformé son exploitation grâce à l'accompagnement de COFINA.</p>

      <h2>Du rêve à la réalité</h2>
      <p>Avec un petit lopin de terre hérité de ses parents, Jean avait de grandes ambitions mais peu de moyens. Le crédit équipement COFINA lui a permis d'acquérir du matériel moderne et d'augmenter sa production.</p>

      <p>Son parcours avec COFINA :</p>
      <ul>
        <li>Financement pour l'achat d'un tracteur</li>
        <li>Crédit fonds de roulement pour les semences</li>
        <li>Formation en gestion agricole</li>
        <li>Accompagnement pour la commercialisation</li>
      </ul>

      <h2>Une réussite inspirante</h2>
      <p>Aujourd'hui, Jean cultive 15 hectares et approvisionne plusieurs marchés de la région. Il a créé 10 emplois permanents dans son village.</p>
    `,
    secondaryImage: heroImg2
  }
]

// Trouver l'article correspondant à l'ID
const article = computed(() => {
  const found = articlesData.find(a => a.id === Number(props.id))
  return found || articlesData[0]
})

// Articles similaires (exclure l'article actuel)
const relatedArticles = computed(() => {
  return articlesData
    .filter(a => a.id !== Number(props.id))
    .slice(0, 3)
    .map(a => ({
      id: a.id,
      image: a.heroImage,
      category: a.category,
      title: a.title,
      excerpt: a.content.substring(0, 100).replace(/<[^>]*>/g, '') + '...'
    }))
})

const goBack = () => {
  window.history.back()
}
</script>

<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Hero image avec bandeau rouge par-dessus -->
    <section class="relative">
      <!-- Image de fond -->
      <div class="h-64 md:h-80 lg:h-96">
        <img
          :src="article.heroImage"
          :alt="article.title"
          class="w-full h-full object-cover"
        >
        <!-- Overlay sombre -->
        <div class="absolute inset-0 bg-black/40"></div>
      </div>

      <!-- Bandeau rouge superposé en bas de l'image -->
      <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-r from-primary to-secondary text-white py-6 md:py-8">
        <div class="max-w-[1200px] mx-auto px-4 lg:px-8">
          <!-- Boutons d'action en haut -->
          <div class="flex items-center justify-between mb-4">
            <button
              @click="goBack"
              class="inline-flex items-center gap-2 text-white hover:text-gray-200 transition-colors text-sm"
            >
              <ArrowLeft :size="18" />
              <span class="hidden sm:inline">Retour aux actualités</span>
              <span class="sm:hidden">Retour</span>
            </button>

            <button class="inline-flex items-center gap-2 text-white hover:text-gray-200 transition-colors text-sm">
              <Share2 :size="18" />
              <span class="hidden sm:inline">Partager</span>
            </button>
          </div>

          <!-- Titre de l'article -->
          <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mb-3 leading-tight">
            {{ article.title }}
          </h1>

          <!-- Métadonnées -->
          <div class="flex flex-wrap items-center gap-4 text-white/90 text-sm">
            <div class="flex items-center gap-2">
              <Calendar :size="16" />
              <span>{{ article.date }}</span>
            </div>
            <div class="flex items-center gap-2">
              <User :size="16" />
              <span>{{ article.readTime }}</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contenu de l'article sur fond blanc -->
    <div class="bg-white">
      <div class="max-w-[1200px] mx-auto px-4 lg:px-8 py-12">
        <!-- Contenu de l'article -->
        <article class="max-w-4xl mx-auto">
          <div class="article-content text-gray-700 text-base leading-relaxed" v-html="article.content"></div>

          <!-- Image secondaire -->
          <div class="my-8">
            <img
              :src="article.secondaryImage"
              alt="Image article"
              class="w-full rounded-xl shadow-lg"
            >
          </div>
        </article>
      </div>
    </div>

    <!-- Section articles similaires sur fond gris -->
    <section class="bg-gray-50 py-12 md:py-16">
      <div class="max-w-[1200px] mx-auto px-4 lg:px-8">
        <h2 class="text-gray-900 text-2xl md:text-3xl font-bold mb-8">
          AUTRES ARTICLES
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <router-link
            v-for="relatedArticle in relatedArticles"
            :key="relatedArticle.id"
            :to="{ name: 'blog', params: { id: relatedArticle.id } }"
            class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1"
          >
            <!-- Image -->
            <div class="relative h-48 overflow-hidden">
              <img
                :src="relatedArticle.image"
                :alt="relatedArticle.title"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
              >
            </div>

            <!-- Contenu -->
            <div class="p-5">
              <!-- Catégorie -->
              <span class="inline-block text-primary text-xs font-bold uppercase mb-2">
                {{ relatedArticle.category }}
              </span>

              <h3 class="text-gray-900 text-base font-bold mb-2 leading-tight group-hover:text-primary transition-colors">
                {{ relatedArticle.title }}
              </h3>

              <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                {{ relatedArticle.excerpt }}
              </p>

              <span class="text-primary text-sm font-semibold inline-flex items-center gap-1 group-hover:gap-2 transition-all">
                Lire la suite
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </span>
            </div>
          </router-link>
        </div>
      </div>
    </section>
  </div>
</template>

<style scoped>
/* Styles du contenu article */
.article-content h2 {
  font-size: 1.5rem;
  font-weight: 700;
  color: #111827;
  margin-top: 2rem;
  margin-bottom: 1rem;
}

.article-content h3 {
  font-size: 1.25rem;
  font-weight: 700;
  color: #111827;
  margin-top: 1.5rem;
  margin-bottom: 0.75rem;
}

.article-content p {
  margin-bottom: 1rem;
  line-height: 1.75;
}

.article-content ul {
  list-style-type: disc;
  margin-left: 1.5rem;
  margin-bottom: 1rem;
}

.article-content li {
  margin-bottom: 0.5rem;
  line-height: 1.75;
}

.article-content a {
  color: #8B1538;
  text-decoration: underline;
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
