<template>
  <div v-if="this.error.statusCode === 404">
    <div class="page-content-wrapper py-3">
      <div class="custom-container">
        <div class="card">
          <div class="card-body px-5 text-center"><img class="mb-4" src="/img/bg-img/39.png" alt="">
            <h4>OOPS... <br> Page not found!</h4>
            <p class="mb-4">We couldn't find any results for your search. Try again.</p>
            <NuxtLink to="/" class="btn btn-creative btn-danger">Go to Home</NuxtLink>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['error'],
    layout: 'error' // you can set a custom layout for the error page
  }
</script>