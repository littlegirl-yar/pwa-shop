<template>
<div>
    <div class="page-content-wrapper py-3">
        <div class="container">
            <div v-for="category in categories" :key="category.id" class="card direction-rtl mt-3">
                <div class="card-body">
                    <a @click="openProductPage(category.id)"><h6 class="text-center">{{category.name}}</h6></a>
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
            categories:[],
        }
    },
    mounted() {
        this.getCategories();
    },
    methods: {
        async getCategories(){
            const response = await this.$axios.get('http://127.0.0.1:8000/api/categories');
            this.categories = response.data.data;
        },
        openProductPage(categoryId){
            localStorage.setItem('categoryId', categoryId)
            //this.$store.commit('category/setCategoryId', categoryId)
            this.$router.push({ path: '/products' })
        }
    }
}
</script>