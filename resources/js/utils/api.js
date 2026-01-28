import axios from 'axios'

// Configuration de base de l'API
const api = axios.create({
    baseURL: import.meta.env.VITE_API_URL || '/api',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    },
    timeout: 10000
})

api.interceptors.request.use(
    (config) => {
        // Ajouter le token d'authentification si disponible
        const token = localStorage.getItem('userToken') || sessionStorage.getItem('userToken')
        if (token) {
            config.headers.Authorization = `Bearer ${token}`
        }
        return config
    },
    (error) => {
        return Promise.reject(error)
    }
)

/* // Intercepteur de réponse (gérer les erreurs globalement)
api.interceptors.response.use(
    (response) => {
        return response
    },
    (error) => {
        // Gérer les erreurs globalement
        if (error.response) {
            switch (error.response.status) {
                case 401:
                    // Non authentifié
                    localStorage.removeItem('userToken')
                    window.location.href = '/login'
                    break
                case 403:
                    // Non autorisé
                    console.error('Accès refusé')
                    break
                case 404:
                    console.error('Ressource non trouvée')
                    break
                case 422:
                    // Erreurs de validation
                    console.error('Erreurs de validation:', error.response.data.errors)
                    break
                case 500:
                    console.error('Erreur serveur')
                    break
                default:
                    console.error('Erreur:', error.response.data.message)
            }
        } else if (error.request) {
            console.error('Pas de réponse du serveur')
        } else {
            console.error('Erreur:', error.message)
        }
        return Promise.reject(error)
    }
) */

export default api
