<template>
    <div>
        <div class="mb-3 rounded overflow-hidden">
            <agile :fade="true" ref="carousel">
                <div class="slide">
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
                </div>
                <template slot="prevButton"><em class="fas fa-chevron-left"></em></template>
                <template slot="nextButton"><em class="fas fa-chevron-right"></em></template>
            </agile>
        </div>
        <h1>Menu</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab nam corrupti harum. Voluptates corrupti expedita similique cum nemo exercitationem libero enim debitis dolor, in sequi. Nobis perspiciatis ipsam aperiam error?</p>
    </div>
</template>

<script>
    import { VueAgile } from 'vue-agile'

    export default {
        components: {
            agile: VueAgile
        }
    }
</script>
