<template>
    <div>
        <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- User Information-->
        <div class="card user-info-card mb-3">
          <div class="card-body d-flex align-items-center">
            <div class="user-profile me-3"><img src="/img/bg-img/2.jpg" alt=""><i class="bi bi-pencil"></i>
              <form action="#">
                <input class="form-control" type="file">
              </form>
            </div>
            <div class="user-info">
              <div class="d-flex align-items-center">
                <h5 class="mb-1">{{this.$auth.user.data.name}}</h5><span class="badge bg-warning ms-2 rounded-pill">Pro</span>
              </div>
              <p class="mb-0">UX/UI Designer</p>
            </div>
          </div>
        </div>
        <!-- User Meta Data-->
        <div class="card user-data-card">
          <div class="card-body">
            <form action="#">
              <div class="form-group mb-3">
                <label class="form-label" for="fullname">Full Name</label>
                <input class="form-control" id="fullname" type="text" :value="this.$auth.user.data.name" placeholder="Full Name" readonly>
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="email">Email Address</label>
                <input class="form-control" id="email" type="text" :value="this.$auth.user.data.email" placeholder="Email Address" readonly>
              </div>
              <button class="btn btn-success w-100" type="submit">Update Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
</template>
<script>
export default {
  middleware: 'auth',
}
</script>