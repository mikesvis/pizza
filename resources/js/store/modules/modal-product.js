export default {
    actions: {
        fetchSelectedProduct(ctx, product) {
            ctx.commit('updateSelectedProduct', product)
        }
    },
    mutations: {
        updateSelectedProduct(state, product) {
            state.selectedProduct = product
            if(product.variants.length > 0) {
                state.selectedVariant = product.variants[0]
            } else {
                state.selectedVariant = product
            }
        }
    },
    state: {
        selectedProduct: {
            title: null,
            image: {
                path: null
            },
            description: null,
            price: null
        },
        selectedVariant: {
            price: null,
            image: {
                path: null
            },
        }
    },
    getters: {
        clickedProduct(state) {
            return state.selectedProduct
        },
        clickedVariant(state) {
            return state.selectedVariant
        }
    },
}
