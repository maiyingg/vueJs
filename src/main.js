import "bootstrap/dist/css/bootstrap.min.css"
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { faEdit } from "@fortawesome/free-solid-svg-icons"
import { faTrash } from "@fortawesome/free-solid-svg-icons"
import { faSave } from "@fortawesome/free-solid-svg-icons"

library.add(faEdit,faTrash,faSave)

const app = createApp(App)
app.use(router)
app.component('font-awesome-icon',FontAwesomeIcon)
app.mount('#app')
import "bootstrap/dist/js/bootstrap.min.js"
