<script>
import axios from 'axios'

export default {
	data() {
		return {
			user: null,
		}
	},
	async mounted() {
		const data = await axios.get('/api/user')
		this.user = data.data
	},
}
</script>

<template>
	<h1>{{ user?.name }}</h1>
	<h1>{{ user?.email }}</h1>
</template>

<style scoped></style>
