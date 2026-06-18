import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

interface AbilityRule {
    subject: string[]
    action: string[]
}

interface User {
    id: number
    name: string
    email: string
    profile: string
    ability_rules: AbilityRule[]
    [key: string]: any
}

export const useAuthStore = defineStore('auth', () => {
    const user = ref<User | null>(null)
    const token = ref<string | null>(null)

    const isAuthenticated = computed(() => !!token.value)
    const abilityRules = computed(() => {
        const rules = user.value?.ability_rules
        return Array.isArray(rules) ? rules : []
    })

    /**
     * Vérifie si l'utilisateur a la permission d'effectuer une action sur un sujet
     */
    function can(action: string, subject: string): boolean {
        return abilityRules.value.some(rule =>
            (rule.subject.includes('all') || rule.subject.includes(subject)) &&
            (rule.action.includes('manage') || rule.action.includes(action))
        )
    }

    /**
     * Charge les données depuis le storage (localStorage ou sessionStorage)
     */
    function loadFromStorage() {
        const savedToken = localStorage.getItem('userToken') || sessionStorage.getItem('userToken')
        const savedUser = localStorage.getItem('user') || sessionStorage.getItem('user')

        if (savedToken) {
            token.value = savedToken
        }
        if (savedUser) {
            try {
                user.value = JSON.parse(savedUser)
            } catch {
                user.value = null
            }
        }
    }

    /**
     * Stocke les données après login
     */
    function setAuth(userData: User, userToken: string, remember: boolean) {
        user.value = userData
        token.value = userToken

        const storage = remember ? localStorage : sessionStorage
        storage.setItem('userToken', userToken)
        storage.setItem('user', JSON.stringify(userData))
    }

    /**
   * Met à jour les données de l'utilisateur connecté
   */
    function updateUser(data: Partial<User>) {
        if (!user.value) return

        user.value = { ...user.value, ...data }

        // Mettre à jour le storage pour garder la cohérence
        const storage = localStorage.getItem('userToken') ? localStorage : sessionStorage
        storage.setItem('user', JSON.stringify(user.value))
    }

    /**
     * Réinitialise l'état au logout
     */
    function logout() {
        user.value = null
        token.value = null
        localStorage.removeItem('userToken')
        localStorage.removeItem('user')
        sessionStorage.removeItem('userToken')
        sessionStorage.removeItem('user')
    }

    return {
        user,
        token,
        isAuthenticated,
        abilityRules,
        can,
        loadFromStorage,
        setAuth,
        updateUser,
        logout,
    }
})
