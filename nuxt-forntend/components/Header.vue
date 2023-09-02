<template>
<div>
    <div class="header-area" id="headerArea">
      <div class="container">
        <!-- # Paste your Header Content from here -->
        <!-- # Header Five Layout -->
        <!-- # Copy the code from here ... -->
        <!-- Header Content -->
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
          <!-- Logo Wrapper -->
          <div class="logo-wrapper"><a href="#"><img src="/img/core-img/logo.png" alt=""></a></div>
          <!-- Navbar Toggler -->
          <div class="navbar--toggler" id="affanNavbarToggler" data-bs-toggle="offcanvas" data-bs-target="#affanOffcanvas" aria-controls="affanOffcanvas"><span class="d-block"></span><span class="d-block"></span><span class="d-block"></span></div>
        </div>
        <!-- # Header Five Layout End -->
      </div>
    </div>
    <!-- # Sidenav Left -->
    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-start" id="affanOffcanvas" data-bs-scroll="true" tabindex="-1" aria-labelledby="affanOffcanvsLabel">
      <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      <div class="offcanvas-body p-0">
        <!-- Side Nav Wrapper -->
        <div class="sidenav-wrapper">
          <!-- Sidenav Profile -->
          <div class="sidenav-profile bg-gradient">
            <div class="sidenav-style1"></div>
            <!-- User Thumbnail -->
            <div class="user-profile"><img src="/img/bg-img/2.jpg" alt=""></div>
            <!-- User Info -->
            <div class="user-info">
              <h6 class="user-name mb-0">Affan Islam</h6><span>CEO, Designing World</span>
            </div>
          </div>
          <!-- Sidenav Nav -->
          <ul class="sidenav-nav ps-0">
            <NuxtLink to="/"><li><a href="#"><i class="bi bi-house-door"></i>Home</a></li></NuxtLink>
            <NuxtLink to="/categories"><li><a href="#"><i class="bi bi-cart-check"></i>Categories</a></li></NuxtLink>
            <NuxtLink to="/settings"><li><a href="#"><i class="bi bi-gear"></i>Settings</a></li></NuxtLink>
            <li>
              <div class="night-mode-nav"><i class="bi bi-moon"></i>Night Mode
                <div class="form-check form-switch">
                  <input class="form-check-input form-check-success" id="darkSwitch" type="checkbox">
                </div>
              </div>
            </li>
            <li @click="logout()"><a href="#"><i class="bi bi-box-arrow-right"></i>Logout</a></li>
          </ul>
          <!-- Social Info -->
          <div class="social-info-wrap"><a href="#"><i class="bi bi-facebook"></i></a><a href="#"><i class="bi bi-twitter"></i></a><a href="#"><i class="bi bi-linkedin"></i></a></div>
          <!-- Copyright Info -->
          <div class="copyright-info">
            <p>2021 &copy; Made by<a href="#">Designing World</a></p>
          </div>
        </div>
      </div>
    </div>
</div>
</template>
<script>
export default {
  data() {
    return {
    }
  },
  methods:{
    async logout(){
      const ip = await this.$axios.$post('http://127.0.0.1:8000/api/auth/logout')
      this.$auth.logout()
      this.$router.push('/login');
    }
  }
}
</script>