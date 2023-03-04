// pinia e' una libreria per la creazione di uno store globale sul lato server, permette di memorizzare dati come informazioni di login, preferenze utente, stato di navigazione(pagina corrente, menu nav, footer), lingua preferita, il tema di colore
import { createPinia } from 'pinia'
import { createApp } from 'vue'
// consente di gestire la navigazione tra le diverse pagine
import router from './router'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.js'
import App from './App.vue'
import './axios'

const pinia = createPinia()
const app = createApp(App)
app.use(pinia)
app.use(router)
app.mount('#app')
