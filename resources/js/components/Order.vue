<template>
    <div>
        <order-info v-if="order" :order="order"></order-info>
    </div>
</template>

<script>
import OrderInfo from './OrderInfo'

export default {
    components: {
        OrderInfo
    },
    props: {
        orderUuid: {
            required: true
        }
    },
    data() {
        return {
            order: {}
        }
    },
    async mounted() {
        const resource = await fetch('/api/order/' + this.orderUuid)
        .then(response => {
            if (!response.ok) { throw response }
            return response.json()
        }).then(json => {
            this.order = json.data
        }).catch(err => {
            this.$router.push({name: 'not-found'})
        });
    }
}
</script>
