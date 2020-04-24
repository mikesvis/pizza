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
                    <input type="tetx" class="form-control" id="address" placeholder="" v-model="form.address" :class="{ 'is-invalid' : form.errors.has('address') }">
                    <div class="invalid-feedback" v-if="form.errors.has('address')" v-text="form.errors.get('address')"></div>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" id="comments" rows="3" v-model="form.comments" :class="{ 'is-invalid' : form.errors.has('comments') }"></textarea>
                    <div class="invalid-feedback" v-if="form.errors.has('comments')" v-text="form.errors.get('comments')"></div>
                </div>
                <!-- <input type="hidden" v-for="item in allItemsKeys" :key="item.id" :name="'ids['+item.id+']'" :value="item.quantity" v-model="form.ids"> -->
            </form>
        </div>
        <template v-slot:modal-footer="{ ok, cancel }">
            <b-button variant="secondary" @click="cancel()" class="mr-auto h4">
                Close
            </b-button>

            <b-button variant="primary" @click="submitForm" class="h4" v-if="allItemsKeys.length" :disabled="formValid">
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
        ...mapGetters(['allItemsKeys', 'currentCurrency']),
        formValid(){
            return this.form.errors.any()
        }
    },
    data() {
        return {
            form: new Form({
                name: "",
                phone: "",
                address: "",
                comments: "",
                ids: []
            }),
        }
    },
    methods: {
        submitForm(){
            this.form.ids = {};
            for(let i in this.allItemsKeys) {
                this.form.ids[this.allItemsKeys[i].id] = this.allItemsKeys[i].quantity;
            }
            console.log(JSON.stringify(this.form.data()))
            this.form.post('/api/order')
                .then(() => console.log('Then in Vue triggered'))
				.catch(() => console.log('Reject in Vue triggered'));
        }
    }
}
</script>
