import { app } from './app'
import { router } from './router'
import { i18n } from './plugins/i18n'
import { createPinia } from 'pinia'
import axios from 'Util/axios'
import './plugins/authorization'
import './tailwind.css'
import './style.css'

window.axios = axios
const pinia = createPinia()

app.use(i18n)
app.use(pinia)
app.use(router)
app.mount('#app')
