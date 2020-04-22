<template>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3" v-for="product in allPizzas" :key="product.id">
            <product :product="product"></product>
        </div>
    </div>
</template>

<script>
import Product from "./Product.vue"
import {mapGetters} from 'vuex'

export default {
    components: {
        Product
    },
    computed: mapGetters(['allPizzas']),
    async mounted() {
        this.$store.dispatch('fetchPizzas')
    },
}
</script>
