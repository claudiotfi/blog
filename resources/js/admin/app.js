import axios from './axios'  // pega o axios configurado

import { createApp } from 'vue'
import router from './router'
import App from './App.vue'

// axios já está configurado no arquivo axios.js

createApp(App)
    .use(router)
    .mount('#admin-app')
