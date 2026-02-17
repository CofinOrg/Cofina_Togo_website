<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4">
    <div class="max-w-5xl mx-auto">
      <!-- En-tête -->
      <div class="mb-8 flex items-center justify-between">
        <div>
          <h1 class="text-4xl font-bold text-gray-900 mb-2">Services & Produits</h1>
          <p class="text-gray-600">Gérez vos services et leurs produits associés</p>
        </div>
        <button
          @click="scrollToServiceForm"
          class="px-6 py-3 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Ajouter un Service
        </button>
      </div>

      <!-- ===================== SECTION SERVICES ===================== -->
      <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Liste des services</h2>

        <!-- Barre de recherche et filtres -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6">
          <div class="flex-1">
            <input
              v-model="serviceSearchQuery"
              type="text"
              placeholder="Rechercher par nom..."
              class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
            />
          </div>
          <select
            v-model="serviceFilterType"
            class="px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
          >
            <option value="all">Tous les types</option>
            <option value="pack">Pack</option>
            <option value="financial_solution">Solution financière</option>
          </select>
        </div>

        <!-- Tableau Services -->
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-if="filteredServices.length === 0">
                <td colspan="3" class="px-6 py-12 text-center text-gray-500">
                  <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                  </svg>
                  <p class="text-lg font-medium">Aucun service trouvé</p>
                  <p class="text-sm">Commencez par ajouter votre premier service</p>
                </td>
              </tr>
              <tr v-for="item in filteredServices" :key="item.id" class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                  <div class="text-sm font-medium text-gray-900">{{ item.name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    :class="item.type === 'pack' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800'"
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                  >
                    {{ item.type === 'pack' ? 'Pack' : 'Solution financière' }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex items-center gap-2">
                    <!-- Voir produits -->
                    <button
                      @click="selectService(item)"
                      class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors"
                      title="Voir les produits"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                      </svg>
                    </button>
                    <!-- Modifier -->
                    <button
                      @click="editService(item)"
                      class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                      title="Modifier"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </button>
                    <!-- Supprimer -->
                    <button
                      @click="deleteService(item.id)"
                      class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                      title="Supprimer"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Formulaire Service -->
      <div ref="serviceFormSection" class="bg-white rounded-2xl shadow-xl p-8 space-y-8 mb-8">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-xl font-bold text-gray-900">
              {{ isEditingService ? 'Modifier le service' : 'Ajouter un service' }}
            </h2>
            <p class="text-gray-600 mt-1">
              {{ isEditingService ? 'Modifiez les informations du service' : 'Renseignez les informations du nouveau service' }}
            </p>
          </div>
          <button
            v-if="isEditingService"
            @click="cancelEditService"
            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all font-semibold flex items-center gap-2"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Annuler la modification
          </button>
        </div>

        <!-- Nom -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">Nom du service</label>
          <input
            v-model="serviceForm.name"
            type="text"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg"
            placeholder="Ex: Pack Entreprise"
          />
        </div>

        <!-- Description -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">Description</label>
          <textarea
            v-model="serviceForm.description"
            rows="4"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
            placeholder="Description du service..."
          ></textarea>
        </div>

        <!-- Type -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">Type</label>
          <select
            v-model="serviceForm.type"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
          >
            <option value="" disabled>Sélectionnez un type</option>
            <option value="pack">Pack</option>
            <option value="financial_solution">Solution financière</option>
          </select>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t">
          <button
            @click="saveService"
            class="flex-1 px-6 py-3 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2"
          >
            {{ isEditingService ? 'Sauvegarder les modifications' : 'Ajouter le service' }}
          </button>
        </div>
      </div>

      <!-- ===================== SECTION PRODUITS ===================== -->
      <div v-if="selectedService" class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <div class="flex items-center justify-between mb-6">
          <div>
            <h2 class="text-xl font-bold text-gray-900">
              Produits du service : <span class="text-blue-600">{{ selectedService.name }}</span>
            </h2>
            <p class="text-gray-600 mt-1">
              {{ selectedService.type === 'pack' ? 'Pack' : 'Solution financière' }}
            </p>
          </div>
          <div class="flex items-center gap-3">
            <button
              @click="scrollToProductForm"
              class="px-4 py-2 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              Ajouter un Produit
            </button>
            <button
              @click="deselectService"
              class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all font-semibold"
            >
              Fermer
            </button>
          </div>
        </div>

        <!-- Tableau Produits -->
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Avantage</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Crédit</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dépôt à l'ouverture</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Section</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-if="products.length === 0">
                <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                  <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                  </svg>
                  <p class="text-lg font-medium">Aucun produit trouvé</p>
                  <p class="text-sm">Ajoutez un produit pour ce service</p>
                </td>
              </tr>
              <tr v-for="item in products" :key="item.id" class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                  <div class="text-sm font-medium text-gray-900">{{ item.name }}</div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-700 max-w-xs truncate">{{ item.advantage }}</div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-700 max-w-xs truncate">{{ item.credit_access }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ item.deposit_at_opening }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    :class="item.section === 'premium' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800'"
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                  >
                    {{ item.section === 'premium' ? 'Premium' : 'Ordinaire' }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex items-center gap-2">
                    <!-- Modifier -->
                    <button
                      @click="editProduct(item)"
                      class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                      title="Modifier"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </button>
                    <!-- Supprimer -->
                    <button
                      @click="deleteProduct(item.id)"
                      class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                      title="Supprimer"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Formulaire Produit -->
      <div v-if="selectedService" ref="productFormSection" class="bg-white rounded-2xl shadow-xl p-8 space-y-8">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-xl font-bold text-gray-900">
              {{ isEditingProduct ? 'Modifier le produit' : 'Ajouter un produit' }}
            </h2>
            <p class="text-gray-600 mt-1">
              {{ isEditingProduct ? 'Modifiez les informations du produit' : 'Renseignez les informations du nouveau produit' }}
              — Service : <span class="font-semibold text-blue-600">{{ selectedService.name }}</span>
            </p>
          </div>
          <button
            v-if="isEditingProduct"
            @click="cancelEditProduct"
            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all font-semibold flex items-center gap-2"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Annuler la modification
          </button>
        </div>

        <!-- Nom -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">Nom du produit</label>
          <input
            v-model="productForm.name"
            type="text"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg"
            placeholder="Ex: Woezon"
          />
        </div>

        <!-- Avantage -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">Avantage</label>
          <textarea
            v-model="productForm.advantage"
            rows="4"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
            placeholder="Avantages du produit..."
          ></textarea>
        </div>

        <!-- Credit -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">Crédit</label>
          <input
            v-model="productForm.credit_access"
            type="text"
            step="0.01"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg"
            placeholder="Ex: 5 000 000"
          />
        </div>
        <!-- Dépôt à l'ouverture -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">Dépôt à l'ouverture</label>
          <input
            v-model="productForm.deposit_at_opening"
            type="numeric"
            step="0.01"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg"
            placeholder="Ex: 500000"
          />
        </div>

        <!-- Section -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-3">Section</label>
          <select
            v-model="productForm.section"
            class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
          >
            <option value="ordinary">Ordinaire</option>
            <option value="premium">Premium</option>
          </select>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t">
          <button
            @click="saveProduct"
            class="flex-1 px-6 py-3 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2"
          >
            {{ isEditingProduct ? 'Sauvegarder les modifications' : 'Ajouter le produit' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted, nextTick } from 'vue'
import api from '../../utils/api'

// ==================== SERVICES ====================

const services = ref<any[]>([])
const serviceSearchQuery = ref('')
const serviceFilterType = ref('all')

const isEditingService = ref(false)
const editingServiceId = ref<number | null>(null)

const serviceForm = ref({
  name: '',
  description: '',
  type: '' as string,
})

const serviceFormSection = ref<HTMLElement | null>(null)

const filteredServices = computed(() => {
  return services.value.filter(s => {
    const matchesSearch = (s.name || '').toLowerCase().includes(serviceSearchQuery.value.toLowerCase())
    const matchesType = serviceFilterType.value === 'all' || s.type === serviceFilterType.value
    return matchesSearch && matchesType
  })
})

const fetchServices = async () => {
  try {
    const response = await api.get('/services?with_user=true')
    services.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur lors du chargement des services', error)
  }
}

const scrollToServiceForm = () => {
  serviceFormSection.value?.scrollIntoView({ behavior: 'smooth' })
}

const editService = (item: any) => {
  isEditingService.value = true
  editingServiceId.value = item.id
  serviceForm.value = {
    name: item.name || '',
    description: item.description || '',
    type: item.type || '',
  }
  scrollToServiceForm()
}

const cancelEditService = () => {
  isEditingService.value = false
  editingServiceId.value = null
  serviceForm.value = { name: '', description: '', type: '' }
}

const deleteService = async (id: number) => {
  if (!confirm('Êtes-vous sûr de vouloir supprimer ce service ?')) return

  try {
    await api.delete(`/services/${id}`)
    await fetchServices()
    if (editingServiceId.value === id) {
      cancelEditService()
    }
    if (selectedService.value?.id === id) {
      deselectService()
    }
    alert('Service supprimé avec succès')
  } catch (error) {
    console.error('Erreur lors de la suppression', error)
    alert('Erreur lors de la suppression')
  }
}

const saveService = async () => {
  if (!serviceForm.value.name || !serviceForm.value.description || !serviceForm.value.type) {
    alert('Veuillez remplir tous les champs obligatoires')
    return
  }

  const payload = {
    name: serviceForm.value.name,
    description: serviceForm.value.description,
    type: serviceForm.value.type,
  }

  try {
    if (isEditingService.value && editingServiceId.value) {
      await api.put(`/services/${editingServiceId.value}`, payload)
      alert('Service mis à jour avec succès !')
    } else {
      await api.post('/services', payload)
      alert('Service ajouté avec succès !')
    }

    cancelEditService()
    await fetchServices()
  } catch (error) {
    console.error("Erreur lors de l'appel de l'API", error)
    alert('Erreur lors de la sauvegarde')
  }
}

// ==================== SERVICE SELECTION ====================

const selectedService = ref<any | null>(null)

const selectService = async (item: any) => {
  selectedService.value = item
  await fetchProducts()
}

const deselectService = () => {
  selectedService.value = null
  products.value = []
  cancelEditProduct()
}

// ==================== PRODUITS ====================

const products = ref<any[]>([])

const isEditingProduct = ref(false)
const editingProductId = ref<number | null>(null)

const productForm = ref({
  name: '',
  advantage: '',
  credit_access: '',
  deposit_at_opening: '' as string | number,
  section: 'ordinary' as string,
})

const productFormSection = ref<HTMLElement | null>(null)

const fetchProducts = async () => {
  if (!selectedService.value) return
  try {
    const response = await api.get(`/service_products?service_id=${selectedService.value.id}`)
    products.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur lors du chargement des produits', error)
  }
}

const scrollToProductForm = () => {
  nextTick(() => {
    productFormSection.value?.scrollIntoView({ behavior: 'smooth' })
  })
}

const editProduct = (item: any) => {
  isEditingProduct.value = true
  editingProductId.value = item.id
  productForm.value = {
    name: item.name || '',
    advantage: item.advantage || '',
    credit_access: item.credit_access || '',
    deposit_at_opening: item.deposit_at_opening ?? '',
    section: item.section || 'ordinary',
  }
  scrollToProductForm()
}

const cancelEditProduct = () => {
  isEditingProduct.value = false
  editingProductId.value = null
    productForm.value = { name: '', advantage: '', credit_access: '', deposit_at_opening: '', section: 'ordinary' }
}

const deleteProduct = async (id: number) => {
  if (!confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) return

  try {
    await api.delete(`/service_products/${id}`)
    await fetchProducts()
    if (editingProductId.value === id) {
      cancelEditProduct()
    }
    alert('Produit supprimé avec succès')
  } catch (error) {
    console.error('Erreur lors de la suppression', error)
    alert('Erreur lors de la suppression')
  }
}

const saveProduct = async () => {
  if (!productForm.value.name || !productForm.value.advantage ) {
    alert('Veuillez remplir tous les champs obligatoires')
    return
  }

  const payload = {
    name: productForm.value.name,
    advantage: productForm.value.advantage,
    credit_access: productForm.value.credit_access,
    deposit_at_opening: productForm.value.deposit_at_opening,
    section: productForm.value.section,
    service_id: selectedService.value.id,
  }

  try {
    if (isEditingProduct.value && editingProductId.value) {
      await api.put(`/service_products/${editingProductId.value}`, payload)
      alert('Produit mis à jour avec succès !')
    } else {
      await api.post('/service_products', payload)
      alert('Produit ajouté avec succès !')
    }

    cancelEditProduct()
    await fetchProducts()
  } catch (error) {
    console.error("Erreur lors de l'appel de l'API", error)
    alert('Erreur lors de la sauvegarde')
  }
}

// ==================== INIT ====================

onMounted(() => {
  fetchServices()
})
</script>
