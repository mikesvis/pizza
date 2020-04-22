<template>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3" v-for="product in products" :key="product.id">
            <product :product="product"></product>
        </div>
    </div>
</template>

<script>
import Product from "./Product.vue";

export default {
    components: {
        Product
    },
    async mounted() {
        const resource = await fetch('/api/pizza')
        const products = await resource.json()
        this.products = products
    },
    data(){
        return {
            products: []
        }
    }
}
</script>
