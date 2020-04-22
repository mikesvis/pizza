export default {
    actions: {
        changeCurrency(ctx, newCurrency) {
            ctx.commit('updateCurrency', newCurrency)
        }
    },
    mutations: {
        updateCurrency(state, newCurrency) {
            state.currency = newCurrency
        }
    },
    state: {
        currencies: {
            USD: {
                id: 0,
                symbol: '$',
                course: 1,
                code: 'USD'
            },
            EUR: {
                id: 1,
                symbol: '€',
                course: 0.92,
                code: 'EUR'
            }
        },
        currency: 'EUR'
    },
    getters: {
        allCurrencies(state) {
            return state.currencies;
        },
        currentCurrency(state) {
            return state.currencies[state.currency]
        }
    }
}
