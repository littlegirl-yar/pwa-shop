<template>
<div>
    <div class="page-content-wrapper py-3">
      <div class="container">
        <div class="row g-3 justify-content-center">
          <!-- Single Blog Card -->
          <div v-for="post in posts" :key="post.id" class="col-12 col-md-8 col-lg-7 col-xl-6">
            <div class="card shadow-sm blog-list-card">
              <div class="d-flex align-items-center">
                <div class="card-blog-img position-relative" v-bind:style="{'background-image': buildImageUrl(post.image)}"><span class="badge bg-warning text-dark position-absolute card-badge">Agency</span></div>
                <div class="card-blog-content"><NuxtLink :to="'/posts/'+post.id" class="blog-title d-block mb-3 text-dark">{{post.title}}</NuxtLink>
                <NuxtLink :to="'/posts/'+post.id" class="btn btn-primary btn-sm">Read More</NuxtLink></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-7 col-xl-6">
            <div class="card mt-3">
              <div class="card-body p-3">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center pagination-one direction-rtl">
                    <li :class="{disabled: !pagination.prev_page_url}" class="page-item" @click.prevent="getPosts(pagination.prev_page_url)">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                    </li>
                    <li :class="{disabled: !pagination.next_page_url}" class="page-item" @click.prevent="getPosts(pagination.next_page_url)">
                        <a class="page-link" href="#">Next</a>
                    </li>
                    <!-- <li  v-for="pag in pagination.slice(1,-1)" :key="pag.label" :class="[{ active: pag.active }, {disabled: !pag.url}]" class="page-item"><a class="page-link" href="#"><span aria-hidden="true">{{pag.label}}</span></a></li> -->
                  </ul>
                </nav>
              </div>
            </div>
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
            posts:[],
            pagination:{},
        }
    },
    mounted() {
        this.getPosts();
    },
    methods: {
        async getPosts(page_url){
            page_url = page_url || 'http://127.0.0.1:8000/api/posts';
            const response = await this.$axios.get(page_url);
            this.posts = response.data.data;
            this.pagination = {
                current_page: response.data.meta.current_page,
                last_page: response.data.meta.last_page,
                prev_page_url: response.data.links.prev,
                next_page_url: response.data.links.next
            }
            window.scrollTo(0,0);
        },
        buildImageUrl(image){
            return 'url('+image+')'
        }
    }
}
</script>