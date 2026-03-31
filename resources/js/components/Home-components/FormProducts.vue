<template>
  <main class="min-h-screen bg-white">
    <section class="relative h-75 flex items-center bg-[#333] overflow-hidden">
      <div class="absolute inset-0 opacity-40">
        <img src="@/assets/images/hero_produits.png" class="w-full h-full object-cover" alt="Hero Souscription" />
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <h1 class="text-4xl font-bold text-white tracking-tight">Formulaire de pré-inscription</h1>
      </div>
    </section>

    <section class="py-12 bg-white">
      <div class="container mx-auto px-6 max-w-5xl">
        <template v-if="isEntreprise">
          <p class="text-gray-700 leading-relaxed mb-4">
            Remplissez le formulaire ci-dessous pour ouvrir votre compte entreprise.
            Veuillez préparer votre Carte CFE ainsi que les pièces d'identité requises.
          </p>
        </template>
        <template v-else-if="isAssociation">
          <p class="text-gray-700 leading-relaxed mb-4">
            Remplissez le formulaire ci-dessous pour ouvrir votre compte association.
            Veuillez préparer votre numéro de récépissé ainsi que les pièces d'identité requises.
          </p>
        </template>
        <template v-else>
          <p class="text-gray-700 leading-relaxed mb-4">
            Une épargne est plus qu'un compte. Il s'agit d'un PLAN avec une vision et des objectifs pour réaliser vos projets. Démarrez votre plan dès aujourd'hui et laissez COFINA vous accompagner.
          </p>
        </template>
        <p class="text-gray-700 leading-relaxed mb-4">
          Toutes les informations fournies sont confidentielles et sécurisées. Notre équipe vous contactera dans les plus brefs délais pour finaliser votre souscription.
        </p>
        <p class="text-gray-700 leading-relaxed font-medium">
          Rejoignez-nous dès aujourd'hui et profitez de nos services personnalisés.
        </p>
      </div>
    </section>

    <section class="pb-20 container mx-auto px-6">
      <div class="max-w-4xl mx-auto">
        <div class="bg-[#F2F2F2] p-8 md:p-12 rounded-3xl shadow-sm">

          <!-- Carte produit sélectionné -->
          <div v-if="product" class="mb-10 bg-white rounded-2xl p-6 border-2 border-[#D10000]/20">
            <div class="flex items-start justify-between">
              <div>
                <p class="text-xs font-bold text-[#D10000] uppercase tracking-wider mb-1">Produit sélectionné</p>
                <h3 class="text-2xl font-black text-gray-900">{{ product.name }}</h3>
              <!--   <p v-if="product.service" class="text-sm text-gray-500 mt-1">
                  Service : {{ product.service.name }}
                  <span class="ml-2 px-2 py-0.5 rounded-full text-xs font-semibold"
                    :class="product.service.type === 'pack' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800'">
                    {{ product.service.type === 'pack' ? 'Pack' : 'Solution financière' }}
                  </span>
                </p> -->
              </div>
            </div>
       <!--      <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
              <div v-if="product.advantage" class="bg-gray-50 rounded-lg p-3">
                <p class="text-gray-500 text-xs font-semibold mb-1">Avantage</p>
                <p class="text-gray-800">{{ product.advantage }}</p>
              </div>
              <div v-if="product.credit_access" class="bg-gray-50 rounded-lg p-3">
                <p class="text-gray-500 text-xs font-semibold mb-1">Crédit</p>
                <p class="text-gray-800">{{ product.credit_access }}</p>
              </div>
              <div v-if="product.deposit_at_opening" class="bg-gray-50 rounded-lg p-3">
                <p class="text-gray-500 text-xs font-semibold mb-1">Dépôt à l'ouverture</p>
                <p class="text-gray-800">{{ product.deposit_at_opening }} FCFA</p>
              </div>
            </div> -->
          </div>

          <!-- Chargement -->
          <div v-else-if="isLoadingProduct" class="mb-10 text-center py-8">
            <p class="text-gray-500">Chargement du produit...</p>
          </div>

          <!-- Erreur -->
          <div v-else class="mb-10 bg-red-50 rounded-2xl p-6 border border-red-200 text-center">
            <p class="text-red-600 font-semibold">Produit introuvable</p>
            <router-link to="/" class="text-[#D10000] text-sm font-bold hover:underline mt-2 inline-block">
              Retour à l'accueil
            </router-link>
          </div>

          <form v-if="product" :key="formKey" @submit.prevent="handleSubmit">
            <!-- Section Informations personnelles -->
            <div class="mb-10">
              <h2 class="text-xl font-black text-gray-900 mb-6">Informations personnelles</h2>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                  <label class="block text-sm font-bold text-gray-800 mb-3">Nom complet *</label>
                  <input
                    v-model="formData.customerName"
                    type="text"
                    required
                    placeholder="Votre nom et prénom"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>
                <div >
                  <label class="block text-sm font-bold text-gray-800 mb-3">Téléphone *</label>
                  <input
                    v-model="formData.phoneNumber"
                    type="text"
                    required
                    placeholder="Votre numéro de téléphone"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>
                <div >
                  <label class="block text-sm font-bold text-gray-800 mb-3">Entreprise *</label>
                  <input
                    v-model="formData.business"
                    type="text"
                    required
                    placeholder="Votre entreprise"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Email *</label>
                  <input
                    v-model="formData.customerEmail"
                    type="email"
                    required
                    placeholder="votre@email.com"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Adresse *</label>
                  <input
                    v-model="formData.customerAdress"
                    type="text"
                    required
                    placeholder="Votre adresse complète"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>
              </div>
            </div>

            <!-- Section Pièces à fournir -->
            <div class="mb-10">
              <h2 class="text-xl font-black text-gray-900 mb-6">Pièces à fournir</h2>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Pièce d'identité *</label>
                  <input
                    type="file"
                    required
                    accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                    @change="onFileChange('identityDocument', $event)"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000] file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-[#D10000]/10 file:text-[#D10000]"
                  />
                  <p class="text-xs text-gray-500 mt-1">Formats acceptés : JPG, PNG, PDF, DOC (max 10 Mo)</p>
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Photo d'identité *</label>
                  <input
                    type="file"
                    required
                    accept=".jpg,.jpeg,.png"
                    @change="onFileChange('identityPhoto', $event)"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000] file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-[#D10000]/10 file:text-[#D10000]"
                  />
                  <p class="text-xs text-gray-500 mt-1">Formats acceptés : JPG, PNG (max 10 Mo)</p>
                </div>

                <div>
                  <label class="block text-sm font-bold text-gray-800 mb-3">Justificatif de domicile *</label>
                  <input
                    type="file"
                    required
                    accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                    @change="onFileChange('proofOfAddress', $event)"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000] file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-[#D10000]/10 file:text-[#D10000]"
                  />
                  <p class="text-xs text-gray-500 mt-1">Formats acceptés : JPG, PNG, PDF, DOC (max 10 Mo)</p>
                </div>

                <!-- Carte CFE : uniquement pour les packs entreprise -->
                <div v-if="isEntreprise">
                  <label class="block text-sm font-bold text-gray-800 mb-3">Carte CFE *</label>
                  <input
                    type="file"
                    :required="isEntreprise"
                    accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                    @change="onFileChange('cardCfe', $event)"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000] file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-[#D10000]/10 file:text-[#D10000]"
                  />
                  <p class="text-xs text-gray-500 mt-1">Formats acceptés : JPG, PNG, PDF, DOC (max 10 Mo)</p>
                </div>

                <!-- Numéro de récépissé : uniquement pour les associations -->
                <div v-if="isAssociation">
                  <label class="block text-sm font-bold text-gray-800 mb-3">Numéro de récépissé *</label>
                  <input
                    v-model="formData.receiptNumber"
                    type="text"
                    :required="isAssociation"
                    placeholder="Numéro de récépissé de l'association"
                    class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                  />
                </div>
              </div>
            </div>

            <!-- Consentement -->
            <div class="mb-8">
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
            </div>

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
            <p class="font-bold">Votre demande a été envoyée avec succès !</p>
            <p class="text-sm mt-2">Notre équipe vous contactera dans les plus brefs délais.</p>
          </div>

          <!-- Message d'erreur -->
          <div v-if="errorMessage" class="mt-8 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            <p class="font-bold">Une erreur est survenue</p>
            <p class="text-sm mt-2">{{ errorMessage }}</p>
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
import { ref, reactive, computed, onMounted } from 'vue';
import api from '../../utils/api';

const props = defineProps<{
  productId?: string | number;
}>();

console.log('Product ID:', props.productId);

// Produit chargé depuis l'API
const product = ref<any>(null);
const isLoadingProduct = ref(true);

const fetchProduct = async () => {
  if (!props.productId) {
    isLoadingProduct.value = false;
    return;
  }
  isLoadingProduct.value = true;
  try {
    const response = await api.get(`/service_products/${props.productId}?with_service=true`);
    const data = response.data.data || response.data;
    product.value = data.ServiceProduct || data;
  } catch (error) {
    console.error('Erreur lors du chargement du produit', error);
    product.value = null;
  } finally {
    isLoadingProduct.value = false;
  }
};

// Computed : détection du type de produit
const isEntreprise = computed(() => {
  if (!product.value) return false;
  const serviceName = (product.value.service?.name || '').toLowerCase();
  const productName = (product.value.name || '').toLowerCase();
  return serviceName === 'entreprise' ||
    productName === 'solo' ||
    productName === 'pro' ||
    productName === 'gold';
});

const isAssociation = computed(() => {
  if (!product.value) return false;
  const serviceName = (product.value.service?.name || '').toLowerCase();
  const productName = (product.value.name || '').toLowerCase();
  return productName.includes('association') || serviceName.includes('association');
});

// Données du formulaire — alignées sur les colonnes de la table pre_registrations
const formData = reactive({
  customerName: '',
  customerEmail: '',
  customerAdress: '',
  phoneNumber: '',
  business: '',
  receiptNumber: '',
  accepteConditions: false
});

// Fichiers uploadés
const files = reactive<Record<string, File | null>>({
  identityDocument: null,
  identityPhoto: null,
  proofOfAddress: null,
  cardCfe: null,
});

const onFileChange = (field: string, event: Event) => {
  const target = event.target as HTMLInputElement;
  files[field] = target.files?.[0] || null;
};

const isSubmitting = ref(false);
const showSuccess = ref(false);
const errorMessage = ref('');
const formKey = ref(0);

// Gestion de la soumission
const handleSubmit = async () => {
  isSubmitting.value = true;
  showSuccess.value = false;
  errorMessage.value = '';

  try {
    const payload = new FormData();

    payload.append('product_id', String(product.value.id));
    payload.append('customer_name', formData.customerName);
    payload.append('customer_email', formData.customerEmail);
    payload.append('phone_number', formData.phoneNumber);
    payload.append('customer_adress', formData.customerAdress);
    payload.append('business', formData.business);

    // Fichiers obligatoires
    if (files.identityDocument) payload.append('identity_document', files.identityDocument);
    if (files.identityPhoto) payload.append('identity_photo', files.identityPhoto);
    if (files.proofOfAddress) payload.append('proof_of_address', files.proofOfAddress);

    // Champs conditionnels
    if (isEntreprise.value && files.cardCfe) {
      payload.append('card_cfe', files.cardCfe);
    }
    if (isAssociation.value && formData.receiptNumber) {
      payload.append('receipt_number', formData.receiptNumber);
    }

    await api.post('/pre_registrations', payload, {
      headers: { 'Content-Type': 'multipart/form-data' },
    });

    showSuccess.value = true;
    resetForm();

  } catch (error: any) {
    console.error('Erreur lors de la soumission:', error);
    if (error.response?.data?.errors) {
      const errors = error.response.data.errors;
      errorMessage.value = Object.values(errors).flat().join(', ');
    } else {
      errorMessage.value = 'Une erreur est survenue. Veuillez réessayer.';
    }
  } finally {
    isSubmitting.value = false;
  }
};

// Réinitialiser le formulaire
const resetForm = () => {
  Object.assign(formData, {
    customerName: '',
    customerEmail: '',
    customerAdress: '',
    phoneNumber: '',
    business: '',
    receiptNumber: '',
    accepteConditions: false
  });
  Object.assign(files, {
    identityDocument: null,
    identityPhoto: null,
    proofOfAddress: null,
    cardCfe: null,
  });
  formKey.value++;
};

onMounted(() => {
  fetchProduct();
});
</script>
