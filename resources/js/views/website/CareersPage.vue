<script setup lang="ts">
import { ref, onMounted, computed } from 'vue';
import { PcCaseIcon, SendHorizonalIcon, CalendarIcon, BriefcaseIcon, XIcon } from 'lucide-vue-next';
import CandidatureModal from '../../components/career/CandidatureModal.vue';
import api from '../../utils/api';

interface JobOffer {
  id: number;
  title: string;
  content: string;
  summary: string;
  form_link: string;
  deadline: string;
  type: 'cdi' | 'cdd' | 'stage';
  status: 'active' | 'blocked';
  created_at: string;
}

const activeTab = ref('offers');
const isModalOpen = ref(false);
const isLoading = ref(true);
const jobs = ref<JobOffer[]>([]);
const selectedJob = ref<JobOffer | null>(null);

// Récupérer uniquement les offres actives
const activeJobs = computed(() => jobs.value.filter(job => job.status === 'active'));

const fetchJobOffers = async () => {
  isLoading.value = true;
  try {
    const response = await api.get('/job_offers');
    const data = response.data.data || response.data;
    // Filtrer côté client aussi pour être sûr
    jobs.value = Array.isArray(data) ? data.filter((job: JobOffer) => job.status === 'active') : [];
  } catch (error) {
    console.error('Erreur lors du chargement des offres', error);
    jobs.value = [];
  } finally {
    isLoading.value = false;
  }
};

const formatDate = (dateString: string) => {
  if (!dateString) return '';
  const date = new Date(dateString);
  return new Intl.DateTimeFormat('fr-FR', {
    day: '2-digit',
    month: 'long',
    year: 'numeric'
  }).format(date);
};

const getTypeLabel = (type: string) => {
  const labels: Record<string, string> = {
    'cdi': 'CDI',
    'cdd': 'CDD',
    'stage': 'Stage'
  };
  return labels[type] || type.toUpperCase();
};

const getTypeClass = (type: string) => {
  const classes: Record<string, string> = {
    'cdi': 'bg-blue-100 text-blue-800',
    'cdd': 'bg-purple-100 text-purple-800',
    'stage': 'bg-yellow-100 text-yellow-800'
  };
  return classes[type] || 'bg-gray-100 text-gray-800';
};

const viewJobDetails = (job: JobOffer) => {
  selectedJob.value = job;
};

const closeJobDetails = () => {
  selectedJob.value = null;
};

onMounted(() => {
  fetchJobOffers();
});
</script>


<template>
  <main class="min-h-screen bg-white">
     <section class="relative h-[500px] bg-[#333] flex items-center">
      <div class="absolute inset-0">
        <img src="../../assets/images/career/PROUDLY COFINOIS.png" alt="Produits COFINA" class="w-full h-full object-cover" />
      </div>
      <div class="container mx-auto px-6 relative z-10">

      </div>
    </section>

    <section class="relative z-30 -mt-16 mb-20">
      <div class="container mx-auto px-4 flex justify-center gap-6">
        <button
          @click="activeTab = 'offers'"
          :class="activeTab === 'offers' ? 'bg-primary text-white' : 'bg-white text-gray-500'"
          class="w-64 py-8 rounded-2xl shadow-2xl transition-all flex flex-col items-center gap-2 group"
        >
          <span class="text-xl"><PcCaseIcon/></span>
          <span class="font-bold text-lg uppercase">Nos offres</span>
        </button>

        <button
          @click="isModalOpen = true"
          class="w-64 py-8 rounded-2xl bg-white text-gray-500 shadow-2xl hover:bg-gray-50 transition-all flex flex-col items-center gap-2"
        >
          <span class="text-xl text-primary"><SendHorizonalIcon/> </span>
          <span class="font-bold text-lg uppercase">Candidature spontanée</span>
        </button>

    <!--     <button
          @click="isModalOpen = true"
          class="w-64 py-8 rounded-2xl bg-white text-gray-500 shadow-2xl hover:bg-gray-50 transition-all flex flex-col items-center gap-2"
        >
          <span class="text-xl text-primary"><SendHorizonalIcon/> </span>
          <span class="font-bold text-lg uppercase">Campagne de recrutement</span>
        </button> -->
      </div>
    </section>

    <section class="container mx-auto px-6 pb-20">
      <!-- Loading state -->
      <div v-if="isLoading" class="flex justify-center items-center py-20">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary"></div>
      </div>

      <!-- Empty state -->
      <div v-else-if="activeJobs.length === 0" class="text-center py-20">
        <BriefcaseIcon class="w-16 h-16 mx-auto text-gray-300 mb-4" />
        <h3 class="text-xl font-bold text-gray-600 mb-2">Aucune offre disponible</h3>
        <p class="text-gray-500">Revenez bientôt pour découvrir nos nouvelles opportunités.</p>
      </div>

      <!-- Job offers grid -->
      <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div v-for="job in activeJobs" :key="job.id"
             class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden flex flex-col hover:shadow-xl transition-shadow">
          <div class="p-8">
            <div class="flex items-center gap-2 mb-4">
              <span :class="getTypeClass(job.type)" class="px-3 py-1 text-xs font-bold rounded-full">
                {{ getTypeLabel(job.type) }}
              </span>
            </div>
            <h3 class="text-xl font-black text-gray-700 uppercase mb-4">{{ job.title }}</h3>
            <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">
              {{ job.summary }}
            </p>
            <button
              @click="viewJobDetails(job)"
              class="text-primary text-sm font-bold underline underline-offset-4 hover:text-secondary transition-colors cursor-pointer"
            >
              Lire la suite →
            </button>
          </div>
          <div class="mt-auto bg-gray-50 border-t px-8 py-3 flex items-center justify-between">
            <div class="flex items-center gap-2 text-xs text-gray-400 font-bold">
              <CalendarIcon class="w-4 h-4" />
              <span>Date limite: {{ formatDate(job.deadline) }}</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <Teleport to="body">
      <CandidatureModal :is-open="isModalOpen" @close="isModalOpen = false" />
    </Teleport>

    <!-- Job Details Modal -->
    <Teleport to="body">
      <Transition name="modal">
        <div v-if="selectedJob" class="fixed inset-0 z-50 overflow-y-auto">
          <div class="flex min-h-screen items-center justify-center p-4">
            <div @click="closeJobDetails" class="fixed inset-0 bg-black/50 bg-opacity-50 transition-opacity"></div>

            <div class="relative bg-white rounded-2xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
              <!-- Modal Header -->
              <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between z-10 rounded-t-2xl">
                <div class="flex items-center gap-3">
                  <span :class="getTypeClass(selectedJob.type)" class="px-3 py-1 text-xs font-bold rounded-full">
                    {{ getTypeLabel(selectedJob.type) }}
                  </span>
                  <span class="text-sm text-gray-500">
                    Date limite: {{ formatDate(selectedJob.deadline) }}
                  </span>
                </div>
                <button @click="closeJobDetails" class="text-gray-400 hover:text-gray-600 transition-colors">
                  <XIcon class="w-6 h-6" />
                </button>
              </div>

              <!-- Modal Content -->
              <div class="p-8">
                <h2 class="text-2xl font-black text-gray-800 uppercase mb-4">{{ selectedJob.title }}</h2>

                <div class="bg-primary/5 rounded-lg p-4 mb-6">
                  <p class="text-gray-700 font-medium">{{ selectedJob.summary }}</p>
                </div>

                <div class="prose prose-gray max-w-none">
                  <h3 class="text-lg font-bold text-gray-800 mb-3">Description du poste</h3>
                  <div class="text-gray-600 whitespace-pre-wrap leading-relaxed">{{ selectedJob.content }}</div>
                </div>

                <!-- Apply Button -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <a
                        :href="selectedJob.form_link"
                        target="_blank"
                        rel="noopener noreferrer"
                        @click="closeJobDetails"
                        class="w-full bg-primary hover:bg-secondary text-white font-bold py-4 px-6 rounded-xl transition-colors flex items-center justify-center gap-2"
                        >
                        <SendHorizonalIcon class="w-5 h-5" />
                        Postuler à cette offre
                    </a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </Transition>
    </Teleport>
  </main>
</template>

<style scoped>
.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
