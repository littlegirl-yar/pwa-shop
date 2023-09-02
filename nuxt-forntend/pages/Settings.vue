<template>
    <div>
        <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- Setting Card-->
        <div class="card mb-3 shadow-sm">
          <div class="card-body direction-rtl">
            <p>Account</p>
            <div class="single-setting-panel"><NuxtLink to="/userprofile"><div class="icon-wrapper"><i class="bi bi-person"></i></div>Update Profile</NuxtLink></div>
          </div>
        </div>
        <!-- Setting Card-->
        <div class="card shadow-sm">
          <div class="card-body direction-rtl">
            <p>Register &amp; Logout</p>
            <div class="single-setting-panel"><NuxtLink to="/register"><div class="icon-wrapper"><i class="bi bi-person"></i></div>Create New Account</NuxtLink></div>
            <div class="single-setting-panel"><a @click="logout()"><div class="icon-wrapper bg-danger"><i class="bi bi-box-arrow-right"></i></div>Logout</a></div>
          </div>
        </div>
      </div>
    </div>
    </div>
</template>
<script>
export default {
  middleware: 'auth',
  data() {
    return {
    }
  },
  methods:{
    async logout(){
      await this.$axios.$post('http://127.0.0.1:8000/api/auth/logout')
      this.$auth.logout()
      this.$router.push('/login');
    }
  }
}
</script>