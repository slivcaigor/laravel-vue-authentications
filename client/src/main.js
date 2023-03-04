import { createApp, markRaw } from 'vue'

// pinia e' una libreria per la creazione di uno store globale sul lato server, permette di memorizzare dati come informazioni di login, preferenze utente, stato di navigazione(pagina corrente, menu nav, footer), lingua preferita, il tema di colore
import { createPinia } from 'pinia'
import App from './App.vue'
// consente di gestire la navigazione tra le diverse pagine
import router from './router'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.js'
import './axios'

const pinia = createPinia()

pinia.use(({ store }) => {
	store.router = markRaw(router)
})

const app = createApp(App)

app.use(pinia)
app.use(router)

app.mount('#app')
