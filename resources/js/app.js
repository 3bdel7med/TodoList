import './bootstrap';
import { createApp } from 'vue';
const app = createApp({});
import home from './pages/home.vue';
import '@fortawesome/fontawesome-free/css/all.css';

app.component('home', home);
app.mount('#app');