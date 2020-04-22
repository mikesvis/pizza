export default {
    actions: {
        async fetchPizzas(ctx) {
            const resource = await fetch('/api/pizza')
            const pizzas = await resource.json()
            ctx.commit('updatePizzas', pizzas)
        }
    },
    mutations: {
        updatePizzas(state, pizzas) {
            state.pizzas = pizzas
        }
    },
    state: {
        pizzas: []
    },
    getters: {
        allPizzas(state) {
            return state.pizzas
        }
    },
}
