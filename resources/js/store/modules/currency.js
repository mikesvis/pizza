export default {
    actions: {
        async fetchCurrencies(ctx) {
            const resource = await fetch('/api/currency')
            const currencies = await resource.json()
            ctx.commit('updateCurrencies', currencies)
            ctx.commit('initialiseCurrency')
        },
        changeCurrency(ctx, newCurrency) {
            ctx.commit('updateCurrency', newCurrency)
        }
    },
    mutations: {
        updateCurrency(state, newCurrency) {
            state.currency = newCurrency
            localStorage.setItem('currency', newCurrency)
        },
        updateCurrencies(state, currencies) {
            state.currencies = currencies
        },
        initialiseCurrency(state) {
            if(localStorage.getItem('currency')) {
                state.currency = localStorage.getItem('currency')
            } else {
                localStorage.setItem('currency', state.currency)
            }
        }
    },
    state: {
        currencies: [],
        currency: 'USD'
    },
    getters: {
        allCurrencies(state) {
            return state.currencies;
        },
        currentCurrency(state) {
            return state.currencies[state.currency]
        },
        currencyCode(state) {
            return state.currency
        }
    }
}
