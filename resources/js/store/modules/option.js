export default {
    actions: {
        async fetchProductOptions(ctx, product) {
            const resource = await fetch('/api/pizza/' + product.id)
            const result = await resource.json()
            ctx.commit('updateOptions', result)
            ctx.commit('updateProduct', product)
        },
        changeSelectedOption(ctx, index) {
            ctx.commit('changeSelectedIndex', index)
        }
    },
    mutations: {
        updateOptions(state, result) {
            state.possibilities = result.possibilities
            state.productOptions = result.variants
            state.selectedVariantIndex = result.selectedVariantIndex
        },
        updateProduct(state, result) {
            state.selectedProduct = result
        },
        changeSelectedIndex(state, index) {
            state.selectedVariantIndex = index
        }
    },
    state: {
        selectedProduct: null,
        possibilities: {},
        productOptions: [],
        selectedVariantIndex: 0,
    },
    getters: {
        allVariants(state) {
            return state.productOptions
        },
        allSizes(state) {
            return state.possibilities.sizes
        },
        allCrusts(state) {
            return state.possibilities.crusts
        },
        selectedIndex(state) {
            return state.selectedVariantIndex
        },
        viewedVariant(state) {
            return state.productOptions[state.selectedVariantIndex]
        },
        chosenProduct(state) {
            return state.selectedProduct
        }
    }
}
