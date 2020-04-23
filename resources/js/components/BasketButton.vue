<template>
    <div>
        <b-button
            variant="outline-primary"
            class="position-relative"
            @click="showBasket()" id="basketButton"
            v-b-popover.click.blur="{
                content: emptyBasketContent,
                html: true,
                placement: 'bottomleft',
                disabled: !basketIsEmpty,
            }">
            <span class="d-none d-md-inline h6 m-0">My order</span>
            <em class="fas fa-shopping-cart d-inline d-md-none"></em>
            <span class="cart-items d-block bg-primary text-white position-absolute">{{ basketItemsCount }}</span>
        </b-button>
        <!-- <b-popover :disabled="!basketIsEmpty" trigger="click.blur" target="basketButton" placement="bottomleft">
            <div class="h5 text-center">Basket is empty</div>
            <div class="h6 text-center">Choose something<br /><strong>pizzalicious!</strong></div>
        </b-popover> -->
    </div>
</template>

<script>
import {mapGetters} from 'vuex'
import {BButton, BPopover} from  'bootstrap-vue'

export default {
    data(){
        return {
            emptyBasketContent: `
                <div class="h5 text-center">Basket is empty</div>
                <div class="h6 text-center">Choose something<br /><strong>pizzalicious!</strong></div>
            `
        }
    },
    computed: {
        ...mapGetters(['basketItemsCount']),
        basketIsEmpty() {
            return (this.basketItemsCount === null) ? true : false
        }
    },
    methods: {
        showBasket() {
            if(this.basketItemsCount != null) {
                console.log('show modal');
            } else {
                console.log('show dropdown');
            }
        }
    }
}
</script>
