import { createRouter, createWebHistory } from 'vue-router'
import LoginComponenet from "../views/Login-Componenet.vue"
import Register from "../views/Register.vue"

const routes = [
      {
        path: '/login',
        name: 'LoginComponent',
        component: LoginComponenet,
      },
      {
        path: '/',
        name: 'Register',
        component: Register,
      },
     
      
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router