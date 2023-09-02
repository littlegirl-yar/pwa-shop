<template>
    <div>
<div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card product-details-card mb-3"><span class="badge bg-warning text-dark position-absolute product-badge">Sale -10%</span>
          <div class="card-body">
            <div class="product-gallery-wrapper">
              <div class="product-gallery">
                  <a href="/img/bg-img/p1.jpg"><img class="rounded" :src="this.product.image" alt=""></a>
              </div>
            </div>
          </div>
        </div>
        <div class="card product-details-card mb-3 direction-rtl">
          <div class="card-body">
            <h3>{{this.product.name}}</h3>
            <h1>{{this.product.price}} ₽</h1>
            <form @submit.prevent="addToCart">
              <div class="input-group">
                <input v-model="amount" class="input-group-text form-control" type="number" value="1">
                <button class="btn btn-primary w-50" type="submit">Add to Cart</button>
              </div>
            </form>
          </div>
        </div>
        <div class="card product-details-card mb-3 direction-rtl">
          <div class="card-body">
            <h5>Description</h5>
            <p class="mb-0">{{this.product.description}}</p>
            <div class="rating-card-two mt-4">
              <!-- Rating result -->
              <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                <div class="rating"><a href="#"><i class="bi bi-star-fill"></i></a><a href="#"><i class="bi bi-star-fill"></i></a><a href="#"><i class="bi bi-star-fill"></i></a><a href="#"><i class="bi bi-star-fill"></i></a><a href="#"><i class="bi bi-star-half"></i></a></div><span>4.44 out of 5 ratings</span>
              </div>
              <!-- Rating Details -->
              <div class="rating-detail">
                <!-- Single Rating Details -->
                <div class="d-flex align-items-center mt-2"><span>5 star</span>
                  <div class="progress-bar-wrapper">
                    <div class="progress">
                      <div class="progress-bar bg-warning" style="width: 78%;" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div><span>78%</span>
                </div>
                <!-- Single Rating Details -->
                <div class="d-flex align-items-center mt-2"><span>4 star</span>
                  <div class="progress-bar-wrapper">
                    <div class="progress">
                      <div class="progress-bar bg-warning" style="width: 14%;" role="progressbar" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div><span>14%</span>
                </div>
                <!-- Single Rating Details -->
                <div class="d-flex align-items-center mt-2"><span>3 star</span>
                  <div class="progress-bar-wrapper">
                    <div class="progress">
                      <div class="progress-bar bg-warning" style="width: 8%;" role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div><span>8%</span>
                </div>
                <!-- Single Rating Details -->
                <div class="d-flex align-items-center mt-2"><span>2 star</span>
                  <div class="progress-bar-wrapper">
                    <div class="progress">
                      <div class="progress-bar bg-warning" style="width: 0%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div><span>0%</span>
                </div>
                <!-- Single Rating Details -->
                <div class="d-flex align-items-center mt-2"><span>1 star</span>
                  <div class="progress-bar-wrapper">
                    <div class="progress">
                      <div class="progress-bar bg-warning" style="width: 0%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div><span>0%</span>
                </div>
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
            product:{},
            'amount': 1,
        }
    },
    mounted() {
        this.getProduct();
    },
    methods: {
        async getProduct(){
            const response = await this.$axios.get('http://127.0.0.1:8000/api/products/'+this.$route.params.id);
            this.product = response.data.data;
        },
        async addToCart(){
          try{
            await this.$axios.post('http://127.0.0.1:8000/api/cartitems', {'product_id': this.product.id, 'amount':this.amount });
            this.$toast.success("Product added to Cart");
          }
          catch(e){
            this.$toast.error(e.response.data.message);
          }
        },
    }
}
</script>