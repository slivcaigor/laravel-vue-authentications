<script>
import { useAuthStore } from '../stores/auth'

export default {
	data() {
		return {
			user: null,
		}
	},
	async mounted() {
		const authStore = useAuthStore()
		await authStore.getUser()
		this.user = authStore.user
	},
}
</script>

<template>
	<div>
		<p v-if="user">
			{{ user.name }}
			{{ user.email }}
		</p>
		<p v-else>You are not logged in.</p>
	</div>
</template>

<style scoped></style>
