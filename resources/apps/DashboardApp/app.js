import './bootstrap';
import { createApp } from 'vue';
import i18n from "@/lang";

import router from '@dash/router';
import store from '@/store';
import plugins from '@plugins';
import App from './App.vue';


import './main';


const app = createApp(App);

app.use(store);
app.use(router);
app.use(i18n);
app.use(plugins);

app.mount('#app');
