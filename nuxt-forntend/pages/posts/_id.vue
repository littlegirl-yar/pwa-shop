<template>
    <div>
        <div class="page-content-wrapper">
      <div class="container">
        <div class="pt-3 d-block"></div>
        <div class="blog-details-post-thumbnail position-relative">
          <!-- Post Image --><img class="w-100 rounded-lg" :src="this.post.image" alt="">
        </div>
      </div>
      <div class="blog-description py-3">
        <div class="container"><a class="badge bg-primary mb-2 d-inline-block" href="#">News</a>
          <h3 class="mb-3">{{this.post.title}}</h3>
          <div class="d-flex align-items-center mb-4"><a class="badge-avater" href="#"><img class="img-circle" src="/img/bg-img/user1.png" alt=""></a><span class="ms-2">Jarah Clark</span></div>
          <p class="fz-14">{{this.post.description}}</p>
        </div>
      </div>
      <!-- All Comments -->
      <div class="rating-and-review-wrapper pb-3 mt-3">
        <div class="container">
          <h6 class="mb-3">All comments</h6>
          <!-- Rating Review -->
          <div class="rating-review-content">
            <ul class="ps-2">
              <li class="single-user-review d-flex">
                <div class="user-thumbnail mt-0"><img src="/img/bg-img/2.jpg" alt=""></div>
                <div class="rating-comment">
                  <p class="comment mb-1">I strongly recommend this agency to everyone interested in running a business.</p><span class="name-date">12 Dec 2021</span>
                </div>
              </li>
              <li class="single-user-review d-flex">
                <div class="user-thumbnail mt-0"><img src="/img/bg-img/20.jpg" alt=""></div>
                <div class="rating-comment">
                  <p class="comment mb-1">You've saved our business! Thanks guys, keep up the good work! The best on the net!</p><span class="name-date">8 Dec 2021</span>
                </div>
              </li>
              <li class="single-user-review d-flex">
                <div class="user-thumbnail mt-0"><img src="/img/bg-img/21.jpg" alt=""></div>
                <div class="rating-comment">
                  <p class="comment mb-1">Absolutely wonderful! I wish I would have thought of it first. I would be lost without agency.</p><span class="name-date">28 Nov 2021</span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Comment Form -->
      <div class="ratings-submit-form pb-3">
        <div class="container">
          <h6 class="mb-3">Submit a comment</h6>
          <form action="#">
            <div class="form-group">
              <textarea class="form-control mb-3 border-0" name="comment" cols="30" rows="10" placeholder="Write a comment"></textarea>
            </div>
            <button class="btn w-100 btn-primary" type="submit">Post Comment</button>
          </form>
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
            post:{},
        }
    },
    mounted() {
        this.getPost();
    },
    methods: {
        async getPost(){
            const response = await this.$axios.get('http://127.0.0.1:8000/api/posts/'+this.$route.params.id);
            this.post = response.data.data;
        },
    }
}
</script>