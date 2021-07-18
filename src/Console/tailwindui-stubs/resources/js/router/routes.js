import Home from 'View/home.vue'
import NotFound from 'View/not-found.vue'

export default [
  { path: '/', name: 'home', component: Home },

  { path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFound }
]
