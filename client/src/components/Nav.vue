<script setup>
import { useAuthStore } from '../stores/auth'
const authStore = useAuthStore()
</script>
<template>
	<nav>
		<div>
			<ul>
				<li>
					<router-link :to="{ name: 'Home' }">Home</router-link>
				</li>
			</ul>
		</div>
	</nav>

	<template v-if="!authStore.user">
		<li>
			<router-link :to="{ name: 'Login' }">Login</router-link>
		</li>
		<li>
			<router-link :to="{ name: 'Register' }">Register</router-link>
		</li>
	</template>
	<template v-else>
		<button @click="authStore.onLogout" class="">Logout</button>
	</template>
</template>
