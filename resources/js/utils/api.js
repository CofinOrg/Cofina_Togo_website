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


export default api
