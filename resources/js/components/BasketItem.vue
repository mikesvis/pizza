<template>
    <div class="row py-3 border-bottom">
        <div class="col-4 col-sm-3">
            <div class="d-flex flex-column align-items-center justify-content-around h-100">
                <div class="text-center d-flex align-items-center justify-content-around">
                    <img v-if="product" :src="product.image" :alt="product.title" class="d-block w-100">
                </div>
            </div>
        </div>
        <div class="col pl-0">
            <div class="d-flex flex-column justify-content-between h-100">
                <div>
                    <div class="h6 mb-1">{{ product.title }}</div>
                </div>
                <div class="mb-1">{{ price }}</div>
                <div>
                    <div class="row align-items-center">
                        <div class="col">
                            <b-button-group size="sm">
                                <b-button variant="primary" class="toggler--button" @click="$store.dispatch('decrementItem', product.id)"><i class="fas fa-minus fa-sm"></i></b-button>
                                <b-button variant="outline-primary" class="toggler--center" :disabled="true">{{ quantity }}</b-button>
                                <b-button variant="primary" class="toggler--button" @click="$store.dispatch('incrementItem', product.id)"><i class="fas fa-plus fa-sm"></i></b-button>
                            </b-button-group>
                        </div>
                        <div class="col text-right">
                                <b-button variant="outline-danger" size="sm" class="border-0" @click="$store.dispatch('deleteItem', product.id)"><i class="fas fa-trash-alt fa-lg"></i></b-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'
import {BButton, BButtonGroup} from 'bootstrap-vue'

export default {
    components: {
        'b-button': BButton,
        'b-button-group': BButtonGroup
    },
    props: {
        product: {
            required: true
        }
    },
    computed: {
        ...mapGetters(['currentCurrency', 'allItemsKeys']),
        price(){
            let price = (this.currentCurrency.course * this.product.price).toFixed(2);
            return `${this.currentCurrency.symbol}${price}`
        },
        quantity(){
            let item = this.allItemsKeys.find(item => item.id === this.product.id)
            if(item) {
                return item.quantity
            }
            return 0
        }
    }
}
</script>
