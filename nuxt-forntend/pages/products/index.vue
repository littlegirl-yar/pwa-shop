<template>
<div>
    <div class="page-content-wrapper py-3">
      <!-- Top Products-->
      <div class="top-products-area product-list-wrap">
        <div class="container">
          <div class="row g-3">
            <!-- Single Top Product Card-->
            <div v-for="product in products" :key="product.id" class="col-12">
              <div class="card single-product-card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="card-side-img">
                        <NuxtLink :to="'/products/'+product.id">
                        <!-- Product Thumbnail--><a class="product-thumbnail d-block" href="#"><img :src="product.image" alt="">
                        <!-- Badge--><span class="badge bg-primary">Sale</span></a>
                        </NuxtLink>
                    </div>
                    <div class="card-content px-4 py-2">
                        <NuxtLink :to="'/products/'+product.id">
                       <!-- Product Title--><a class="product-title d-block text-truncate mt-0" href="#">{{product.name}}</a>
                        </NuxtLink>
                      <!-- Product Price-->
                      <p @click="addToCart(product.id)" class="sale-price">{{product.price}} ₽</p>
                      <!-- Add To Cart Button--><a @click="addToCart(product.id)" class="btn btn-outline-danger btn-sm ">
                        <svg class="bi bi-cart me-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                        </svg>Add to Cart</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pagination-->
      <div class="shop-pagination pt-3">
        <div class="container">
          <div class="card">
            <div class="card-body py-3">
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center pagination-one direction-rtl">
                    <li :class="{disabled: !pagination.prev_page_url}" class="page-item" @click.prevent="getPhones(pagination.prev_page_url)">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                    </li>
                    <li :class="{disabled: !pagination.next_page_url}" class="page-item" @click.prevent="getPhones(pagination.next_page_url)">
                        <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
              </nav>
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
            products:[],
            pagination:{},
        }
    },
    mounted() {
        this.getPhones();
    },
    methods: {
        async getPhones(page_url){
          page_url = page_url || 'http://127.0.0.1:8000/api/categories/'+localStorage.getItem('categoryId')+'/products';
          try{
            const response = await this.$axios.get(page_url);
            this.products = response.data.data;
            this.pagination = {
              current_page: response.data.meta.current_page,
              last_page: response.data.meta.last_page,
              prev_page_url: response.data.links.prev,
              next_page_url: response.data.links.next
            }
            window.scrollTo(0,0);
          }
          catch(e){
            this.$toast.error(e.response.data.message);
          }
        },
        buildImageUrl(image){
          return 'url('+image+')'
        },
        async addToCart(productId){
          try{
            await this.$axios.post('http://127.0.0.1:8000/api/cartitems', {'product_id': productId, 'amount': 1 });
            this.$toast.success("Product added to Cart");
          }
          catch(e){
            this.$toast.error(e.response.data.message);
          }
        }
    }
}
</script>