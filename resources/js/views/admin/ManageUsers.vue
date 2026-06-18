<template>
  <div class="min-h-screen bg-linear-to-br from-gray-50 to-gray-100 py-12 px-4">
    <div class="max-w-5xl mx-auto">
      <!-- En-tête -->
      <div class="mb-8 flex items-center justify-between">
        <div>
          <h1 class="text-4xl font-bold text-gray-900 mb-2">Gestion des utilisateurs</h1>
          <p class="text-gray-600">Gérez, créez et modifiez les comptes utilisateurs</p>
        </div>
        <button
          @click="scrollToForm"
          class="px-6 py-3 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Ajouter un utilisateur
        </button>
      </div>

      <!-- Section Tableau des utilisateurs -->
      <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Liste des utilisateurs</h2>

        <!-- Barre de recherche et filtres -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6">
          <div class="flex-1">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Rechercher par nom ou email..."
              class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
            />
          </div>
          <select
            v-model="filterProfile"
            class="px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
          >
            <option value="all">Tous les profils</option>
            <option value="admin">Admin</option>
            <option value="rh">RH</option>
            <option value="marketing">Marketing</option>
          </select>
          <select
            v-model="filterStatus"
            class="px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
          >
            <option value="all">Tous les statuts</option>
            <option value="activated">Activé</option>
            <option value="deactivated">Désactivé</option>
          </select>
        </div>

        <!-- Tableau -->
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profil</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <!-- État vide -->
              <tr v-if="filteredUsers.length === 0">
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                  <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                  <p class="text-lg font-medium">Aucun utilisateur trouvé</p>
                  <p class="text-sm">Commencez par ajouter votre premier utilisateur</p>
                </td>
              </tr>
              <!-- Lignes du tableau -->
              <tr v-for="u in filteredUsers" :key="u.id" class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">{{ u.name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ u.email }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span :class="profileBadgeClass(u.profile)" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                    {{ u.profile_fr }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    :class="u.activated ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'"
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                  >
                    {{ u.activated ? 'Activé' : 'Désactivé' }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex items-center gap-2">
                    <!-- Modifier -->
                    <button
                      @click="editUser(u)"
                      class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                      title="Modifier"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </button>
                    <!-- Supprimer -->
                    <button
                      @click="deleteUser(u.id)"
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

      <!-- Section Formulaire -->
      <div ref="formSection" class="bg-white rounded-2xl shadow-xl p-8 space-y-8">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-xl font-bold text-gray-900">
              {{ isEditing ? 'Modifier l\'utilisateur' : 'Ajouter un utilisateur' }}
            </h2>
            <p class="text-gray-600 mt-1">
              {{ isEditing ? 'Modifiez les informations de l\'utilisateur' : 'Renseignez les informations du nouvel utilisateur' }}
            </p>
          </div>
          <button
            v-if="isEditing"
            @click="cancelEdit"
            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all font-semibold flex items-center gap-2"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Annuler la modification
          </button>
        </div>

        <!-- Messages d'erreur -->
        <div v-if="formErrors.length > 0" class="bg-red-50 border border-red-200 rounded-xl p-4">
          <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
            <li v-for="(error, idx) in formErrors" :key="idx">{{ error }}</li>
          </ul>
        </div>

        <!-- Nom et Email -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">
              Nom
            </label>
            <input
              v-model="form.name"
              type="text"
              class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg"
              placeholder="Ex: Jean Dupont"
            />
          </div>
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">
              Email
            </label>
            <input
              v-model="form.email"
              type="email"
              class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg"
              placeholder="Ex: jean.dupont@cofina.com"
            />
          </div>
        </div>

        <!-- Mot de passe et Profil -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">
              Mot de passe
              <span v-if="isEditing" class="text-gray-400 font-normal">(laisser vide pour ne pas changer)</span>
            </label>
            <input
              v-model="form.password"
              type="password"
              class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-lg"
              placeholder="Minimum 8 caractères"
            />
          </div>
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">
              Profil
            </label>
            <select
              v-model="form.profile"
              class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
            >
              <option value="" disabled>Sélectionnez un profil</option>
              <option value="admin">Administrateur</option>
              <option value="rh">Ressources Humaines</option>
              <option value="marketing">Marketing</option>
              <option value="cc">Chargé clientèle</option>
            </select>
          </div>
        </div>

        <!-- Toggles -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <!-- Activé -->
          <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
            <div>
              <p class="text-sm font-semibold text-gray-700">Compte activé</p>
              <p class="text-xs text-gray-500">L'utilisateur pourra se connecter</p>
            </div>
            <button
              @click="form.activated = !form.activated"
              :class="form.activated ? 'bg-green-500' : 'bg-gray-300'"
              class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors"
            >
              <span
                :class="form.activated ? 'translate-x-6' : 'translate-x-1'"
                class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform"
              />
            </button>
          </div>

          <!-- Changement MDP requis -->
          <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
            <div>
              <p class="text-sm font-semibold text-gray-700">Changement de mot de passe requis</p>
              <p class="text-xs text-gray-500">Forcer le changement à la prochaine connexion</p>
            </div>
            <button
              @click="form.password_change_required = !form.password_change_required"
              :class="form.password_change_required ? 'bg-green-500' : 'bg-gray-300'"
              class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors"
            >
              <span
                :class="form.password_change_required ? 'translate-x-6' : 'translate-x-1'"
                class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform"
              />
            </button>
          </div>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t">
          <button
            @click="saveUser"
            class="flex-1 px-6 py-3 bg-primary text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            {{ isEditing ? 'Sauvegarder les modifications' : 'Ajouter l\'utilisateur' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import api from '../../utils/api'

// État de la liste
const users = ref<any[]>([])
const searchQuery = ref('')
const filterProfile = ref('all')
const filterStatus = ref('all')

// État du formulaire
const isEditing = ref(false)
const editingId = ref<number | null>(null)
const formErrors = ref<string[]>([])

const form = ref({
  name: '',
  email: '',
  password: '',
  profile: '',
  profile_fr: '',
  activated: true,
  password_change_required: true
})

const formSection = ref<HTMLElement | null>(null)




const profileBadgeClass = (profile: string) => {
  const classes: Record<string, string> = {
    admin: 'bg-purple-100 text-purple-800',
    rh: 'bg-blue-100 text-blue-800',
    marketing: 'bg-orange-100 text-orange-800'
  }
  return classes[profile] || 'bg-gray-100 text-gray-800'
}

// Computed pour filtrer les utilisateurs
const filteredUsers = computed(() => {
  return users.value.filter(u => {
    const query = searchQuery.value.toLowerCase()
    const matchesSearch = u.name.toLowerCase().includes(query) || u.email.toLowerCase().includes(query)
    const matchesProfile = filterProfile.value === 'all' || u.profile === filterProfile.value
    const matchesStatus =
      filterStatus.value === 'all' ||
      (filterStatus.value === 'activated' && u.activated) ||
      (filterStatus.value === 'deactivated' && !u.activated)
    return matchesSearch && matchesProfile && matchesStatus
  })
})

// Charger la liste des utilisateurs
const fetchUsers = async () => {
  try {
    const response = await api.get('/users')
    users.value = response.data.data || response.data
  } catch (error) {
    console.error('Erreur lors du chargement des utilisateurs', error)
  }
}

// Scroller vers le formulaire
const scrollToForm = () => {
  formSection.value?.scrollIntoView({ behavior: 'smooth' })
}

// Passer en mode édition
const editUser = (item: any) => {
  isEditing.value = true
  editingId.value = item.id
  formErrors.value = []
  form.value = {
    name: item.name || '',
    email: item.email || '',
    password: '',
    profile: item.profile || '',
    profile_fr: item.profile || '',
    activated: !!item.activated,
    password_change_required: !!item.password_change_required
  }
  scrollToForm()
}

// Annuler l'édition
const cancelEdit = () => {
  isEditing.value = false
  editingId.value = null
  formErrors.value = []
  form.value = {
    name: '',
    email: '',
    password: '',
    profile: '',
    profile_fr: '',
    activated: true,
    password_change_required: true
  }
}

// Supprimer un utilisateur
const deleteUser = async (id: number) => {
  if (!confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) return

  try {
    await api.delete(`/users/${id}`)
    await fetchUsers()
    if (editingId.value === id) {
      cancelEdit()
    }
    alert('Utilisateur supprimé avec succès')
  } catch (error) {
    console.error('Erreur lors de la suppression', error)
    alert('Erreur lors de la suppression')
  }
}

// Sauvegarder (créer ou mettre à jour)
const saveUser = async () => {
  formErrors.value = []

  // Validation côté client
  if (!form.value.name) formErrors.value.push('Le nom est requis')
  if (!form.value.email) formErrors.value.push('L\'email est requis')
  if (!form.value.profile) formErrors.value.push('Le profil est requis')
  if (!isEditing.value && !form.value.password) formErrors.value.push('Le mot de passe est requis')
  if (form.value.password && form.value.password.length < 8) formErrors.value.push('Le mot de passe doit contenir au moins 8 caractères')

  if (formErrors.value.length > 0) return

  const payload: any = {
    name: form.value.name,
    email: form.value.email,
    profile: form.value.profile,
    activated: form.value.activated,
    password_change_required: form.value.password_change_required
  }

  if (form.value.password) {
    payload.password = form.value.password
  }

  try {
    if (isEditing.value && editingId.value) {
      await api.put(`/users/${editingId.value}`, payload)
      alert('Utilisateur mis à jour avec succès !')
    } else {
      await api.post('/users', payload)
      alert('Utilisateur ajouté avec succès !')
    }

    cancelEdit()
    await fetchUsers()
  } catch (error: any) {
    console.error("Erreur lors de l'appel de l'API", error)
    if (error.response?.data?.errors) {
      const serverErrors = error.response.data.errors
      formErrors.value = Object.values(serverErrors).flat() as string[]
    } else {
      alert('Erreur lors de la sauvegarde')
    }
  }
}

// Charger les utilisateurs au montage
onMounted(() => {
  fetchUsers()
})
</script>
