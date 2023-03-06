<script>
import { useAuthStore } from '../stores/auth'

export default {
	data() {
		return {
			authStore: useAuthStore(),
		}
	},
	mounted() {
		this.authStore.getUser()
	},
}
</script>

<template>
	<div v-if="authStore.user">
		<h1>{{ authStore.user.name }}</h1>
		<p>{{ authStore.user.email }}</p>
	</div>
	<div v-else>
		<h1>Go and login</h1>
	</div>
</template>

<style scoped></style>
