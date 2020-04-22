<template>
    <div class="card h-100">
        <div class="card-body p-2">
            <div class="d-flex flex-column">
                <div>
                    <img :src="product.image.path" class="w-100">
                </div>
                <div>
                    <div class="h5">{{ product.title }}</div>
                </div>
                <div>
                    <p class="text-muted">{{ product.description }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white border-top-0 p-2">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <div class="h5 m-0">{{ price }}</div>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-primary btn-sm h5 m-0" @click="showSelectModal()">select</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        product: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            currency: '$'
        }
    },
    computed: {
        price(){
            let price = this.product.price
            if(price){
                return `${this.currency}${this.product.price}`
            } else {
                let minPrice = Math.min(...this.product.variants.map(d => d.price.price));
                return `from ${this.currency}${minPrice}`
            }

        }
    },
    methods: {
        showSelectModal(){
            console.log(this.product)
        }

    }

}
</script>
