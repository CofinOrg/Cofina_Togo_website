import axios from 'axios'

const api = axios.create({
    baseURL: import.meta.env.VITE_API_URL || '/api',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    },
    timeout: 30000  // 30s pour les opérations de scoring asynchrone
})

api.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem('userToken') || sessionStorage.getItem('userToken')
        if (token) {
            config.headers.Authorization = `Bearer ${token}`
        }

        // Laisser Axios gérer le Content-Type pour FormData (avec le bon boundary)
        if (config.data instanceof FormData) {
            delete config.headers['Content-Type']
        }

        return config
    },
    (error) => {
        return Promise.reject(error)
    }
)

export default api
