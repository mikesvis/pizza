<template>
    <b-modal
        id="basketModal"
        centered
        title="My order"
        >
        123
        <template v-slot:modal-footer="{ ok, cancel }">
            <b-button variant="secondary" @click="cancel()" class="mr-auto h4">
                Close
            </b-button>
            <b-button variant="primary" @click="ok()" class="h4">
                Checkout
            </b-button>
        </template>
    </b-modal>
</template>
</template>

<script>
import {BButton} from 'bootstrap-vue'
import {mapGetters} from 'vuex'

export default {

}
</script>
