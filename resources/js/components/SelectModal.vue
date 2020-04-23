<template>
    <b-modal
            id="productSelectionModal"
            centered
            title="Select your option"
        >
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="d-flex flex-column align-items-center justify-content-around h-100">
                    <div class="height-image text-center d-flex align-items-center justify-content-around">
                        <img v-if="viewedVariant" :src="viewedVariant.image" :alt="viewedVariant.title" :width="viewedVariant.image_size" class="d-block">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6" v-if="chosenProduct">
                <div class="h3">{{ chosenProduct.title }}</div>
                <p>{{ chosenProduct.description }}</p>

                <div class="mt-2 mb-4" v-if="sizes || crusts">
                    <div v-if="sizes" class="my-2">
                        <b-button-group size="sm" class="w-100">
                            <b-button
                                v-for="size in sizeButtons"
                                :key="size.id"
                                :disabled="size.disabled"
                                :variant="size.selected"
                                @click="changeVariant(size)"
                            >{{ size.title }}</b-button>
                        </b-button-group>
                    </div>
                    <div v-if="crusts" class="my-2">
                        <b-button-group size="sm" class="w-100">
                            <b-button
                                v-for="crust in crustButtons"
                                :key="crust.id"
                                :disabled="crust.disabled"
                                :variant="crust.selected"
                                @click="changeVariant(crust)"
                            >{{ crust.title }}</b-button>
                        </b-button-group>
                    </div>
                </div>
                <div class="h4 m-0 text-right">{{currentCurrency.symbol}}{{ price }}</div>
            </div>
        </div>
        <template v-slot:modal-footer="{ ok, cancel }">
            <b-button variant="secondary" @click="cancel()" class="mr-auto h4">
                Close
            </b-button>
            <b-button variant="primary" @click="addToBasket()" class="h4" v-html="addToBasketText">
            </b-button>
        </template>
    </b-modal>
</template>

<script>
import {BButton, BButtonGroup} from 'bootstrap-vue'
import {mapGetters} from 'vuex'

export default {
    components: {
        'b-button': BButton,
        'b-button-group': BButtonGroup
    },
    data(){
        return {
            sizes: [],
            crusts: [],
        }
    },
    computed: {
        ...mapGetters(['viewedVariant', 'chosenProduct', 'allVariants', 'allSizes', 'allCrusts', 'currentCurrency', 'allItemsKeys']),
        sizeButtons(){
            this.sizes = [];
            for(let i in this.allSizes){
                this.sizes.push({
                    id: i,
                    title: this.allSizes[i],
                    disabled: (this.viewedVariant.size_id != i && this.isSizeDisabled(i)),
                    selected: this.viewedVariant.size_id == i ? 'primary' : 'outline-primary',
                    size_id: i,
                    crust_id: this.viewedVariant.crust_id,
                })
            }
            return this.sizes;
        },
        crustButtons(){
            this.crusts = [];
            for(let i in this.allCrusts){
                this.crusts.push({
                    id: i,
                    title: this.allCrusts[i],
                    disabled: (this.viewedVariant.crust_id != i && this.isCrustDisabled(i)),
                    selected: this.viewedVariant.crust_id == i ? 'primary' : 'outline-primary',
                    size_id: this.viewedVariant.size_id,
                    crust_id: i,
                })
            }
            return this.crusts;
        },
        price() {
            return (this.currentCurrency.course * this.viewedVariant.price).toFixed(2);
        },
        addToBasketText() {
            if(this.viewedVariant) {
                let itemInBasket = this.allItemsKeys.find(item => (item.id === this.viewedVariant.price_id && item.quantity > 0))
                if(itemInBasket) {
                    return `Got ${itemInBasket.quantity} | Add more`
                }
            }
            return 'Add to basket'
        }
    },
    methods: {
        isSizeDisabled(size_id) {
            let result = true;
            for(let i in this.allVariants) {
                if(this.allVariants[i].crust_id == this.viewedVariant.crust_id && this.allVariants[i].size_id == size_id) {
                    result = false;
                    break;
                }
            }
            return result;
        },
        isCrustDisabled(crust_id) {
            let result = true;
            for(let i in this.allVariants) {
                if(this.allVariants[i].size_id == this.viewedVariant.size_id && this.allVariants[i].crust_id == crust_id) {
                    result = false;
                    break;
                }
            }
            return result;
        },
        changeVariant(variant) {
            let index = 0;
            for(let i in this.allVariants) {
                if(this.allVariants[i].size_id == variant.size_id && this.allVariants[i].crust_id == variant.crust_id) {
                    index = i;
                    break;
                }
            }
            this.$store.dispatch('changeSelectedOption', index)
        },
        addToBasket() {
            this.$store.dispatch('incrementItem', this.viewedVariant.price_id)
        }
    }
}
</script>
