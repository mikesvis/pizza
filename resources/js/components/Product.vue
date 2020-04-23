<template>
    <div class="card h-100">
        <div class="card-body p-2">
            <div class="d-flex flex-column">
                <div class="height-image mx-auto">
                    <img :src="product.image" class="w-100" @click="selectOrBuy('image')" :class="{ 'cursor-pointer' : isComplexProduct }">
                </div>
                <div>
                    <div class="h5">{{ product.title }}</div>
                </div>
                <div>
                    <p class="text-muted">{{ product.description }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white border-top-0 p-2">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <div class="h5 m-0">{{ price }}</div>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-primary btn-sm h5 m-0" @click="selectOrBuy('button')">{{ selectOrBuyButtonState }}</button>
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
        ...mapGetters(['currentCurrency', 'allItemsKeys']),
        isComplexProduct() {
            return this.product.pricing.type == 'complex' ? true: false
        },
        price(){
            let price = (this.currentCurrency.course * this.product.pricing.price).toFixed(2);
            return `${this.product.pricing.prefix} ${this.currentCurrency.symbol}${price}`
        },
        selectOrBuyButtonText(){
            return this.isComplexProduct ? 'select': 'buy'
        },
        selectOrBuyButtonState() {
            if(this.isComplexProduct) {
                return 'select'
            }
            return this.isAlreadyInBasket ? 'buy': 'buy 1 more'
        },
        isAlreadyInBasket() {
            return this.allItemsKeys.find(item => (item.id === this.product.pricing.id && item.quantity > 0))
        }
    },
    methods: {
        selectOrBuy(type){
            if(this.isComplexProduct) {
                this.$store.dispatch('fetchProductOptions', this.product)
                this.$bvModal.show('productSelectionModal')
            } else {
                if(type == 'button'){
                    this.$store.dispatch('incrementItem', this.product.pricing.id)
                }
            }
        },
    }

}
</script>
