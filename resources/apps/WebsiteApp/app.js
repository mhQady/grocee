import './bootstrap';
import { createApp } from 'vue';
import router from '@web/router';
import store from '@/store';
import i18n from "@/lang";
import App from './App.vue';

import './main';


const app = createApp(App);

app.use(store);
app.use(router);
app.use(i18n);

app.mount('#app');
