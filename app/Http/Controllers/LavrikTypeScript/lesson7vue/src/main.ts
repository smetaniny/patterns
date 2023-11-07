import { createApp } from 'vue'
import App from './App.vue'
import api, { apiInjectionKey } from '@/api/index'

const app = createApp(App);
app.provide(apiInjectionKey, api);
app.mount('#app')

import 'bootstrap/dist/css/bootstrap.css'
import './overload'
