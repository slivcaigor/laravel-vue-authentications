<script></script>
<template>
	<nav>
		<div id="navbar-default">
			<ul>
				<li>
					<router-link :to="{ name: 'Home' }">Home</router-link>
				</li>
				<li>
					<router-link :to="{ name: 'Login' }">Login</router-link>
				</li>
				<li>
					<router-link :to="{ name: 'Register' }">Register</router-link>
				</li>
			</ul>
		</div>
	</nav>
</template>
