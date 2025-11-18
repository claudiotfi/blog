import { createRouter, createWebHistory } from 'vue-router';

import Login from '../pages/Login.vue';
import Dashboard from '../pages/Dashboard.vue';

const routes = [
    { path: '/admin/login', name: 'login', component: Login },
    { path: '/admin/dashboard', name: 'dashboard', component: Dashboard },
];

export default createRouter({
    history: createWebHistory(),
    routes
});
