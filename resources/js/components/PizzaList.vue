<template>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3" v-for="product in allPizzas.data" :key="product.id">
            <product :product="product"></product>
        </div>

    </div>
</template>

<script>
import Product from "./Product.vue"
import { BModal } from 'bootstrap-vue'
import {mapGetters} from 'vuex'

export default {
    components: {
        Product, BModal
    },
    computed: mapGetters(['allPizzas']),
    async created() {
        this.$store.dispatch('fetchPizzas')
    },
}
</script>
