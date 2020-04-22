<template>
    <div class="btn-group">
        <button
        v-for="currency in allCurrencies"
        :key="currency.id"
        class="btn" :class="isSelectedCurrency(currency)"
        @click="toggleCurrency(currency.code)">{{ currency.symbol }}</button>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
    computed: {
        ...mapGetters(['allCurrencies', 'currentCurrency']),
    },
    methods: {
        isSelectedCurrency(currency){
            return this.currentCurrency == currency ? 'btn-primary' : 'btn-outline-primary';
        },
        toggleCurrency(code){
            this.$store.dispatch('changeCurrency', code)
        }
    }
}
</script>
