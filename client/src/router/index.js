import { createRouter, createWebHistory } from 'vue-router'
import Home from '../components/Home.vue'
import { useAuthStore } from '../stores/auth'

const routes = [
	{
		path: '/',
		name: 'Home',
		component: Home,
	},
	{
		path: '/login',
		name: 'Login',
		component: () => import('../components/Login.vue'),
	},
	{
		path: '/register',
		name: 'Register',
		component: () => import('../components/Register.vue'),
	},
	{
		path: '/forgot-password',
		name: 'ForgotPassword',
		component: () => import('../components/ForgotPassword.vue'),
	},
	{
		path: '/password-reset/:token',
		name: 'ResetPassword',
		component: () => import('../components/ResetPassword.vue'),
	},
	{
		path: '/dashboard',
		name: 'Dashboard',
		component: () => import('../components/Dashboard.vue'),
		beforeEnter: (to, from, next) => {
			const authStore = useAuthStore()
			if (authStore.isAuthenticated) {
				next()
			} else {
				next('/login')
			}
		},
	},
]

const router = createRouter({
	history: createWebHistory(),
	routes,
})

export default router
