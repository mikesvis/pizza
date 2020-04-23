<template>
    <div>
        <div class="mb-4 rounded overflow-hidden">
            <agile :autoplay="true" :fade="true" ref="carousel" v-if="allSlides.length">
                <slide v-for="slide in allSlides" :key="slide.id" :slide="slide"></slide>
                <template slot="prevButton"><em class="fas fa-chevron-left"></em></template>
                <template slot="nextButton"><em class="fas fa-chevron-right"></em></template>
            </agile>
        </div>
        <h1>Menu</h1>
        <div class="mb-3">
            <pizza-list></pizza-list>
        </div>
        <select-modal></select-modal>
    </div>
</template>

<script>
    import { VueAgile } from 'vue-agile'
    import PizzaList from './PizzaList'
    import SelectModal from './SelectModal'
    import Slide from './Slide'
    import {mapGetters} from 'vuex'

    export default {
        components: {
            agile: VueAgile,
            PizzaList,
            SelectModal,
            Slide,
        },
        computed: {
            ...mapGetters(['allSlides'])
        },
        mounted() {
            this.$store.dispatch('fetchSlides')
        },
    }
</script>
