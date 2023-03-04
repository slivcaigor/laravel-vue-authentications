<script>
import Nav from './components/Nav.vue'

export default {
	components: {
		Nav,
	},
}
</script>

<template>
	<main>
		<Nav />
		<RouterView />
	</main>
</template>

<style scoped></style>
