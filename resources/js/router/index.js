import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '../stores/auth'

import UserLayout from '../layouts/UserLayout.vue'
import AdminLayout from '../layouts/AdminLayout.vue'

import accueil from '@/views/website/accueil.vue'
import AboutPage from '@/views/website/AboutPage.vue'
import ServicePage from '@/views/website/ServicePage.vue'
import ServiceTypesPage from '@/views/website/ServiceTypesPage.vue'
import CareersPage from '@/views/website/CareersPage.vue'
import SimulateurPretPage from '@/views/website/SimulateurPretPage.vue'
import ServiceDetail from '@/views/website/ServiceDetail.vue'
import ServiceProductsPage from '@/views/website/ServiceProductsPage.vue'
import ContactPage from '@/views/website/ContactPage.vue'
import SimulateurDATPage from '@/views/website/SimulateurDATPage.vue'
import BlogPage from '@/views/website/BlogPage.vue'
import AccueilAdmin from '../views/admin/Accueil.vue'
import AddOffer from '../views/admin/AddOffer.vue'
import AddBlog from '../views/admin/AddBlog.vue'
import LoginPage from '../views/auth/LoginPage.vue'
import ConvertisseurDevise from '../views/website/ConvertisseurDevisePage.vue'
import FormPacks from '../components/Home-components/FormProducts.vue'
import FormBusinessClub from '../components/Home-components/FormBusinessClub.vue'
import AddAgency from '../views/admin/AddAgency.vue'
import ManageUsers from '../views/admin/ManageUsers.vue'
import UserProfile from '../views/admin/UserProfile.vue'
import AddAnnouncement from '../views/admin/AddAnnouncement.vue'
import AddSlider from '../views/admin/AddSlider.vue'
import ServiceAndProduct from '../views/admin/ServiceAndProduct.vue'
import PreRegistrations from '../views/admin/PreRegistrations.vue'
import CustomerMessages from '../views/admin/CustomerMessages.vue'
import SpontaneousApplications from '../views/admin/SpontaneousApplications.vue'
import OfferApplications from '../views/admin/OfferApplications.vue'
import ScoringStats from '../views/admin/ScoringStats.vue'
import Notifications from '../views/admin/Notifications.vue'
import InsightPage from '../views/admin/InsightPage.vue'
import BusinessClubMembers from '../views/admin/BusinessClubMembers.vue'
import NotFoundPage from '../views/website/NotFoundPage.vue'
import PremiumPage from '../views/website/PremiumPage.vue'


const router = createRouter({

    history: createWebHistory("/"),

    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        }

        // ⬆️ Scroll en haut à chaque navigation
        return { top: 0 }
    },
    routes: [
        {
            path: '/',
            component: UserLayout,
            children: [
                {
                    path: '',
                    name: 'accueil',
                    component: accueil,
                },
                {
                    path: 'a-propos',
                    name: 'about',
                    component: AboutPage,
                },
                {
                    path: 'services',
                    name: 'services',
                    component: ServicePage,
                },
                {
                    path: 'services/:id/produits',
                    name: 'serviceProducts',
                    component: ServiceProductsPage,
                    props: true,
                },
                {
                    path: 'blog/:id',
                    name: 'blog',
                    component: BlogPage,
                    props: true
                },
                {
                    path: 'contact',
                    name: 'contact',
                    component: ContactPage,
                },
                {
                    path: 'premium',
                    name: 'premium',
                    component: PremiumPage,
                },
                {
                    path: 'service-types',
                    name: 'serviceTypesPage',
                    component: ServiceTypesPage,
                    props: route => ({ initialTab: route.query.type || 'packs' })
                },

                {
                    path: 'services/detail/:id',
                    name: 'serviceDetail',
                    component: ServiceDetail,
                    props: true // Permet de recevoir l'id directement comme une Prop
                },
                {
                    path: "carrieres",
                    name: "carriere",
                    component: CareersPage,
                },
                {
                    path: "simulateurs",
                    name: "simulateur",
                    component: SimulateurPretPage,
                },
                {
                    path: "simulateurs-dat",
                    name: "simulateur-dat",
                    component: SimulateurDATPage,
                },
                {
                    path: "simulateurs-convertisseur-devise",
                    name: "simulateurs-convertisseur-devise",
                    component: ConvertisseurDevise,
                },
                {
                    path: "pack-form/:productId?",
                    name: "pack-form",
                    component: FormPacks,
                    props: true
                },
                {
                    path: "businesstouch/adhesion",
                    name: "business-club-form",
                    component: FormBusinessClub
                }


            ]

        },

        {
            path: '/Cofinoistg@admin',
            component: AdminLayout,
            meta: { requiresAuth: true },
            children: [

                {
                    path: "home",
                    name: "admin-home",
                    component: AccueilAdmin
                },
                {
                    path: "offer",
                    name: "add-offer",
                    component: AddOffer,
                    meta: { subject: 'joboffer', action: 'menu' }
                },
                {
                    path: "add-blog",
                    name: "add-blog",
                    component: AddBlog,
                    meta: { subject: 'blog', action: 'menu' }
                },

                {
                    path: "add-agency",
                    name: "add-agency",
                    component: AddAgency,
                    meta: { subject: 'agence', action: 'menu' }
                },

                {
                    path: "add-announcement",
                    name: "add-announcement",
                    component: AddAnnouncement,
                    meta: { subject: 'announcement', action: 'menu' }
                },

                {
                    path: "add-slider",
                    name: "add-slider",
                    component: AddSlider,
                    meta: { subject: 'slider', action: 'menu' }
                },

                {
                    path: "service-product",
                    name: "service-product",
                    component: ServiceAndProduct,
                    meta: { subject: 'service', action: 'menu' }
                },

                {
                    path: "pre-registrations",
                    name: "pre-registrations",
                    component: PreRegistrations,
                    meta: { subjects: ['preregistration', 'service'], action: 'menu' }
                },

                {
                    path: "customer-messages",
                    name: "customer-messages",
                    component: CustomerMessages,
                    meta: { subjects: ['customermessage', 'service'], action: 'menu' }
                },

                {
                    path: "spontaneous-applications",
                    name: "spontaneous-applications",
                    component: SpontaneousApplications,
                    meta: { subject: 'joboffer', action: 'menu' }
                },

                {
                    path: "offer-applications",
                    name: "offer-applications",
                    component: OfferApplications,
                    meta: { subject: 'joboffer', action: 'menu' }
                },

                {
                    path: "scoring-stats",
                    name: "scoring-stats",
                    component: ScoringStats,
                    meta: { subject: 'joboffer', action: 'menu' }
                },

                {
                    path: "users",
                    name: "admin-users",
                    component: ManageUsers,
                    meta: { subject: 'user', action: 'menu' }
                },

                {
                    path: "profile",
                    name: "admin-profile",
                    component: UserProfile
                },

                {
                    path: "notifications",
                    name: "admin-notifications",
                    component: Notifications,
                    meta: { subject: 'notification', action: 'menu' }
                },

                {
                    path: "insights",
                    name: "admin-insights",
                    component: InsightPage,
                    meta: { subject: 'announcement', action: 'menu' }
                },

                {
                    path: "business-club-members",
                    name: "admin-business-club-members",
                    component: BusinessClubMembers,
                    meta: { subject: 'businessclubmember', action: 'menu' }
                }

            ]
        },

        {
            path: '/Cofinoistg@admin/login',
            component: LoginPage
        },

        {
            path: '/:pathMatch(.*)*',
            name: 'not-found',
            component: NotFoundPage
        }
    ],
})

// Guard de navigation pour protéger les routes admin
router.beforeEach((to, _from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth)

    if (requiresAuth) {
        const authStore = useAuthStore()

        // S'assurer que le store est chargé depuis le storage
        if (!authStore.isAuthenticated) {
            authStore.loadFromStorage()
        }

        if (!authStore.isAuthenticated) {
            // Pas de token, rediriger vers login
            return next({ path: '/Cofinoistg@admin/login', query: { redirect: to.fullPath } })
        }

        // Vérifier les permissions si la route a un subject/action
        const { subject, subjects, action } = to.meta

        if (action) {
            let hasPermission = false

            // Support pour multiple subjects
            if (subjects && Array.isArray(subjects)) {
                hasPermission = subjects.some(s => authStore.can(action, s))
            } else if (subject) {
                hasPermission = authStore.can(action, subject)
            } else {
                hasPermission = true
            }

            if (!hasPermission) {
                // Pas autorisé, rediriger vers le dashboard
                return next({ name: 'admin-home' })
            }
        }

        next()
    } else {
        // Route publique
        next()
    }
})

export default router
