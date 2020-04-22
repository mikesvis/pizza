<template>
    <b-modal
            id="productSelectionModal"
            centered
            title="Select your option"
            ok-only
        >
        <div class="row">
            <div class="col-12 col-sm-6">
                <img :src="clickedVariant.image.path" :alt="clickedVariant.title" class="w-100">
            </div>
            <div class="col-12 col-sm-6">
                <div class="h3">{{ clickedProduct.title }}</div>
                <p>{{ clickedProduct.description }}</p>
                <div class="h6 text-muted">{{ clickedVariant.title }}</div>
            </div>
        </div>
        <template v-slot:modal-footer="{ ok, cancel }">
            <b-button variant="secondary" @click="cancel()" class="mr-auto">
                Close
            </b-button>
        <!-- Emulate built in modal footer ok and cancel button actions -->
            <b-button variant="primary" @click="ok()">
                Add to basket
            </b-button>
        </template>
            <!--  -->
    </b-modal>
</template>

<script>
import {BButton} from 'bootstrap-vue'
import {mapGetters} from 'vuex'

export default {
    components: {
        'b-button': BButton
    },
    computed: {
        ...mapGetters(['clickedProduct', 'clickedVariant'])
    },
}
</script>
