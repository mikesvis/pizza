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
        currency: 'USD',
        currencies: {},
        defaultCurrency: {
            id: 0,
            symbol: '$',
            course: 1,
            code: 'USD'
        }
    },
    getters: {
        allCurrencies(state) {
            return state.currencies;
        },
        currentCurrency(state) {
            if(state.currencies[state.currency]) {
                return state.currencies[state.currency]
            }
            return state.defaultCurrency
        },
        currencyCode(state) {
            return state.currency
        }
    }
}
