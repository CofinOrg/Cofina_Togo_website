import { createRouter, createWebHistory } from 'vue-router'

import UserLayout from '../layouts/UserLayout.vue'
import AdminLayout from '../layouts/AdminLayout.vue'

import accueil from '@/views/website/accueil.vue'
import AboutPage from '@/views/website/AboutPage.vue'
import ServicePage from '@/views/website/ServicePage.vue'
import ServiceTypesPage from '@/views/website/ServiceTypesPage.vue'
import CareersPage from '@/views/website/CareersPage.vue'
import SimulateurPretPage from '@/views/website/SimulateurPretPage.vue'
import ServiceDetail from '@/views/website/ServiceDetail.vue'
import ContactPage from '@/views/website/ContactPage.vue'
import SimulateurDATPage from '@/views/website/SimulateurDATPage.vue'
import BlogPage from '@/views/website/BlogPage.vue'
import AccueilAdmin from '../views/admin/Accueil.vue'
import AddOffer from '../views/admin/AddOffer.vue'
import AddBlog from '../views/admin/AddBlog.vue'
import LoginPage from '../views/auth/LoginPage.vue'
import ConvertisseurDevise from '../views/website/ConvertisseurDevisePage.vue'


const router = createRouter({

    history: createWebHistory(import.meta.env.BASE_URL),

    scrollBehavior(to, from, savedPosition) {
        // 🔁 Bouton "retour" du navigateur
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
                    path: 'service-types', // Tu peux garder ce nom ou le renommer
                    name: 'serviceTypesPage',
                    component: ServiceTypesPage,
                    // Optionnel : passer le query param 'type' comme prop
                    props: route => ({ initialTab: route.query.type || 'packs' })
                },
                /**
                 * NOUVELLE ROUTE DYNAMIQUE
                 * Le ":id" devient une variable accessible dans ton composant
                 * Exemple : /services/detail/pack-woezon
                 */
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
                    component: AddOffer
                },
                {
                    path: "add-blog",
                    name: "add-blog",
                    component: AddBlog
                }

            ]
        },

        {
            path: '/login',
            component: LoginPage
        }
    ],
})

// Guard de navigation pour protéger les routes admin
router.beforeEach((to, _from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth)

    if (requiresAuth) {
        const token = localStorage.getItem('userToken') || sessionStorage.getItem('userToken')

        if (!token) {
            // Pas de token, rediriger vers login
            next({ path: '/login', query: { redirect: to.fullPath } })
        } else {
            // Token présent, autoriser l'accès
            next()
        }
    } else {
        // Route publique
        next()
    }
})

export default router
