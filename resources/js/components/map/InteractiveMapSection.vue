<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { Search, MapPin } from 'lucide-vue-next'

// Déclaration du type google
// eslint-disable-next-line @typescript-eslint/no-explicit-any
declare const google: any

// Interface pour les agences
interface Agency {
  id: number
  name: string
  address: string
  phone: string
  email: string
  website: string
  lat: number
  lng: number
}

// Données des agences Cofina
const agencies = ref<Agency[]>([
  {
    id: 1,
    name: 'COFINA OSCARS',
    address: '2 Plateaux Les Oscars',
    phone: '+225 27 22 41 36 62',
    email: 'service-client.cac@cofinacorp.com',
    website: 'www.cofinacotedivoire.com',
    lat: 5.3599517,
    lng: -4.0082563
  },
  {
    id: 2,
    name: 'COFINA AGHIEN',
    address: '2 Plateaux Aghien',
    phone: '+225 27 22 41 36 62',
    email: 'service-client.cac@cofinacorp.com',
    website: 'www.cofinacotedivoire.com',
    lat: 5.3799517,
    lng: -3.9882563
  },
  {
    id: 3,
    name: 'COFINA ANGRE',
    address: 'Terminus 81/82',
    phone: '+225 27 22 41 36 62',
    email: 'service-client.cac@cofinacorp.com',
    website: 'www.cofinacotedivoire.com',
    lat: 5.3899517,
    lng: -4.0282563
  },
  {
    id: 4,
    name: 'COFINA DOKUI',
    address: '5èm de la CIE',
    phone: '+225 27 22 41 36 62',
    email: 'service-client.cac@cofinacorp.com',
    website: 'www.cofinacotedivoire.com',
    lat: 5.3299517,
    lng: -4.0382563
  },
  {
    id: 5,
    name: 'COFINA MARCORY STE THERESE',
    address: 'Église Sainte Thérèse',
    phone: '+225 27 22 41 36 62',
    email: 'service-client.cac@cofinacorp.com',
    website: 'www.cofinacotedivoire.com',
    lat: 5.3199517,
    lng: -3.9982563
  }
])

const searchQuery = ref('')
const mapContainer = ref<HTMLElement | null>(null)
// eslint-disable-next-line @typescript-eslint/no-explicit-any
let map: any = null
// eslint-disable-next-line @typescript-eslint/no-explicit-any
const markers: any[] = []
// eslint-disable-next-line @typescript-eslint/no-explicit-any
const infoWindows: any[] = []

// Charger l'API Google Maps
const loadGoogleMaps = (): Promise<void> => {
  return new Promise((resolve) => {
    if ((window as Window & { google?: typeof google }).google) {
      resolve()
      return
    }
    const script = document.createElement('script')
    script.src = `https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places`
    script.async = true
    script.defer = true
    script.onload = () => resolve()
    document.head.appendChild(script)
  })
}

// Initialisation de la carte
onMounted(async () => {
  await loadGoogleMaps()
  initMap()
})

const initMap = () => {
  if (!mapContainer.value) return

  // Centre de la carte (Côte d'Ivoire)
  const center = { lat: 5.3599517, lng: -4.0082563 }

  // Créer la carte
  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  const googleMaps = (window as any).google.maps
  map = new googleMaps.Map(mapContainer.value, {
    zoom: 12,
    center: center,
    mapTypeControl: false,
    streetViewControl: false,
    fullscreenControl: true,
    fullscreenControlOptions: {
      position: googleMaps.ControlPosition.TOP_RIGHT
    }
  })

  // Ajouter les marqueurs
  addMarkers()
}

const addMarkers = () => {
  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  const googleMaps = (window as any).google.maps

  agencies.value.forEach((agency) => {
    // Créer un marqueur personnalisé avec le logo Cofina
    const marker = new googleMaps.Marker({
      position: { lat: agency.lat, lng: agency.lng },
      map: map,
      title: agency.name,
      icon: {
        url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(`
          <svg width="40" height="50" xmlns="http://www.w3.org/2000/svg">
            <ellipse cx="20" cy="45" rx="8" ry="3" fill="rgba(0,0,0,0.3)"/>
            <circle cx="20" cy="20" r="18" fill="#8B1538"/>
            <circle cx="20" cy="20" r="15" fill="white"/>
            <circle cx="20" cy="20" r="12" fill="#8B1538"/>
            <path d="M 20 20 L 20 38" stroke="#8B1538" stroke-width="3"/>
          </svg>
        `),
        scaledSize: new googleMaps.Size(40, 50),
        anchor: new googleMaps.Point(20, 50)
      }
    })

    // Créer la fenêtre d'information
    const infoWindow = new googleMaps.InfoWindow({
      content: createInfoWindowContent(agency)
    })

    // Ouvrir la fenêtre au clic
    marker.addListener('click', () => {
      // Fermer toutes les autres fenêtres
      // eslint-disable-next-line @typescript-eslint/no-explicit-any
      infoWindows.forEach((iw: any) => iw.close())
      infoWindow.open(map, marker)
    })

    markers.push(marker)
    infoWindows.push(infoWindow)
  })
}

const createInfoWindowContent = (agency: Agency): string => {
  return `
    <div style="padding: 12px; min-width: 250px; font-family: sans-serif;">
      <div style="background: linear-gradient(135deg, #8B1538 0%, #C41E3A 100%); color: white; padding: 12px; margin: -12px -12px 12px -12px; border-radius: 8px 8px 0 0;">
        <h3 style="margin: 0; font-size: 16px; font-weight: bold;">${agency.name}</h3>
        <p style="margin: 4px 0 0 0; font-size: 11px; opacity: 0.9;">instructions</p>
      </div>
      <div style="padding: 8px 0;">
        <div style="display: flex; align-items: start; margin-bottom: 8px; gap: 8px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8B1538" stroke-width="2">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
            <circle cx="12" cy="10" r="3"></circle>
          </svg>
          <span style="font-size: 13px; color: #333;">${agency.address}</span>
        </div>
        <div style="display: flex; align-items: center; margin-bottom: 8px; gap: 8px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8B1538" stroke-width="2">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
          </svg>
          <a href="tel:${agency.phone}" style="font-size: 13px; color: #00A3E0; text-decoration: none;">${agency.phone}</a>
        </div>
        <div style="display: flex; align-items: center; margin-bottom: 8px; gap: 8px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8B1538" stroke-width="2">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
          </svg>
          <a href="mailto:${agency.email}" style="font-size: 13px; color: #00A3E0; text-decoration: none; overflow: hidden; text-overflow: ellipsis;">${agency.email}</a>
        </div>
        <div style="display: flex; align-items: center; gap: 8px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8B1538" stroke-width="2">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="2" y1="12" x2="22" y2="12"></line>
            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
          </svg>
          <a href="https://${agency.website}" target="_blank" style="font-size: 13px; color: #00A3E0; text-decoration: none;">${agency.website}</a>
        </div>
      </div>
    </div>
  `
}

const searchAgency = () => {
  if (!searchQuery.value) return

  const query = searchQuery.value.toLowerCase()
  const agency = agencies.value.find(a =>
    a.name.toLowerCase().includes(query) ||
    a.address.toLowerCase().includes(query)
  )

  if (agency) {
    // Centrer la carte sur l'agence trouvée
    map.setCenter({ lat: agency.lat, lng: agency.lng })
    map.setZoom(15)

    // Ouvrir l'infoWindow correspondante
    const index = agencies.value.indexOf(agency)
    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    infoWindows.forEach((iw: any) => iw.close())
    infoWindows[index].open(map, markers[index])
  } else {
    alert('Aucune agence trouvée avec ce nom')
  }
}

const getCurrentLocation = () => {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        }
        map.setCenter(pos)
        map.setZoom(14)
      },
      () => {
        alert('Impossible de récupérer votre position')
      }
    )
  }
}
</script>

<template>
  <section class="py-8 bg-gray-50">
    <div class="max-w-350 mx-auto px-4 lg:px-8">
      <!-- Titre -->
      <div class="mb-6">
        <h2 class="text-gray-900 text-2xl md:text-3xl font-bold mb-2 flex items-center gap-2">
          Agences Cofina Togo
        </h2>
        <p class="text-gray-600 text-sm">Trouvez l'agence la plus proche de vous</p>
      </div>

      <!-- Carte avec barre de recherche -->
      <div class="relative rounded-xl overflow-hidden shadow-2xl" style="height: 600px;">
        <!-- Carte Google Maps -->
        <div ref="mapContainer" class="w-full h-full"></div>

        <!-- Barre de recherche superposée -->
        <div class="absolute top-4 left-4 z-10 flex gap-2">
          <div class="bg-white rounded-lg shadow-lg flex items-center overflow-hidden">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Rechercher une agence Cofina..."
              @keyup.enter="searchAgency"
              class="px-4 py-3 w-64 md:w-80 text-sm border-none focus:outline-none focus:ring-0"
            >
            <button
              @click="searchAgency"
              class="px-4 py-3 bg-primary text-white hover:bg-secondary transition-colors"
            >
              <Search :size="20" />
            </button>
          </div>

          <!-- Bouton position actuelle -->
          <button
            @click="getCurrentLocation"
            class="bg-white p-3 rounded-lg shadow-lg hover:bg-gray-50 transition-colors"
            title="Ma position"
          >
            <MapPin :size="20" class="text-primary" />
          </button>
        </div>
      </div>

      <!-- Note en bas -->
      <p class="text-gray-600 text-xs text-center mt-4">
        Cliquez sur un marqueur pour voir les détails de l'agence
      </p>
    </div>
  </section>
</template>

<style scoped>
/* Styles pour la carte */
</style>
