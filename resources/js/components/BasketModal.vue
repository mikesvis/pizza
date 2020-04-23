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
            {{ subTotalPrice }} / {{ deliveryPrice }} / {{ totalPrice }}
        </div>
        <div v-if="basketItems.length == 0">
            <div class="h4 text-center">Your basket is empty</div>
        </div>
        <template v-slot:modal-footer="{ ok, cancel }">
            <b-button variant="secondary" @click="cancel()" class="mr-auto h4">
                Close
            </b-button>
            <b-button variant="primary" @click="ok()" class="h4" v-if="basketItems.length">
                Checkout
            </b-button>
        </template>
    </b-modal>
</template>
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
            return (this.currentCurrency.course * this.subTotal).toFixed(2);
        },
        deliveryPrice(){
            return (this.currentCurrency.course * this.delivery).toFixed(2);
        },
        totalPrice(){
            return (this.currentCurrency.course * this.total).toFixed(2);
        },
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
