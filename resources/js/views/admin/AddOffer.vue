<template>
  <div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold text-gray-900">Gestion des Offres d'Emploi</h1>
        <p class="text-sm text-gray-500 mt-1">Créez et gérez vos offres de recrutement</p>
      </div>
      <button
        @click="showModal = true"
        class="px-4 py-2 bg-primary hover:bg-blue-700 text-white font-medium rounded-lg transition-colors flex items-center gap-2 shadow-sm"
      >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Nouvelle offre
      </button>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
      <div class="bg-background/4 rounded-lg shadow-sm p-5 border border-gray-200">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-background">Total offres</p>
            <p class="text-2xl font-bold text-background mt-1">{{ jobOffers.length }}</p>
          </div>
          <div class="w-12 h-12 bg-primary/8 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-background/4 rounded-lg shadow-sm p-5 border border-gray-200">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Actives</p>
            <p class="text-2xl font-bold text-green-300 mt-1">{{ activeOffers }}</p>
          </div>
          <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-background/4 rounded-lg shadow-sm p-5 border border-gray-200">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Fermées</p>
            <p class="text-2xl font-bold text-gray-700 mt-1">{{ closedOffers }}</p>
          </div>
          <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-background/4 rounded-lg shadow-sm p-5 border border-gray-200">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Ce mois-ci</p>
            <p class="text-2xl font-bold text-purple-600 mt-1">5</p>
          </div>
          <div class="w-12 h-12 bg-purple-200 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
        </div>
      </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-200">
      <div class="flex flex-col md:flex-row gap-4">
        <div class="flex-1">
          <input
            v-model="searchQuery"
            type="text"
            placeholder="Rechercher une offre..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
          />
        </div>
        <select
          v-model="filterStatus"
          class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        >
          <option value="all">Tous les statuts</option>
          <option value="active">Active</option>
          <option value="closed">Fermée</option>
        </select>
        <select
          v-model="filterType"
          class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        >
          <option value="all">Tous les types</option>
          <option value="CDI">CDI</option>
          <option value="CDD">CDD</option>
          <option value="Stage">Stage</option>
          <option value="Freelance">Freelance</option>
        </select>
      </div>
    </div>

    <!-- Job Offers List -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Poste
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Type
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Localisation
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Expérience
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Statut
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date de publication
              </th>
              <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-if="filteredJobOffers.length === 0">
              <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <p class="text-lg font-medium">Aucune offre d'emploi</p>
                <p class="text-sm mt-1">Créez votre première offre pour commencer</p>
              </td>
            </tr>
            <tr v-for="job in filteredJobOffers" :key="job.id" class="hover:bg-gray-50 transition-colors">
              <td class="px-6 py-4">
                <div>
                  <div class="text-sm font-medium text-gray-900">{{ job.title }}</div>
                  <div class="text-sm text-gray-500">{{ job.department }}</div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="getTypeClass(job.type)" class="px-2 py-1 text-xs font-medium rounded-full">
                  {{ job.type }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center text-sm text-gray-900">
                  <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  {{ job.location }}
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                {{ job.experience }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="getStatusClass(job.status)" class="px-2 py-1 text-xs font-medium rounded-full">
                  {{ job.status === 'active' ? 'Active' : 'Fermée' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ formatDate(job.publishedDate) }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex items-center justify-end gap-2">
                  <button
                    @click="viewJob(job)"
                    class="text-blue-600 hover:text-blue-900 transition-colors"
                    title="Voir"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                  </button>
                  <button
                    @click="editJob(job)"
                    class="text-green-600 hover:text-green-900 transition-colors"
                    title="Modifier"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </button>
                  <button
                    @click="toggleStatus(job)"
                    :class="job.status === 'active' ? 'text-gray-600 hover:text-gray-900' : 'text-green-600 hover:text-green-900'"
                    class="transition-colors"
                    :title="job.status === 'active' ? 'Fermer' : 'Réactiver'"
                  >
                    <svg v-if="job.status === 'active'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                    <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </button>
                  <button
                    @click="deleteJob(job.id)"
                    class="text-red-600 hover:text-red-900 transition-colors"
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

    <!-- Create/Edit Job Modal -->
    <Teleport to="body">
      <Transition name="modal">
        <div v-if="showModal" class="fixed inset-0 z-50 overflow-y-auto">
          <div class="flex min-h-screen items-center justify-center p-4">
            <div @click="closeModal" class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>

            <div class="relative bg-white rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
              <!-- Modal Header -->
              <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between z-10">
                <h2 class="text-xl font-bold text-gray-900">
                  {{ isEditing ? 'Modifier l\'offre' : 'Créer une nouvelle offre' }}
                </h2>
                <button @click="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>

              <!-- Modal Form -->
              <form @submit.prevent="saveJob" class="p-6 space-y-6">

                <!-- Section: Informations générales -->
                <div class="space-y-4">
                  <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Informations générales
                  </h3>

                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Titre du poste -->
                    <div class="md:col-span-2">
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Titre du poste <span class="text-red-500">*</span>
                      </label>
                      <input
                        v-model="form.title"
                        type="text"
                        required
                        placeholder="Ex: Développeur Full Stack Senior"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      />
                    </div>

                    <!-- Département -->
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Département <span class="text-red-500">*</span>
                      </label>
                      <input
                        v-model="form.department"
                        type="text"
                        required
                        placeholder="Ex: IT, Marketing, RH..."
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      />
                    </div>

                    <!-- Type de contrat -->
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Type de contrat <span class="text-red-500">*</span>
                      </label>
                      <select
                        v-model="form.type"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      >
                        <option value="">Sélectionner</option>
                        <option value="CDI">CDI</option>
                        <option value="CDD">CDD</option>
                        <option value="Stage">Stage</option>
                        <option value="Freelance">Freelance</option>
                      </select>
                    </div>

                    <!-- Localisation -->
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Localisation <span class="text-red-500">*</span>
                      </label>
                      <input
                        v-model="form.location"
                        type="text"
                        required
                        placeholder="Ex: Lomé, Togo"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      />
                    </div>

                    <!-- Expérience requise -->
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Expérience requise <span class="text-red-500">*</span>
                      </label>
                      <input
                        v-model="form.experience"
                        type="text"
                        required
                        placeholder="Ex: 3-5 ans, Débutant accepté..."
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      />
                    </div>
                  </div>
                </div>

                <div class="border-t border-gray-200"></div>

                <!-- Section: Description du poste -->
                <div class="space-y-4">
                  <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Description du poste
                  </h3>

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Missions et responsabilités <span class="text-red-500">*</span>
                    </label>
                    <textarea
                      v-model="form.description"
                      required
                      rows="5"
                      placeholder="Décrivez les missions principales, les responsabilités et les objectifs du poste..."
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                    ></textarea>
                  </div>
                </div>

                <div class="border-t border-gray-200"></div>

                <!-- Section: Compétences requises -->
                <div class="space-y-4">
                  <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                    Compétences requises
                  </h3>

                  <div class="space-y-2">
                    <div v-for="(skill, index) in form.skills" :key="index" class="flex gap-2">
                      <input
                        v-model="form.skills[index]"
                        type="text"
                        placeholder="Ex: Vue.js, Communication, Gestion de projet..."
                        class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      />
                      <button
                        v-if="form.skills.length > 1"
                        @click="removeSkill(index)"
                        type="button"
                        class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                      >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </div>
                    <button
                      @click="addSkill"
                      type="button"
                      class="text-sm text-blue-600 hover:text-blue-700 font-medium flex items-center gap-1"
                    >
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                      </svg>
                      Ajouter une compétence
                    </button>
                  </div>
                </div>

                <div class="border-t border-gray-200"></div>

                <!-- Section: Avantages -->
                <div class="space-y-4">
                  <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                    </svg>
                    Avantages et rémunération
                  </h3>

                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Salaire -->
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Fourchette salariale
                      </label>
                      <input
                        v-model="form.salary"
                        type="text"
                        placeholder="Ex: 500 000 - 800 000 FCFA"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      />
                    </div>

                    <!-- Date limite -->
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Date limite de candidature
                      </label>
                      <input
                        v-model="form.deadline"
                        type="date"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      />
                    </div>
                  </div>

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Avantages proposés
                    </label>
                    <textarea
                      v-model="form.benefits"
                      rows="3"
                      placeholder="Ex: Assurance santé, tickets restaurant, télétravail, formation continue..."
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                    ></textarea>
                  </div>
                </div>

                <div class="border-t border-gray-200"></div>

                <!-- Section: Statut -->
                <div class="space-y-4">
                  <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Publication
                  </h3>

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                      Statut de l'offre
                    </label>
                    <div class="flex gap-4">
                      <label class="flex items-center cursor-pointer px-4 py-3 border-2 rounded-lg transition-colors"
                        :class="form.status === 'active' ? 'border-green-500 bg-green-50' : 'border-gray-300 hover:border-gray-400'"
                      >
                        <input
                          v-model="form.status"
                          type="radio"
                          value="active"
                          class="w-4 h-4 text-green-600 focus:ring-green-500"
                        />
                        <span class="ml-3 flex items-center gap-2">
                          <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                          <span class="text-sm font-medium text-gray-900">Active</span>
                        </span>
                      </label>
                      <label class="flex items-center cursor-pointer px-4 py-3 border-2 rounded-lg transition-colors"
                        :class="form.status === 'closed' ? 'border-gray-500 bg-gray-50' : 'border-gray-300 hover:border-gray-400'"
                      >
                        <input
                          v-model="form.status"
                          type="radio"
                          value="closed"
                          class="w-4 h-4 text-gray-600 focus:ring-gray-500"
                        />
                        <span class="ml-3 flex items-center gap-2">
                          <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                          <span class="text-sm font-medium text-gray-900">Fermée</span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-3 pt-6 border-t border-gray-200">
                  <button
                    type="button"
                    @click="closeModal"
                    class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors"
                  >
                    Annuler
                  </button>
                  <button
                    type="submit"
                    class="flex-1 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-sm"
                  >
                    {{ isEditing ? 'Mettre à jour' : 'Créer l\'offre' }}
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </Transition>
    </Teleport>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'

interface JobOffer {
  id: number
  title: string
  department: string
  type: 'CDI' | 'CDD' | 'Stage' | 'Freelance'
  location: string
  experience: string
  description: string
  skills: string[]
  salary?: string
  benefits?: string
  deadline?: string
  status: 'active' | 'closed'
  publishedDate: string
}

// State
const showModal = ref(false)
const isEditing = ref(false)
const editingId = ref<number | null>(null)
const searchQuery = ref('')
const filterStatus = ref('all')
const filterType = ref('all')

// Form data
const form = ref({
  title: '',
  department: '',
  type: '' as JobOffer['type'],
  location: '',
  experience: '',
  description: '',
  skills: [''],
  salary: '',
  benefits: '',
  deadline: '',
  status: 'active' as 'active' | 'closed'
})

// Sample data
const jobOffers = ref<JobOffer[]>([
  {
    id: 1,
    title: 'Développeur Full Stack',
    department: 'IT',
    type: 'CDI',
    location: 'Lomé, Togo',
    experience: '3-5 ans',
    description: 'Nous recherchons un développeur full stack expérimenté...',
    skills: ['Vue.js', 'Node.js', 'PostgreSQL', 'Docker'],
    salary: '500 000 - 800 000 FCFA',
    benefits: 'Assurance santé, télétravail partiel',
    deadline: '2026-02-28',
    status: 'active',
    publishedDate: '2026-01-15'
  },
  {
    id: 2,
    title: 'Chef de Projet Digital',
    department: 'Marketing',
    type: 'CDI',
    location: 'Lomé, Togo',
    experience: '5+ ans',
    description: 'Pilotage de projets digitaux...',
    skills: ['Gestion de projet', 'Marketing digital', 'Agile'],
    salary: '700 000 - 1 200 000 FCFA',
    benefits: 'Véhicule de fonction, primes',
    status: 'active',
    publishedDate: '2026-01-10'
  },
  {
    id: 3,
    title: 'Designer UI/UX',
    department: 'Design',
    type: 'Stage',
    location: 'Lomé, Togo',
    experience: 'Débutant accepté',
    description: 'Stage de 6 mois en design...',
    skills: ['Figma', 'Adobe XD', 'Prototyping'],
    salary: '100 000 FCFA',
    deadline: '2026-02-15',
    status: 'closed',
    publishedDate: '2025-12-20'
  }
])

// Computed
const filteredJobOffers = computed(() => {
  return jobOffers.value.filter(job => {
    const matchesSearch = job.title.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                         job.department.toLowerCase().includes(searchQuery.value.toLowerCase())
    const matchesStatus = filterStatus.value === 'all' || job.status === filterStatus.value
    const matchesType = filterType.value === 'all' || job.type === filterType.value

    return matchesSearch && matchesStatus && matchesType
  })
})

const activeOffers = computed(() => jobOffers.value.filter(j => j.status === 'active').length)
const closedOffers = computed(() => jobOffers.value.filter(j => j.status === 'closed').length)

// Methods
const resetForm = () => {
  form.value = {
    title: '',
    department: '',
    type: '' as JobOffer['type'],
    location: '',
    experience: '',
    description: '',
    skills: [''],
    salary: '',
    benefits: '',
    deadline: '',
    status: 'active'
  }
}

const closeModal = () => {
  showModal.value = false
  isEditing.value = false
  editingId.value = null
  resetForm()
}

const saveJob = () => {
  if (isEditing.value && editingId.value !== null) {
    const index = jobOffers.value.findIndex(j => j.id === editingId.value)
    if (index !== -1) {
      jobOffers.value[index] = {
        ...jobOffers.value[index],
        ...form.value,
        skills: form.value.skills.filter(s => s.trim() !== '')
      }
    }
  } else {
    const newJob: JobOffer = {
      id: Date.now(),
      ...form.value,
      skills: form.value.skills.filter(s => s.trim() !== ''),
      publishedDate: new Date().toISOString().split('T')[0]
    }
    jobOffers.value.unshift(newJob)
  }

  closeModal()
}

const viewJob = (job: JobOffer) => {
  // Afficher les détails (vous pouvez créer un autre modal)
  alert(`Voir les détails de: ${job.title}`)
}

const editJob = (job: JobOffer) => {
  isEditing.value = true
  editingId.value = job.id
  form.value = {
    title: job.title,
    department: job.department,
    type: job.type,
    location: job.location,
    experience: job.experience,
    description: job.description,
    skills: [...job.skills],
    salary: job.salary || '',
    benefits: job.benefits || '',
    deadline: job.deadline || '',
    status: job.status
  }
  showModal.value = true
}

const deleteJob = (id: number) => {
  if (confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')) {
    const index = jobOffers.value.findIndex(j => j.id === id)
    if (index !== -1) {
      jobOffers.value.splice(index, 1)
    }
  }
}

const toggleStatus = (job: JobOffer) => {
  job.status = job.status === 'active' ? 'closed' : 'active'
}

const addSkill = () => {
  form.value.skills.push('')
}

const removeSkill = (index: number) => {
  form.value.skills.splice(index, 1)
}

const getTypeClass = (type: string) => {
  const classes = {
    'CDI': 'bg-blue-100 text-blue-800',
    'CDD': 'bg-purple-100 text-purple-800',
    'Stage': 'bg-yellow-100 text-yellow-800',
    'Freelance': 'bg-green-100 text-green-800'
  }
  return classes[type as keyof typeof classes] || 'bg-gray-100 text-gray-800'
}

const getStatusClass = (status: string) => {
  return status === 'active'
    ? 'bg-green-100 text-green-800'
    : 'bg-gray-100 text-gray-800'
}

const formatDate = (dateString: string) => {
  const date = new Date(dateString)
  return new Intl.DateTimeFormat('fr-FR', {
    day: '2-digit',
    month: 'short',
    year: 'numeric'
  }).format(date)
}
</script>

<style scoped>
.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}
</style>
