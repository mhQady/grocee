import './bootstrap';
import { createApp } from 'vue';
import router from '@web/router';
import store from '@/store';
import App from './App.vue';

import './main';


const app = createApp(App);

app.use(store);
app.use(router);

app.mount('#app');
