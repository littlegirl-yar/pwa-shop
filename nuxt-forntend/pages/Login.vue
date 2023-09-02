<template>
<div>
    <!-- Login Wrapper Area -->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="custom-container">
        <div class="text-center px-4"><img class="login-intro-img" src="img/bg-img/36.png" alt=""></div>
        <!-- Register Form -->
        <div class="register-form mt-4">
          <h6 class="mb-3 text-center">Log in to continue to Affan.</h6>
          <div class="row">
            <div class="col-12">
              <a @click="loginWithGoogle()" class="btn btn-primary btn-google mb-3 w-100" href="#"><i class="bi bi-google me-3"></i>Login with Google</a>
              <a @click="loginWithGithub()" class="btn btn-primary btn-github mb-3 w-100" href="#"><i class="bi bi-github me-3"></i>Login with GitHub</a>
              </div>
          </div>
          <form @submit.prevent="JWTLogin">
            <div class="form-group">
              <input v-model="email" class="form-control" type="email" placeholder="Email address">
            </div>
            <div class="form-group position-relative">
              <input v-model="password" class="form-control" id="psw-input" type="password" placeholder="Enter Password">
              <div class="position-absolute" id="password-visibility"><i class="bi bi-eye"></i><i class="bi bi-eye-slash"></i></div>
            </div>
            <button class="btn btn-primary w-100" type="submit">Sign In</button>
          </form>
        </div>
        <!-- Login Meta -->
        <div class="login-meta-data text-center">
          <p class="mb-0">Didn't have an account? <NuxtLink to="/register" class="stretched-link">Register</NuxtLink></p>
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
      'email': '',
      'password': '',
    }
  },
  methods:{
    async loginWithGoogle() {
      try{
        await this.$auth.loginWith("google");
      }
      catch(e){
        this.$toast.error(e.response.data.message);
      }
    },
    async loginWithGithub(){
      try{
        await this.$auth.loginWith("github");
      }
      catch(e){
        this.$toast.error(e.response.data.message);
      }
    },
    async JWTLogin(){
      try{
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
    }
  }
}
</script>
