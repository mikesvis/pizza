<template>
    <div class="card h-100">
        <div class="card-body p-2">
            <div class="d-flex flex-column">
                <div class="height-image mx-auto">
                    <img :src="product.image" class="w-100">
                </div>
                <div>
                    <div class="h5">{{ product.title }}</div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white border-top-0 p-2">
            <div class="row justify-content-between align-items-center">
                <div class="col pr-0">
                    <div class="h5 m-0">price: {{ price }}</div>
                </div>
                <div class="col-auto">
                    <div class="h5 m-0">qty: {{ product.quantity }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
    props: {
        product: {
            required: true
        }
    },
    computed: {
        ...mapGetters(['currentCurrency']),
        price(){
            let price = (this.currentCurrency.course * this.product.price).toFixed(2);
            return `${this.currentCurrency.symbol}${price}`
        }
    }
}
</script>
