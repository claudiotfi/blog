import { createRouter, createWebHistory } from 'vue-router'
import axios from 'axios'

import Login from '../pages/Login.vue'
import Dashboard from '../pages/Dashboard.vue'

const routes = [
    { 
        path: '/admin/login',
        name: 'login',
        component: Login,
        meta: { guest: true }
    },
    { 
        path: '/admin',
        name: 'dashboard',
        component: Dashboard,
        meta: { requiresAuth: true }
    },
    {
        path: "/admin/posts",
        name: "posts.index",
        component: () => import("../pages/posts/PostsIndex.vue")
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

// 🔐 Guarda de navegação para proteger rotas
router.beforeEach(async (to, from, next) => {
    if (to.meta.guest) {
        return next()
    }

    try {
        await axios.get('/api/admin/me', { withCredentials: true })
        return next()
    } catch (err) {
        return next('/admin/login')
    }
})


export default router
