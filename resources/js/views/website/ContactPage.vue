<script setup>
import { ref, computed } from 'vue'
import { Phone, Mail, MapPin, Send, Search } from 'lucide-vue-next'
import cofina_logo from '../../assets/cofina_petit_logo.png';

// ... (tout le code du script reste identique jusqu'au template)

// Données du formulaire
const formData = ref({
  nom: '',
  prenom: '',
  email: '',
  telephone: '',
  objet: '',
  message: ''
})

// Soumission du formulaire
const submitForm = () => {
  console.log('Form submitted:', formData.value)
  alert('Votre message a été envoyé avec succès !')
}

// Liste des agences Cofina avec coordonnées GPS
const agences = ref([
  {
    id: 1,
    nom: 'Siège Cofina Togo',
    adresse: 'Boulevard du 13 Janvier, Kodjoviakopé',
    telephone: '+228 22 61 00 00',
    lat: 6.121955,
    lng: 1.2101903,
    type: 'Siège'
  },
  {
    id: 2,
    nom: 'Cofina Agoè',
    subtitle: 'Agoè Assiyéyé',
    adresse: 'Quartier Assiyéyé, Lomé',
    telephone: '+228 22 61 00 01',
    lat: 6.22965498612813,
    lng: 1.1948068547215267,
    type: 'Agence'
  },
  {
    id: 3,
    nom: 'Cofina Akodessiwa',
    subtitle: 'Akodessiwa',
    adresse: 'Quartier Akodessiwa, Lomé',
    telephone: '+228 22 61 00 02',
    lat: 6.153133503644887,
    lng: 1.2650723101431889,
    type: 'Agence'
  },
  {
    id: 4,
    nom: 'Cofina Adidogomé',
    subtitle: 'Adidogomé',
    adresse: 'Quartier Adidogomé, Lomé',
    telephone: '+228 22 61 00 03',
    lat: 6.202817772755404,
    lng: 1.145995794798708,
    type: 'Agence'
  },
])

// État de la recherche et de la sélection
const searchQuery = ref('')
const selectedAgence = ref(agences.value[0])

// Filtrer les agences selon la recherche
const filteredAgences = computed(() => {
  if (!searchQuery.value) {
    return agences.value
  }

  const query = searchQuery.value.toLowerCase()
  return agences.value.filter(agence =>
    agence.nom.toLowerCase().includes(query) ||
    agence.adresse.toLowerCase().includes(query) ||
    (agence.subtitle && agence.subtitle.toLowerCase().includes(query))
  )
})

// URL de la carte Google Maps basée sur l'agence sélectionnée
const mapUrl = computed(() => {
  const { lat, lng, nom } = selectedAgence.value
  return `https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.0!2d${lng}!3d${lat}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2z${encodeURIComponent(nom)}!5e0!3m2!1sfr!2stg!4v1234567890!5m2!1sfr!2stg`
})

// Sélectionner une agence
const selectAgence = (agence) => {
  selectedAgence.value = agence
}

// Informations de contact
const contactInfo = [
  {
    icon: Phone,
    title: 'Appelez-nous',
    value: '+228 22 61 00 00',
    bgColor: 'bg-primary',
    link: 'tel:+22822610000'
  },
  {
    icon: Mail,
    title: 'Écrivez-nous',
    value: 'contact@cofina.tg',
    bgColor: 'bg-primary',
    link: 'mailto:contact@cofina.tg'
  },
  {
    icon: MapPin,
    title: 'Siège',
    value: 'Boulevard du 13 Janvier, Kodjoviakopé',
    bgColor: 'bg-pink-400',
    link: 'https://www.google.com/maps/place/Si%C3%A8ge+Cofina+Togo/@6.1219603,1.2076154,17z/data=!3m1!4b1!4m6!3m5!1s0x1023e14cc2dd1b67:0xd9a6dc1cc0c49671!8m2!3d6.121955!4d1.2101903!16s%2Fg%2F11qyqpx3s1?hl=fr-FR&entry=ttu&g_ep=EgoyMDI2MDEyMS4wIKXMDSoASAFQAw%3D%3D'
  }
]

// Réseaux sociaux
const socialLinks = [
  {
    name: 'Facebook',
    url: 'https://facebook.com/cofina',
    bgColor: 'bg-blue-600 hover:bg-blue-700',
    icon: 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z'
  },
  {
    name: 'Twitter',
    url: 'https://twitter.com/cofina',
    bgColor: 'bg-sky-500 hover:bg-sky-600',
    icon: 'M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z'
  },
  {
    name: 'LinkedIn',
    url: 'https://linkedin.com/company/cofina',
    bgColor: 'bg-blue-700 hover:bg-blue-800',
    icon: 'M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z'
  },
  {
    name: 'YouTube',
    url: 'https://youtube.com/cofina',
    bgColor: 'bg-red-600 hover:bg-red-700',
    icon: 'M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z'
  }
]
</script>

<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Section principale avec image de fond et formulaire -->
    <section class="relative py-12 md:py-16 bg-gradient-to-br from-gray-100 to-gray-200">
      <!-- Image de fond -->
      <div class="absolute inset-0 opacity-10">
        <div class="w-full h-full" style="background-image: url('/src/assets/images/contact/contact-bg.png'); background-size: cover; background-position: center;"></div>
      </div>

      <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-24">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-start">
          <!-- Colonne gauche : Informations de contact -->
          <div class="space-y-8 animate-fade-in">
            <!-- En-tête -->
            <div>
              <h1 class="text-gray-900 text-3xl md:text-4xl lg:text-5xl font-bold mb-4">
                Contactez-nous
              </h1>
              <p class="text-gray-600 text-base md:text-lg leading-relaxed">
                Notre équipe est à votre disposition pour répondre à toutes vos questions. N'hésitez pas à nous contacter.
              </p>
            </div>

            <!-- Icônes réseaux sociaux -->
            <div>
              <h3 class="text-gray-900 text-lg font-semibold mb-4">Suivez-nous</h3>
              <div class="flex flex-wrap gap-3">

                <a  v-for="social in socialLinks"
                  :key="social.name"
                  :href="social.url"
                  target="_blank"
                  rel="noopener noreferrer"
                  :class="[
                    social.bgColor,
                    'w-12 h-12 text-white rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:shadow-lg'
                  ]"
                  :aria-label="social.name"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path :d="social.icon"/>
                  </svg>
                </a>
              </div>
            </div>

            <!-- Cartes d'information compactes -->
            <div class="space-y-4">
              <h3 class="text-gray-900 text-lg font-semibold mb-4">Informations de contact</h3>
              <div class="space-y-3">

                 <a v-for="(info, index) in contactInfo"
                  :key="index"
                  :href="info.link"
                  target="_blank"
                  :class="[
                    'flex items-center gap-4 p-4 bg-white rounded-xl hover:shadow-lg transition-all duration-300 transform hover:-translate-x-1 group border border-gray-100'
                  ]"
                >
                  <div :class="[info.bgColor, 'w-14 h-14 rounded-full flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300']">
                    <component
                      :is="info.icon"
                      :size="28"
                      class="text-white"
                    />
                  </div>
                  <div class="flex-1">
                    <h4 class="text-gray-900 font-semibold text-sm mb-0.5">{{ info.title }}</h4>
                    <p class="text-gray-600 text-sm">{{ info.value }}</p>
                  </div>
                </a>
              </div>
            </div>

            <!-- Horaires -->
            <div class="bg-blue-50 border border-blue-100 rounded-xl p-5">
              <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                  <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                <div>
                  <h4 class="text-gray-900 font-semibold text-sm mb-1">Disponibilité</h4>
                  <p class="text-gray-600 text-sm leading-relaxed">
                    Nous sommes disponibles <span class="font-semibold text-primary">24h/24 et 7j/7</span> pour toutes vos réclamations et demandes d'information.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Colonne droite : Formulaire de contact -->
          <div class="bg-white rounded-2xl shadow-2xl p-6 md:p-8 animate-slide-in-right lg:sticky lg:top-8">
            <div class="text-center mb-6">
              <h2 class="text-gray-900 text-2xl font-bold mb-2">
                Envoyez-nous un message
              </h2>
              <p class="text-gray-600 text-sm">Remplissez le formulaire ci-dessous</p>
            </div>

            <form @submit.prevent="submitForm" class="space-y-4">
              <!-- Nom et Prénom sur la même ligne -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label for="nom" class="block text-gray-700 text-sm font-semibold mb-2">
                    Nom <span class="text-red-500">*</span>
                  </label>
                  <input
                    id="nom"
                    v-model="formData.nom"
                    type="text"
                    required
                    class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                    placeholder="Votre nom"
                  >
                </div>

                <div>
                  <label for="prenom" class="block text-gray-700 text-sm font-semibold mb-2">
                    Prénom <span class="text-red-500">*</span>
                  </label>
                  <input
                    id="prenom"
                    v-model="formData.prenom"
                    type="text"
                    required
                    class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                    placeholder="Votre prénom"
                  >
                </div>
              </div>

              <!-- Email -->
              <div>
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">
                  Email <span class="text-red-500">*</span>
                </label>
                <input
                  id="email"
                  v-model="formData.email"
                  type="email"
                  required
                  class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                  placeholder="email@exemple.com"
                >
              </div>

              <!-- Téléphone -->
              <div>
                <label for="telephone" class="block text-gray-700 text-sm font-semibold mb-2">
                  Téléphone
                </label>
                <input
                  id="telephone"
                  v-model="formData.telephone"
                  type="tel"
                  class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                  placeholder="+228 XX XX XX XX"
                >
              </div>

              <!-- Objet -->
              <div>
                <label for="objet" class="block text-gray-700 text-sm font-semibold mb-2">
                  Objet <span class="text-red-500">*</span>
                </label>
                <input
                  id="objet"
                  v-model="formData.objet"
                  type="text"
                  required
                  class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                  placeholder="Objet de votre message"
                >
              </div>

              <!-- Message -->
              <div>
                <label for="message" class="block text-gray-700 text-sm font-semibold mb-2">
                  Message <span class="text-red-500">*</span>
                </label>
                <textarea
                  id="message"
                  v-model="formData.message"
                  required
                  rows="4"
                  class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-none"
                  placeholder="Écrivez votre message ici..."
                ></textarea>
              </div>

              <!-- Bouton d'envoi -->
              <button
                type="submit"
                class="w-full bg-primary text-white py-3.5 rounded-lg text-base font-bold hover:bg-secondary transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2"
              >
                Envoyer le message
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Section : Carte Google Maps avec agences -->
    <section id="map" class="py-12 md:py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-24">
        <!-- En-tête avec titre et barre de recherche -->
        <div class="mb-8">
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
              <h2 class="text-gray-900 text-2xl md:text-3xl font-bold mb-2">
                Agences Cofina Togo
              </h2>
              <p class="text-gray-600 text-sm md:text-base">Retrouvez toutes nos agences à Lomé</p>
            </div>

            <!-- Barre de recherche -->
            <div class="relative w-full md:w-96">
              <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <Search class="text-gray-400" :size="20" />
              </div>
              <input
                v-model="searchQuery"
                type="text"
                placeholder="Trouver une agence..."
                class="w-full pl-12 pr-4 py-3 rounded-lg border-2 border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 text-gray-900 placeholder-gray-500 transition-all"
              >
            </div>
          </div>

          <!-- Liste des agences en horizontal -->
          <div class="bg-white border-2 border-gray-100 rounded-xl p-4 mb-6">
            <div class="flex items-center gap-3 overflow-x-auto pb-2 scrollbar-hide">
              <div
                v-for="agence in filteredAgences"
                :key="agence.id"
                @click="selectAgence(agence)"
                :class="[
                  'flex-shrink-0 flex items-center gap-3 px-4 py-3 cursor-pointer transition-all duration-300 border-r-2',
                  selectedAgence.id === agence.id
                    ? 'bg-red-50 border-red-500'
                    : 'bg-white border-gray-200 hover:border-red-200 hover:bg-gray-50'
                ]"
              >
                <div class="flex items-center gap-2">
                  <div class="w-14 h-14">
                    <img :src="cofina_logo" alt="Petit logo de confina TOGO" width="60">
                  </div>
                  <div>
                    <div class="text-gray-900 font-bold text-sm whitespace-nowrap">
                      {{ agence.nom }}
                    </div>
                    <div v-if="agence.subtitle" class="text-gray-600 text-xs whitespace-nowrap">
                      {{ agence.subtitle }}
                    </div>
                    <div v-else class="text-gray-600 text-xs whitespace-nowrap">
                      {{ agence.adresse }}
                    </div>
                  </div>
                </div>
              </div>

              <!-- Message si aucune agence trouvée -->
              <div v-if="filteredAgences.length === 0" class="w-full text-center py-4">
                <p class="text-gray-500 text-sm">Aucune agence trouvée</p>
              </div>
            </div>
          </div>
        </div>

        <!-- NOUVEAU: Carte et Informations côte à côte -->
        <div class="grid lg:grid-cols-2 gap-6">
          <!-- Colonne gauche : Carte Google Maps -->


          <!-- Colonne droite : Informations de l'agence sélectionnée -->
          <div class="space-y-6">
            <!-- Carte principale de l'agence -->
            <div class="bg-gradient-to-br from-red-50 to-pink-50 border-2 border-red-100 rounded-2xl p-6 shadow-lg">
              <div class="flex items-start gap-4 mb-6">
                <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                  <MapPin class="text-white" :size="28" />
                </div>
                <div class="flex-1">
                  <div class="inline-block px-3 py-1 bg-red-600 text-white text-xs font-bold rounded-full mb-2">
                    {{ selectedAgence.type }}
                  </div>
                  <h3 class="text-gray-900 font-bold text-xl mb-2">{{ selectedAgence.nom }}</h3>
                  <p class="text-gray-600 text-sm mb-3 flex items-start gap-2">
                    <MapPin class="text-red-600 flex-shrink-0 mt-0.5" :size="16" />
                    {{ selectedAgence.adresse }}
                  </p>
                  <div class="flex items-center gap-2 mb-4">
                    <Phone class="text-red-600" :size=16 />
                    <a :href="`tel:${selectedAgence.telephone}`" class="text-red-600 hover:text-red-700 font-semibold text-sm">
                      {{ selectedAgence.telephone }}
                    </a>
                  </div>
                </div>
              </div>


              <a  :href="`https://www.google.com/maps/dir/?api=1&destination=${selectedAgence.lat},${selectedAgence.lng}`"
                target="_blank"
                class="w-full inline-flex items-center justify-center gap-2 bg-red-600 text-white px-6 py-4 rounded-xl font-bold hover:bg-red-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1"
              >
                <MapPin :size="20" />
                Obtenir l'itinéraire
              </a>
            </div>

            <!-- Horaires d'ouverture -->
            <div class="bg-white border-2 border-gray-100 rounded-2xl p-6 shadow-lg">
              <h4 class="text-gray-900 font-bold text-lg mb-4 flex items-center gap-2">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Horaires d'ouverture
              </h4>
              <div class="space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                  <span class="text-gray-700 font-medium">Lundi - Vendredi</span>
                  <span class="text-gray-900 font-semibold">8h00 - 17h00</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                  <span class="text-gray-700 font-medium">Samedi</span>
                  <span class="text-gray-900 font-semibold">8h00 - 13h00</span>
                </div>
                <div class="flex justify-between items-center py-2">
                  <span class="text-gray-700 font-medium">Dimanche</span>
                  <span class="text-red-600 font-semibold">Fermé</span>
                </div>
              </div>
            </div>

            <!-- Contact rapide -->
            <div class="bg-blue-50 border-2 border-blue-100 rounded-2xl p-6">
              <h4 class="text-gray-900 font-bold text-lg mb-3">Contact rapide</h4>
              <p class="text-gray-600 text-sm mb-4">
                Notre équipe est disponible <span class="font-semibold text-primary">24h/24 et 7j/7</span> pour répondre à vos questions.
              </p>
              <div class="flex gap-3">

               <a   :href="`tel:${selectedAgence.telephone}`"
                  class="flex-1 flex items-center justify-center gap-2 bg-primary text-white px-4 py-3 rounded-lg font-semibold hover:bg-secondary transition-all"
                >
                  <Phone :size="18" />
                  Appeler
                </a>

                 <a href="mailto:contact@cofina.tg"
                  class="flex-1 flex items-center justify-center gap-2 bg-white text-primary border-2 border-primary px-4 py-3 rounded-lg font-semibold hover:bg-primary hover:text-white transition-all"
                >
                  <Mail :size="18" />
                  Email
                </a>
              </div>
            </div>
          </div>

            <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-gray-100">
            <iframe
              :src="mapUrl"
              :key="selectedAgence.id"
              width="100%"
              height="100%"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              class="w-full"
            ></iframe>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<style scoped>
/* Animations */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(40px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.animate-fade-in {
  animation: fadeIn 0.7s ease-out;
}

.animate-slide-in-right {
  animation: slideInRight 0.8s ease-out;
}

/* Masquer la scrollbar tout en gardant le scroll */
.scrollbar-hide {
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.scrollbar-hide::-webkit-scrollbar {
  display: none;
}

/* Smooth scroll */
html {
  scroll-behavior: smooth;
}

/* Focus visible pour accessibilité */
*:focus-visible {
  outline-offset: 2px;
}
</style>
