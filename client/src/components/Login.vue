<script setup>
import { ref } from 'vue'
import { useAuthStore } from '../stores/auth'
const authStore = useAuthStore()
const user = ref({
	email: '',
	password: '',
})
</script>
<template>
	<section class="h-100 gradient-form" style="background-color: #eee">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-xl-10">
					<div class="card rounded-3 text-black">
						<div class="row g-0">
							<div class="col-lg-6">
								<div class="card-body p-md-5 mx-md-4">
									<div class="text-center">
										<img
											src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
											style="width: 185px"
											alt="logo"
										/>
										<h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
									</div>

									<form @submit.prevent="authStore.onLogin(user)">
										<p>Please login to your account</p>

										<div class="form-outline mb-4">
											<label class="form-label" for="form2Example11"
												>Email</label
											>
											<input
												v-model="user.email"
												type="email"
												id="form2Example11"
												class="form-control"
												placeholder="Phone number or email address"
											/>
											<div v-if="authStore.errors.email">
												<span> {{ authStore.errors.email[0] }}</span>
											</div>
										</div>

										<div class="form-outline mb-4">
											<label class="form-label" for="form2Example22"
												>Password</label
											>
											<input
												v-model="user.password"
												type="password"
												id="form2Example22"
												class="form-control"
											/>
											<div v-if="authStore.errors.password">
												<span> {{ authStore.errors.password[0] }}</span>
											</div>
										</div>

										<div class="text-center pt-1 mb-5 pb-1">
											<button
												class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
												type="submit"
											>
												Log in
											</button>
											<router-link :to="{ name: 'ForgotPassword' }"
												>Forgot password?</router-link
											>
										</div>

										<div
											class="d-flex align-items-center justify-content-center pb-4"
										>
											<p class="mb-0 me-2">Don't have an account?</p>
											<button type="button" class="btn btn-outline-danger">
												Create new
											</button>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-6 d-flex align-items-center gradient-custom-2">
								<div class="text-white px-3 py-4 p-md-5 mx-md-4">
									<h4 class="mb-4">We are more than just a company</h4>
									<p class="small mb-0">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit,
										sed do eiusmod tempor incididunt ut labore et dolore magna
										aliqua. Ut enim ad minim veniam, quis nostrud exercitation
										ullamco laboris nisi ut aliquip ex ea commodo consequat.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style scoped></style>
