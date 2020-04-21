<template>
    <span class="mobile-menu-toggler btn btn-outline-primary" @click="openMenu()"><em class="fas fa-bars"></em></span>
</template>

<script>
export default {
    props: {
        menuOpened: {
            type: Boolean,
            required: true
        }
    },
    methods: {
        openMenu() {
            this.$emit('update:menuOpened', true)
        }
    }
}
</script>
