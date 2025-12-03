import { createApp } from 'vue'
import router from './router'
import App from './App.vue'
import axios from './axios'


// Obrigatório para Sanctum funcionar com SPA
axios.defaults.withCredentials = true
axios.defaults.baseURL = '/api'

createApp(App)
    .use(router)
    .mount('#admin-app')
