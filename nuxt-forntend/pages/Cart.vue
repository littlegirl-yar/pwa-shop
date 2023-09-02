<template>
    <div>
        <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- Cart Wrapper -->
        <div class="cart-wrapper-area">
          <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
              <table class="table mb-0 text-center">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="cartItem in cartItems" :key="cartItem.id">
                    <th scope="row"><img :src="cartItem.product.image" alt=""></th>
                    <td>
                      <h6 class="mb-1">{{cartItem.product.name}}</h6><span>{{cartItem.product.price}} × {{cartItem.amount}}</span>
                    </td>
                    <td>
                      <div class="quantity">
                        <input class="qty-text" type="text" :value="cartItem.amount" readonly>
                      </div>
                    </td>
                    <td><a class="remove-product" @click="removeCartItem(cartItem.id)"><i class="bi bi-trash3"></i></a></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-body border-top">
              <div class="apply-coupon">
                <div class="coupon-form">
                  <!-- Checkout --><a class="btn btn-danger w-100 mt-4" href="#">{{totalPrice}} ₽ Pay</a>
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
            cartItems:[],
        }
    },
    mounted() {
        this.getCartItems();
        console.log()
    },
    computed:{
        totalPrice: function(){
            let price = 0;
            for (const cartItem of this.cartItems) {
                price += cartItem.amount * cartItem.product.price;
            }
            return price
        }
    },
    methods: {
        async getCartItems(){
            try{
                const response = await this.$axios.get('http://127.0.0.1:8000/api/cartitems');
                this.cartItems = response.data.data;
            }
            catch(e){
                this.$toast.error(e.response.data.message);
            }
        },
        async removeCartItem(cartItemId){
            try{
                await this.$axios.delete('http://127.0.0.1:8000/api/cartitems/'+cartItemId).then(async () => {
                    this.$toast.success("Item deleted successfully");
                    const response = await this.$axios.get('http://127.0.0.1:8000/api/cartitems');
                    this.cartItems = response.data.data;});
            }
            catch(e){
                this.$toast.error(e.response.data.message);
            } 
        }
    }
}
</script>