<template>
  <main class="min-h-screen bg-white">
    <section class="relative h-75 flex items-center bg-[#333] overflow-hidden">
      <div class="absolute inset-0 opacity-40">
        <img src="@/assets/images/hero_produits.png" class="w-full h-full object-cover" alt="Hero Souscription" />
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <h1 class="text-4xl font-bold text-white tracking-tight">Formulaire de souscription</h1>
      </div>
    </section>

    <section class="py-12 bg-white">
      <div class="container mx-auto px-6 max-w-2xl">
        <p class="text-gray-700 leading-relaxed mb-4">
          Remplissez le formulaire ci-dessous pour souscrire à nos services bancaires.
        </p>
        <p class="text-gray-700 leading-relaxed mb-4">
          Toutes les informations fournies sont confidentielles et sécurisées. Notre équipe vous contactera dans les plus brefs délais pour finaliser votre souscription.
        </p>
        <p class="text-gray-700 leading-relaxed font-medium">
          Rejoignez-nous dès aujourd'hui et profitez de nos services personnalisés.
        </p>
      </div>
    </section>

    <section class="pb-20 container mx-auto px-6">
      <div class="max-w-2xl mx-auto">
        <div class="bg-[#fa2c2c] p-8 md:p-12 rounded-3xl shadow-sm">

          <form @submit.prevent="handleSubmit">
            <!-- Section Informations personnelles -->
            <div class="mb-10">
              <h2 class="text-xl font-black text-gray-900 mb-6">Informations personnelles</h2>

              <div class="grid grid-cols-1 gap-6">
                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Nom *</label>
                  <input
                    v-model="formData.nom"
                    type="text"
                    required
                    placeholder="Votre nom"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Prénom *</label>
                  <input
                    v-model="formData.prenom"
                    type="text"
                    required
                    placeholder="Votre prénom"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Date de naissance *</label>
                  <input
                    v-model="formData.dateNaissance"
                    type="date"
                    required
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Sexe *</label>
                  <select
                    v-model="formData.sexe"
                    required
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  >
                    <option value="">Sélectionner</option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                  </select>
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Nationalité *</label>
                  <input
                    v-model="formData.nationalite"
                    type="text"
                    required
                    placeholder="Votre nationalité"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Profession *</label>
                  <input
                    v-model="formData.profession"
                    type="text"
                    required
                    placeholder="Votre profession"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>
              </div>
            </div>

            <!-- Section Contact -->
            <div class="mb-10">
              <h2 class="text-xl font-black text-gray-900 mb-6">Coordonnées</h2>

              <div class="grid grid-cols-1 gap-6">
                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Téléphone *</label>
                  <input
                    v-model="formData.telephone"
                    type="tel"
                    required
                    placeholder="+228 XX XX XX XX"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Email *</label>
                  <input
                    v-model="formData.email"
                    type="email"
                    required
                    placeholder="votre@email.com"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Adresse *</label>
                  <input
                    v-model="formData.adresse"
                    type="text"
                    required
                    placeholder="Votre adresse complète"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Ville *</label>
                  <input
                    v-model="formData.ville"
                    type="text"
                    required
                    placeholder="Votre ville"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Code postal</label>
                  <input
                    v-model="formData.codePostal"
                    type="text"
                    placeholder="Code postal"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>
              </div>
            </div>

            <!-- Section Produit -->
            <div class="mb-10">
              <h2 class="text-xl font-black text-gray-900 mb-6">Produit souhaité</h2>

              <div class="grid grid-cols-1 gap-6">
                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Type de produit *</label>
                  <select
                    v-model="formData.typeProduit"
                    required
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  >
                    <option value="">Sélectionner un produit</option>
                    <option value="compte-courant">Compte courant</option>
                    <option value="compte-epargne">Compte d'épargne</option>
                    <option value="depot-terme">Dépôt à terme</option>
                    <option value="credit">Crédit</option>
                    <option value="carte-bancaire">Carte bancaire</option>
                  </select>
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Montant initial (optionnel)</label>
                  <input
                    v-model.number="formData.montantInitial"
                    type="number"
                    placeholder="0"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Commentaires ou demandes spécifiques</label>
                  <textarea
                    v-model="formData.commentaires"
                    rows="4"
                    placeholder="Partagez-nous vos besoins..."
                    class="w-full p-3 bg-white border-none rounded-lg outline-none resize-none focus:ring-2 focus:ring-[#D10000]"
                  ></textarea>
                </div>
              </div>
            </div>

            <!-- Consentement -->
            <!-- <div class="mb-8">
              <label class="flex items-start gap-3 cursor-pointer">
                <input
                  v-model="formData.accepteConditions"
                  type="checkbox"
                  required
                  class="mt-1 w-5 h-5 text-[#D10000] border-gray-300 rounded focus:ring-[#D10000]"
                />
                <span class="text-sm text-gray-700">
                  J'accepte les <a href="#" class="text-[#D10000] font-bold hover:underline">conditions générales</a>
                  et la <a href="#" class="text-[#D10000] font-bold hover:underline">politique de confidentialité</a> *
                </span>
              </label>
            </div> -->

            <!-- Bouton de soumission -->
            <div class="flex justify-center">
              <button
                type="submit"
                :disabled="isSubmitting"
                class="px-12 py-4 bg-[#D10000] text-white font-bold rounded-lg hover:bg-[#A00000] transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed"
              >
                {{ isSubmitting ? 'Envoi en cours...' : 'Soumettre ma demande' }}
              </button>
            </div>
          </form>

          <!-- Message de confirmation -->
          <div v-if="showSuccess" class="mt-8 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            <p class="font-bold">✓ Votre demande a été envoyée avec succès !</p>
            <p class="text-sm mt-2">Notre équipe vous contactera dans les plus brefs délais.</p>
          </div>

          <p class="text-[11px] text-gray-500 mt-10 leading-snug italic">
            NB: Les champs marqués d'un astérisque (*) sont obligatoires. Vos données personnelles sont protégées et ne seront utilisées que dans le cadre de votre demande de souscription.
          </p>
        </div>
      </div>
    </section>
  </main>
</template>

<script setup lang="ts">
import { ref, reactive } from 'vue';

interface FormData {
  nom: string;
  prenom: string;
  dateNaissance: string;
  sexe: string;
  nationalite: string;
  profession: string;
  telephone: string;
  email: string;
  adresse: string;
  ville: string;
  codePostal: string;
  typeProduit: string;
  montantInitial: number;
  commentaires: string;
  accepteConditions: boolean;
}

const formData = reactive<FormData>({
  nom: '',
  prenom: '',
  dateNaissance: '',
  sexe: '',
  nationalite: '',
  profession: '',
  telephone: '',
  email: '',
  adresse: '',
  ville: '',
  codePostal: '',
  typeProduit: '',
  montantInitial: 0,
  commentaires: '',
  accepteConditions: false
});

const isSubmitting = ref(false);
const showSuccess = ref(false);

const handleSubmit = async () => {
  isSubmitting.value = true;
  showSuccess.value = false;

  try {
    await new Promise(resolve => setTimeout(resolve, 2000));
    showSuccess.value = true;

    setTimeout(() => {
      resetForm();
      showSuccess.value = false;
    }, 3000);

  } catch (error) {
    console.error('Erreur lors de la soumission:', error);
    alert('Une erreur est survenue. Veuillez réessayer.');
  } finally {
    isSubmitting.value = false;
  }
};

const resetForm = () => {
  Object.assign(formData, {
    nom: '',
    prenom: '',
    dateNaissance: '',
    sexe: '',
    nationalite: '',
    profession: '',
    telephone: '',
    email: '',
    adresse: '',
    ville: '',
    codePostal: '',
    typeProduit: '',
    montantInitial: 0,
    commentaires: '',
    accepteConditions: false
  });
};
</script>
