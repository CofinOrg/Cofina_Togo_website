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
          <p class="text-gray-700 leading-relaxed mb-4">
           Une épargne est plus qu'un compte. Il s'agit d'un PLAN avec une vision et des objectifs pour réaliser vos projets. Démarrez votre plan dès aujourd'hui et laissez COFINA vous accompagner.
          </p>
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

        <p class="text-gray-700 leading-relaxed mb-4">
          Toutes les informations fournies sont confidentielles et sécurisées. Notre équipe vous contactera dans les plus brefs délais pour finaliser votre souscription.
        </p>

      </div>
    </section>

    <section class="pb-20 container mx-auto px-6">
      <div class="max-w-4xl mx-auto">
        <div class="bg-[#F2F2F2] p-8 md:p-12 rounded-3xl shadow-sm">

          <form :key="formKey" @submit.prevent="handleSubmit">

            <!-- Section Choix du produit -->
            <div class="mb-10">
              <h2 class="text-xl font-black text-gray-900 mb-6">Choix du produit</h2>

              <div v-if="isLoadingProducts" class="text-center py-6">
                <p class="text-gray-500">Chargement des produits...</p>
              </div>

              <div v-else class="grid grid-cols-1 gap-6">
                <div class="relative">
                <select
                    v-model="selectedProductId"
                    required
                    class="w-full px-4 py-3 bg-white rounded-lg text-sm text-gray-800 outline-none border border-gray-200 focus:border-[#D10000] focus:ring-1 focus:ring-[#D10000] transition appearance-none cursor-pointer pr-10"
                    @change="onProductChange"
                >
                    <option value="" disabled>-- Sélectionnez un produit --</option>
                    <option v-for="p in products" :key="p.id" :value="p.id">
                    {{ p.name }}
                    </option>
                </select>
                <p v-if="!selectedProduct" class="text-sm text-red-500 mt-2">
                    Veuillez sélectionner un produit avant de soumettre.
                </p>
                <!-- Flèche custom -->
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
                </div>

                <!-- Carte du produit sélectionné -->
                <div v-if="selectedProduct" class="bg-white rounded-2xl p-6 border-2 border-[#D10000]/20">
                  <p class="text-xs font-bold text-[#D10000] uppercase tracking-wider mb-1">Produit sélectionné</p>
                  <h3 class="text-2xl font-black text-gray-900">{{ selectedProduct.name }}</h3>
                </div>
              </div>
            </div>

            <!-- Le reste du formulaire n'apparaît que si un produit est sélectionné -->

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

                  <div>
                    <label class="block text-sm font-bold text-gray-800 mb-3">Téléphone *</label>
                    <input
                      v-model="formData.phoneNumber"
                      type="text"
                      required
                      placeholder="Votre numéro de téléphone"
                      class="w-full p-3 bg-white border-none rounded-lg outline-none focus:ring-2 focus:ring-[#D10000]"
                    />
                  </div>

                  <div>
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

                  <!-- Carte CFE : uniquement pour les produits entreprise -->
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
                  :disabled="isSubmitting || !selectedProduct"
                  class="px-12 py-4 bg-[#D10000] text-white font-bold rounded-lg hover:bg-[#A00000] transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed"
                >
                  {{ isSubmitting ? 'Envoi en cours...' : 'Pré-souscrivez' }}
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

// ── Liste de tous les produits ──────────────────────────────────────────────
const   products = ref<any[]>([]);
const isLoadingProducts = ref(true);

const fetchProducts = async () => {
  isLoadingProducts.value = true;
  try {
    let allProducts: any[] = [];
    let page = 1;
    let lastPage = 1;

    do {
      const response = await api.get(`/service_products?with_service=true&page=${page}`);
      const result = response.data;
      allProducts = [...allProducts, ...result.data];
      lastPage = result.last_page;
      page++;
    } while (page <= lastPage);

    // Filtrer uniquement les produits d'épargne (exclure les crédits)
  products.value = allProducts.filter(p => {
    const name = (p.service?.name || '').toLowerCase();
    return (name.includes('épargne') || name.includes('particulier')) && !name.includes('crédit');
  });

  } catch (error) {
    console.error('Erreur lors du chargement des produits', error);
    products.value = [];
  } finally {
    isLoadingProducts.value = false;
  }
};
// ── Produit sélectionné ─────────────────────────────────────────────────────
const selectedProductId = ref<string | number>('');

const selectedProduct = computed(() =>
  products.value.find(p => p.id === selectedProductId.value) || null
);

const onProductChange = () => {
  // Réinitialiser les fichiers et champs conditionnels quand le produit change
  Object.assign(files, {
    identityDocument: null,
    identityPhoto: null,
    proofOfAddress: null,
    cardCfe: null,
  });
  formData.receiptNumber = '';
  formKey.value++;
};



// ── Computed : détection du type de produit ─────────────────────────────────
const isEntreprise = computed(() => {
  if (!selectedProduct.value) return false;
  const serviceName = (selectedProduct.value.service?.name || '').toLowerCase();
  const productName = (selectedProduct.value.name || '').toLowerCase();
  return serviceName === 'entreprise' ||
    productName === 'solo' ||
    productName === 'pro' ||
    productName === 'gold';
});

const isAssociation = computed(() => {
  if (!selectedProduct.value) return false;
  const serviceName = (selectedProduct.value.service?.name || '').toLowerCase();
  const productName = (selectedProduct.value.name || '').toLowerCase();
  return productName.includes('association') || serviceName.includes('association');
});

// ── Données du formulaire ───────────────────────────────────────────────────
const formData = reactive({
  customerName: '',
  customerEmail: '',
  customerAdress: '',
  phoneNumber: '',
  business: '',
  receiptNumber: '',
  accepteConditions: false
});

// ── Fichiers uploadés ───────────────────────────────────────────────────────
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

// ── Soumission ──────────────────────────────────────────────────────────────
const handleSubmit = async () => {
  if (!selectedProduct.value) return;

  isSubmitting.value = true;
  showSuccess.value = false;
  errorMessage.value = '';

  try {
    const payload = new FormData();

    payload.append('product_id', String(selectedProduct.value.id));
    payload.append('customer_name', formData.customerName);
    payload.append('customer_email', formData.customerEmail);
    payload.append('phone_number', formData.phoneNumber);
    payload.append('customer_adress', formData.customerAdress);
    payload.append('business', formData.business);

    if (files.identityDocument) payload.append('identity_document', files.identityDocument);
    if (files.identityPhoto)    payload.append('identity_photo', files.identityPhoto);
    if (files.proofOfAddress)   payload.append('proof_of_address', files.proofOfAddress);

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

// ── Réinitialisation ────────────────────────────────────────────────────────
const resetForm = () => {
  selectedProductId.value = '';
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
  fetchProducts();
});
</script>
