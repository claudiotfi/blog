import axios from 'axios'
axios.defaults.withCredentials = true

import { createApp } from 'vue'
import router from './router'
import App from './App.vue'

// Obrigatório para Sanctum funcionar com SPA
axios.defaults.withCredentials = true
axios.defaults.baseURL = '/api'

createApp(App)
    .use(router)
    .mount('#admin-app')
