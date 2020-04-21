<template>
    <div class="mobile-navigation" :class="{ 'mobile-navigation--shown' : menuOpened }">
        <div class="mobile-navigation__overlay">
            <div class="mobile-navigation__menu">
                <span class="mobile-navigation__toggle btn btn-primary border-0 rounded-0 d-block d-md-none" @click="closeMenu()"><em class="fas fa-times fa-2x"></em></span>
                <ul class="navigation list-unstyled m-0">
                    <li class="navigation__item d-block d-md-none py-3">
                        <div class="h2 text-center text-white m-0">Pizzalicious</div>
                    </li>
                    <li class="navigation__item mx-4 my-3 m-md-0">
                        <router-link class="navigation__link text-decoration-none" :to="{ name: 'home' }" exact>Menu</router-link>
                    </li>
                    <li class="navigation__item mx-4 my-3 m-md-0">
                        <router-link class="navigation__link text-decoration-none" :to="{ name: 'contact' }">Contact</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
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
        closeMenu() {
            this.$emit('update:menuOpened', false)
        }
    }
}
</script>
