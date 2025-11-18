import { createApp } from 'vue';
import router from './router';

import AdminLayout from './components/layout/AdminLayout.vue';

const app = createApp(AdminLayout);
app.use(router);
app.mount('#admin-app');
