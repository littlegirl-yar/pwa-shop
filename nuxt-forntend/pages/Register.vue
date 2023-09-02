<template>
  <div>
    <!-- Login Wrapper Area -->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="custom-container">
        <div class="text-center px-4"><img class="login-intro-img" src="img/bg-img/36.png" alt=""></div>
        <!-- Register Form -->
        <div class="register-form mt-4">
          <h6 class="mb-3 text-center">Register to continue to Affan.</h6>
          <form @submit.prevent="register">
            <div class="form-group text-start mb-3">
              <input v-model="name" class="form-control" type="text" placeholder="Username">
            </div>
            <div class="form-group text-start mb-3">
              <input v-model="email" class="form-control" type="text" placeholder="Email address">
            </div>
            <div class="form-group text-start mb-3 position-relative">
              <input v-model="password" class="form-control" id="psw-input" type="password" placeholder="Password">
              <div class="position-absolute" id="password-visibility"><i class="bi bi-eye"></i><i class="bi bi-eye-slash"></i></div>
            </div>
            <div class="form-group text-start mb-3 position-relative">
              <input v-model="password_confirmation" class="form-control" id="psw-input" type="password" placeholder="Password confirmation">
              <div class="position-absolute" id="password-visibility"><i class="bi bi-eye"></i><i class="bi bi-eye-slash"></i></div>
            </div>
            <div class="mb-3" id="pswmeter"></div>
            <button class="btn btn-primary w-100" type="submit">Register</button>
          </form>
        </div>
        <!-- Login Meta -->
        <div class="login-meta-data text-center">
          <p class="mt-3 mb-0">Already have an account? <NuxtLink to="/login" class="stretched-link">Login</NuxtLink></p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  layout: "empty",
  data() {
    return {
      'name': '',
      'email': '',
      'password': '',
      'password_confirmation': '',
    }
  },
  methods:{
    async register() {
      try{
        await this.$axios.post('http://localhost:8000/api/auth/register', {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation
        })
        await this.$auth.loginWith('auth_jwt', {
          data: {
            email: this.email,
            password: this.password
          }
        })
        this.$router.push({ path: '/' })
      }
      catch(e){
        this.$toast.error(e.response.data.message);
      }
    },
  }
}
</script>
