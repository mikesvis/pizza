<template>
    <div>
        <div class="mb-4 rounded overflow-hidden">
            <agile :autoplay="true" :fade="true" ref="carousel" v-if="allSlides.length">
                <slide v-for="slide in allSlides" :key="slide.id" :slide="slide"></slide>
                <!-- <div class="slide">
                    <img src="/images/slides/slide-01.jpg" alt="Pizzalicious is great!" class="slide__image">
                    <div class="slide__text h-100 d-flex flex-column justify-content-center text-white">
                        <div class="slide__slogon text-white text-center">Pizzalicious is delicious</div>
                    </div>
                </div>
                <div class="slide">
                    <img src="/images/slides/slide-02.jpg" alt="Pizzalicious is great!" class="slide__image">
                    <div class="slide__text h-100 d-flex flex-column justify-content-around">
                        <div class="slide__slogon text-white text-center">Instant delivery</div>
                    </div>
                </div>
                <div class="slide">
                    <img src="/images/slides/slide-03.jpg" alt="Pizzalicious is great!" class="slide__image">
                    <div class="slide__text h-100 d-flex flex-column justify-content-around">
                        <div class="slide__slogon text-white text-center">Fresh ingredients</div>
                    </div>
                </div> -->
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
