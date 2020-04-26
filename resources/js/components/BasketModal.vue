<template>
    <b-modal
        id="basketModal"
        centered
        title="My order"
        >
        <div v-if="basketItems.length">
            <basket-item v-for="basketItem in basketItems" :key="basketItem.id" :product="basketItem"></basket-item>
        </div>
        <div v-if="subTotal != 0">
            <div class="row my-3 align-items-center">
                <div class="col-6 col-sm-9 text-left text-right"><div class="h6 m-0">Subtotal:</div></div>
                <div class="col text-right"><div class="h6 m-0"><strong>{{ subTotalPrice }}</strong></div></div>
            </div>
            <div class="row my-3 align-items-center">
                <div class="col-6 col-sm-9 text-left text-right"><div class="h6 m-0">Delivery fee:</div></div>
                <div class="col text-right"><div class="h6 m-0"><strong>{{ deliveryPrice }}</strong></div></div>
            </div>
            <div class="row mt-3 align-items-center">
                <div class="col-6 col-sm-9 text-left text-right"><div class="h5 m-0">Total:</div></div>
                <div class="col text-right"><div class="h5 m-0"><strong>{{ totalPrice }}</strong></div></div>
            </div>
        </div>
        <div v-if="basketItems.length == 0">
            <div class="h4 text-center">Your basket is empty</div>
        </div>
        <template v-slot:modal-footer="{ ok, cancel }">
            <b-button variant="secondary" @click="cancel()" class="mr-auto h4">
                Close
            </b-button>
            <b-button variant="primary" @click="proceedToCheckout()" class="h4" v-if="basketItems.length">
                Checkout
            </b-button>
        </template>
    </b-modal>
</template>

<script>
import {BButton} from 'bootstrap-vue'
import {mapGetters} from 'vuex'
import BasketItem from './BasketItem'

export default {
    components: {
        BasketItem
    },
    computed: {
        ...mapGetters(['basketItems', 'subTotal', 'delivery', 'total', 'currentCurrency']),
        subTotalPrice(){
            let price = (this.currentCurrency.course * this.subTotal).toFixed(2)
            return `${this.currentCurrency.symbol}${price}`
        },
        deliveryPrice(){
            let price = (this.currentCurrency.course * this.delivery).toFixed(2)
            if(price == 0) {
                return 'free'
            }
            return `${this.currentCurrency.symbol}${price}`
        },
        totalPrice(){
            let price = (this.currentCurrency.course * this.total).toFixed(2)
            return `${this.currentCurrency.symbol}${price}`
        },
    },
    methods: {
        proceedToCheckout(){
            if(this.basketItems.length) {
                this.$bvModal.hide('basketModal')
                this.$bvModal.show('checkoutModal')
            }
        }
    },
    watch: {
        basketItems: function(newItems, oldItems) {
            if(newItems.length == 0) {
                this.$bvModal.hide('basketModal')
            }
        }
    }
}
</script>
