<template>
    <b-modal
        id="checkoutModal"
        centered
        title="Checkout"
        >
        <div v-if="allItemsKeys.length">
            <form action="" method="post" @submit.prevent="submitForm" @keydown="form.errors.clear($event.target.name)">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="" v-model="form.name" :class="{ 'is-invalid' : form.errors.has('name') }">
                    <div class="invalid-feedback" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="" v-model="form.phone" :class="{ 'is-invalid' : form.errors.has('phone') }">
                    <div class="invalid-feedback" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></div>
                </div>
                <div class="form-group">
                    <label for="address">Delivery address</label>
                    <input type="text" class="form-control" id="address" placeholder="" v-model="form.address" :class="{ 'is-invalid' : form.errors.has('address') }">
                    <div class="invalid-feedback" v-if="form.errors.has('address')" v-text="form.errors.get('address')"></div>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" id="comments" rows="3" v-model="form.comments" :class="{ 'is-invalid' : form.errors.has('comments') }"></textarea>
                    <div class="invalid-feedback" v-if="form.errors.has('comments')" v-text="form.errors.get('comments')"></div>
                </div>
            </form>
        </div>
        <template v-slot:modal-footer="{ ok, cancel }">
            <b-button variant="secondary" @click="cancel()" class="mr-auto h4">
                Close
            </b-button>

            <b-button variant="primary" @click="submitForm" class="h4" v-if="allItemsKeys.length">
                Submit
            </b-button>
        </template>
    </b-modal>
</template>

<script>
import {mapGetters} from 'vuex'
import Form from './form/Form'

export default {
    computed: {
        ...mapGetters(['allItemsKeys', 'currencyCode'])
    },
    data() {
        return {
            form: new Form({
                name: "",
                phone: "",
                address: "",
                comments: "",
                user_currency: "",
                ids: ""
            }),
        }
    },
    methods: {
        submitForm(){
            this.form.ids = {};
            for(let i in this.allItemsKeys) {
                this.form.ids[this.allItemsKeys[i].id] = this.allItemsKeys[i].quantity
            }
            this.form.user_currency = this.currencyCode
            this.form.post('/api/order')
                .then((responseData) => {
                    this.$bvModal.hide('checkoutModal')
                    this.$store.dispatch('clearBasket')
                    this.$router.push({ name: 'order', params: { orderUuid: responseData.uuid } })
                });
        }
    }
}
</script>
