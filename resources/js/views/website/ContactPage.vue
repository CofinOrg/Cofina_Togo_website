<script setup>
import { ref } from 'vue'
import { Phone, Mail, MapPin, Send } from 'lucide-vue-next'

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
  // Logique de soumission ici
  alert('Votre message a été envoyé avec succès !')
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
    title: 'Visitez-nous',
    value: 'Lomé, Togo',
    bgColor: 'bg-pink-400',
    link: '#map'
  }
]
</script>

<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Section principale avec image de fond et formulaire -->
    <section class="relative py-8 md:py-12 bg-gray-200">
      <!-- Image de fond -->
      <div class="absolute inset-0 opacity-20">
        <div class="w-full h-full" style="background-image: url('/src/assets/images/contact/contact-bg.png'); background-size: cover; background-position: center;"></div>
      </div>

      <div class="relative z-10 max-w-[1200px] mx-auto px-4 lg:px-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
          <!-- Colonne gauche : Titre et image du téléphone -->
          <div class="animate-fade-in">
            <h1 class="text-gray-900 text-2xl md:text-3xl font-bold mb-4">
              Contact
            </h1>

            <!-- Icônes réseaux sociaux -->
            <div class="flex gap-3 mb-6">
              <a href="https://facebook.com/cofina" target="_blank" class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center hover:bg-secondary transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
              </a>
              <a href="https://twitter.com/cofina" target="_blank" class="w-8 h-8 bg-accent text-white rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
              </a>
              <a href="https://linkedin.com/company/cofina" target="_blank" class="w-8 h-8 bg-blue-700 text-white rounded-full flex items-center justify-center hover:bg-blue-800 transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
              </a>
              <a href="https://youtube.com/cofina" target="_blank" class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center hover:bg-red-700 transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
              </a>
            </div>

            <!-- Image du téléphone rouge -->
            <div class="hidden lg:block">
              <img
                src="../../assets/images/contact/flat-lay-chat-bubbles-with-two-telephone-receivers-cord-removebg-preview.png"
                alt="Contact"
                class="max-w-xs w-full h-auto"
              >
            </div>
          </div>

          <!-- Colonne droite : Formulaire de contact -->
          <div class="bg-white rounded-xl shadow-xl p-6 animate-slide-in-right">
            <h2 class="text-primary text-xl font-bold mb-5 text-center">
              Formulaire de contact
            </h2>

            <form @submit.prevent="submitForm" class="space-y-3">
              <!-- Nom -->
              <div>
                <label for="nom" class="block text-gray-700 text-xs font-semibold mb-1">
                  Nom
                </label>
                <input
                  id="nom"
                  v-model="formData.nom"
                  type="text"
                  required
                  class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                  placeholder="Votre nom"
                >
              </div>

              <!-- Prénom -->
              <div>
                <label for="prenom" class="block text-gray-700 text-xs font-semibold mb-1">
                  Prénom
                </label>
                <input
                  id="prenom"
                  v-model="formData.prenom"
                  type="text"
                  required
                  class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                  placeholder="Votre prénom"
                >
              </div>

              <!-- Email et Téléphone sur la même ligne -->
              <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                  <label for="email" class="block text-gray-700 text-xs font-semibold mb-1">
                    Email
                  </label>
                  <input
                    id="email"
                    v-model="formData.email"
                    type="email"
                    required
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                    placeholder="email@exemple.com"
                  >
                </div>

                <div>
                  <label for="telephone" class="block text-gray-700 text-xs font-semibold mb-1">
                    Téléphone
                  </label>
                  <input
                    id="telephone"
                    v-model="formData.telephone"
                    type="tel"
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                    placeholder="+228 XX XX XX XX"
                  >
                </div>
              </div>

              <!-- Objet -->
              <div>
                <label for="objet" class="block text-gray-700 text-xs font-semibold mb-1">
                  Objet
                </label>
                <input
                  id="objet"
                  v-model="formData.objet"
                  type="text"
                  required
                  class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                  placeholder="Objet de votre message"
                >
              </div>

              <!-- Message -->
              <div>
                <label for="message" class="block text-gray-700 text-xs font-semibold mb-1">
                  Message
                </label>
                <textarea
                  id="message"
                  v-model="formData.message"
                  required
                  rows="3"
                  class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-none"
                  placeholder="Votre message..."
                ></textarea>
              </div>

              <!-- Bouton d'envoi -->
              <button
                type="submit"
                class="w-full bg-primary text-white py-2.5 rounded-full text-sm font-bold hover:bg-secondary transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2"
              >
                Envoyer
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Section : Cartes d'information -->
    <section class="py-10 bg-white">
      <div class="max-w-[1000px] mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
          <a
            v-for="(info, index) in contactInfo"
            :key="index"
            :href="info.link"
            :class="[
              info.bgColor,
              'text-white rounded-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group'
            ]"
          >
            <div class="flex justify-center mb-3">
              <component
                :is="info.icon"
                :size="36"
                class="group-hover:scale-110 transition-transform duration-300"
              />
            </div>
            <h3 class="text-base font-bold mb-1">{{ info.title }}</h3>
            <p class="text-white/90 text-sm">{{ info.value }}</p>
          </a>
        </div>

        <!-- Texte d'information -->
        <p class="text-gray-600 text-xs text-center mt-6 max-w-3xl mx-auto">
          Pour toutes vos réclamations, nous sommes disponibles 24h/24 et 7j/7. Merci de nous contacter via nos lignes dédiées ou de vous rendre dans nos agences.
        </p>
      </div>
    </section>

    <!-- Section : Carte Google Maps -->
    <section id="map" class="py-8 bg-gray-50">
      <div class="max-w-[1400px] mx-auto px-4 lg:px-28">
        <h2 class="text-gray-900 text-2xl font-bold mb-2 flex items-center gap-2">
          Agences Cofina Togo
        </h2>
        <p class="text-gray-600 text-sm mb-6">Retrouvez-nous à Lomé</p>

        <!-- Carte Google Maps embarquée -->
        <div class="rounded-xl overflow-hidden shadow-xl">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.0901234567!2d1.2345678!3d6.1234567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMDcnMjQuNCJOIDHCsDEzJzEyLjQiRQ!5e0!3m2!1sfr!2stg!4v1234567890123!5m2!1sfr!2stg"
            width="100%"
            height="350"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="w-full"
          ></iframe>
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
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(30px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.animate-fade-in {
  animation: fadeIn 0.6s ease-out;
}

.animate-slide-in-right {
  animation: slideInRight 0.8s ease-out;
}
</style>
