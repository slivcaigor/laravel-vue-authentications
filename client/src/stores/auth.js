import axios from 'axios'
import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
	state: () => ({
		authUser: null,
		authErrors: [],
		authStatus: null,
		isAuthenticated: false,
	}),
	getters: {
		user: state => state.authUser,
		errors: state => state.authErrors,
		status: state => state.authStatus,
		authenticated: state => state.isAuthenticated,
	},
	actions: {
		async getToken() {
			await axios.get('/sanctum/csrf-cookie')
		},
		async getUser() {
			await this.getToken()
			if (!this.isAuthenticated) {
				return
			}
			try {
				const data = await axios.get('/api/user')
				this.authUser = data.data
			} catch (error) {
				if (error.response.status === 401) {
					console.log(error)
				}
			}
		},
		async onLogin(data) {
			this.authErrors = []
			await this.getToken()
			try {
				await axios.post('/login', {
					email: data.email,
					password: data.password,
				})
				this.router.push('/')
			} catch (error) {
				if (error.response.status === 422) {
					this.authErrors = error.response.data.errors
				}
			}
			this.isAuthenticated = true
		},
		async onRegister(data) {
			this.authErrors = []
			await this.getToken()

			try {
				await axios.post('/register', {
					name: data.name,
					surname: data.surname,
					birth_day: data.birth_day,
					email: data.email,
					password: data.password,
					password_confirmation: data.password_confirmation,
				})
				this.router.push('/')
			} catch (error) {
				if (error.response.status === 422) {
					this.authErrors = error.response.data.errors
				}
			}
		},
		async onLogout() {
			await axios.post('/logout')
			this.authUser = null
			this.isAuthenticated = false
			this.router.push('/')
		},
		async onForgotPassword(email) {
			this.authErrors = []
			await this.getToken()

			try {
				const response = await axios.post('/forgot-password', {
					email: email,
				})
				this.authStatus = response.data.status
			} catch (error) {
				if (error.response.status === 422) {
					this.authErrors = error.response.data.errors
				}
			}
		},
		async onResetPassword(resetData) {
			this.authErrors = []

			try {
				const response = await axios.post('/reset-password', resetData)
				this.authStatus = response.data.status
			} catch (error) {
				if (error.response.status === 422) {
					this.authErrors = error.response.data.errors
				}
			}
		},
	},
})
