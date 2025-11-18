import { createApp } from 'vue';
import router from './router';
import axios from './axios';

const app = createApp({});

// middleware global
router.beforeEach(async (to, from, next) => {
    const isAuthRoute = to.meta.requiresAuth;
    const isGuestRoute = to.meta.guest;

    let user = null;

    try {
        const { data } = await axios.get('/admin/me');
        user = data;
    } catch {}

    if (isAuthRoute && !user) {
        return next('/admin/login');
    }

    if (isGuestRoute && user) {
        return next('/admin/dashboard');
    }

    next();
});

app.use(router);

app.mount('#admin-app');
