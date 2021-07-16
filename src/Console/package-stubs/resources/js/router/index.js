import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes'

export const router = createRouter({
    history: createWebHistory(Config.prefix),
    routes,
})

// router.beforeEach((to, from, next) => {
//     next()
// })
