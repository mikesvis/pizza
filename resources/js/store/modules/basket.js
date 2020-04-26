export default {
    actions: {
        fetchBasketProducts(ctx) {
            ctx.commit('initialiseBasket')
        },
        async fetchBasket({commit, state}) {
            commit('initialiseBasket')

            if(state.keys.length > 0) {
                let query = '?id[]='+state.keys.map(item => item.id).join('&id[]=')
                const resource = await fetch('/api/basket' + query)
                const items = await resource.json()
                commit('updateBasket', items)
            }
        },
        incrementItem(ctx, item_id){
            ctx.commit('updateItem', { type: 'increment', item_id })
        },
        decrementItem(ctx, item_id){
            ctx.commit('updateItem', { type: 'decrement', item_id })
        },
        deleteItem(ctx, item_id){
            ctx.commit('updateItem', { type: 'remove', item_id })
        },
        clearBasket(ctx) {
            ctx.commit('removeBasket')
        }
    },
    mutations: {
        initialiseBasket(state) {
            if(localStorage.getItem('basketItems')) {
                state.keys = JSON.parse(localStorage.getItem('basketItems'))
            } else {
                localStorage.setItem('basketItems', JSON.stringify(state.keys))
            }
        },
        updateItem(state, action) {

            let item = state.keys.find(item => item.id === action.item_id)

            if(!item){
                item = {id: action.item_id, quantity: 0}
                state.keys.push(item)
            }

            let itemIndex = state.keys.indexOf(item);

            let deletedItem = null;

            switch (action.type) {
                case 'increment':
                    state.keys[itemIndex].quantity += 1
                    break;

                case 'decrement':
                    state.keys[itemIndex].quantity -= 1
                    if(state.keys[itemIndex].quantity == 0) {
                        deletedItem = state.keys[itemIndex].id
                    }
                    break;

                case 'remove':
                    state.keys[itemIndex].quantity = 0
                    deletedItem = state.keys[itemIndex].id
                    break;
            }

            state.keys = state.keys.filter(function(item, index, arr){ return item.quantity > 0;})

            localStorage.setItem('basketItems', JSON.stringify(state.keys))

            state.items = state.items.filter(function(item, index, arr){ return item.id != deletedItem;})

        },
        updateBasket(state, products) {
            state.items = products.items
            state.delivery = products.delivery
        },
        removeBasket(state){
            state.keys = []
            state.items = []
            localStorage.setItem('basketItems', JSON.stringify(state.keys))
        }
    },
    state: {
        keys: [],
        items: [],
        delivery: {},
    },
    getters: {
        allItemsKeys(state) {
            return state.keys
        },
        basketItems(state) {
            return state.items
        },
        basketItemsCount(state) {
            let count = state.keys.map(item => item.quantity).reduce((a, b) => a + b, null)
            return count
        },
        subTotal: (state, getters) => {
            let result = 0
            let allItemsKeys = getters.allItemsKeys
            let basketItems = getters.basketItems

            for(let i in allItemsKeys) {
                for(let j in basketItems) {
                    if(allItemsKeys[i].id == basketItems[j].id) {
                        result += allItemsKeys[i].quantity * basketItems[j].price
                    }
                }
            }
            return result
        },
        delivery: (state, getters) => {
            let result = 0
            let subTotal = getters.subTotal
            if(subTotal < state.delivery.free_above) {
                result = state.delivery.price
            }
            return result
        },
        total: (state, getters) => {
            let result = 0
            let subTotal = getters.subTotal
            let delivery = getters.delivery
            result = subTotal + delivery
            return result
        }
    },
}
