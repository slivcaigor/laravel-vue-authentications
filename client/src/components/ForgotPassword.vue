<script setup>
import { ref } from 'vue'
import { useAuthStore } from '../stores/auth'
const authStore = useAuthStore()

const email = ref('')
</script>
<template>
	<div class="card text-center" style="width: 300px">
		<div class="card-header h5 text-white bg-primary">Password Reset</div>
		<div v-if="authStore.status" class="">{{ authStore.status }}</div>
		<div class="card-body px-5">
			<p class="card-text py-2">
				Enter your email address and we'll send you an email with instructions
				to reset your password.
			</p>
			<div class="form-outline">
				<form @submit.prevent="authStore.onForgotPassword(email)">
					<label class="form-label" for="typeEmail">Email </label>
					<input
						v-model="email"
						type="email"
						id="typeEmail"
						class="form-control my-3"
					/>
					<div v-if="authStore.errors.email">
						<span> {{ authStore.errors.email[0] }}</span>
					</div>
					<button class="btn btn-primary w-100" type="submit">
						Reset password
					</button>
				</form>
			</div>

			<div class="d-flex justify-content-between mt-4">
				<router-link :to="{ name: 'Login' }">Login</router-link>
				<router-link :to="{ name: 'Register' }">Register</router-link>
			</div>
		</div>
	</div>
</template>
