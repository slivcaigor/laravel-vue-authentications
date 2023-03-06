<script>
import { useRoute } from 'vue-router'
import { useAuthStore } from '../stores/auth'

export default {
	data() {
		return {
			route: useRoute(),
			authStore: useAuthStore(),
			form: {
				password: '',
				password_confirmation: '',
				email: route.query.email,
				token: route.params.token,
			},
		}
	},
}
</script>
<template>
	<div class="card text-center" style="width: 300px">
		<div class="card-header h5 text-white bg-primary">New Password</div>
		<div class="card-body px-5">
			<div class="form-outline">
				<form @submit.prevent="authStore.onResetPassword(form)">
					<div v-if="authStore.status" class="">{{ authStore.status }}</div>

					<div class="form-outline mb-4">
						<label class="form-label" for="form2Example22">Password</label>
						<input
							v-model="form.password"
							type="password"
							id="form2Example22"
							class="form-control"
						/>
						<div v-if="authStore.errors.password">
							<span> {{ authStore.errors.password[0] }}</span>
						</div>
					</div>
					<div class="form-outline mb-4">
						<label class="form-label" for="form2Example22"
							>Confirm Password</label
						>
						<input
							v-model="form.password_confirmation"
							type="password"
							id="form2Example22"
							class="form-control"
						/>
					</div>
					<button class="btn btn-primary w-100" type="submit">
						Reset password
					</button>
				</form>
			</div>
		</div>
	</div>
</template>
