<template>
    <div class="slide">
        <img :src="slide.image" :alt="slide.name" class="slide__image">
        <div class="slide__text h-100 d-flex flex-column justify-content-center text-white" v-html="slide.text"></div>
    </div>
</template>

<script>
export default {
    props: {
        slide: {
            required: true
        }
    }
}
</script>
