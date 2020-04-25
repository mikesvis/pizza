<template>
    <div>
        <div class="h1">Thanks for order!</div>
        <p>We are very pleased that you have chosen Pizzalicios as your pizza chef. Your order will be delivered in no time!</p>
        <div class="h3">Order <span class="text-primary">{{ order.number }}</span> for <span class="text-primary">{{ order.name }}</span>. Delivery address is <span class="text-primary">{{ order.address }}</span></div>

        <div class="row mb-4">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3" v-for="item in order.items" :key="item.id">
                <order-product :product="item"></order-product>
            </div>
        </div>

        <div class="row my-2 border-bottom py-1">
            <div class="col-12 col-md my-1 align-items-center">
                <div class="h6 m-0 text-right">Delivery fee:</div>
            </div>
            <div class="col-12 col-xl-2 my-1">
                <div class="h6 m-0 text-center">{{ deliveryPrice }}</div>
            </div>
        </div>

        <div class="row my-2 border-bottom py-1">
            <div class="col-12 col-md my-1 align-items-center">
                <div class="h5 m-0 text-right">Total:</div>
            </div>
            <div class="col-12 col-xl-2 my-1">
                <div class="h5 m-0 text-center text-primary">{{ totalPrice }}</div>
            </div>
        </div>

    </div>
</template>

<script>
import {mapGetters} from 'vuex'
import OrderProduct from "./OrderProduct.vue"

export default {
    computed: {
        ...mapGetters(['currentCurrency']),
        deliveryPrice() {
            if(this.order.delivery_fee == 0) {
                return 'free'
            }
            let price = (this.currentCurrency.course * this.order.delivery_fee).toFixed(2);
            return `${this.currentCurrency.symbol}${price}`
        },
        totalPrice() {
            let price = (this.currentCurrency.course * this.order.total).toFixed(2);
            return `${this.currentCurrency.symbol}${price}`
        }
    },
    components: {
        OrderProduct
    },
    props: {
        order: {
            type: Object,
            required: true
        }
    }
}
</script>
