export default {
    actions: {
        fetchBasketProducts(ctx) {
            ctx.commit('initialiseBasket')
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

            switch (action.type) {
                case 'increment':
                    state.keys[itemIndex].quantity += 1
                    break;

                case 'decrement':
                    state.keys[itemIndex].quantity -= 1
                    break;

                case 'remove':
                    state.keys[itemIndex].quantity = 0
                    break;
            }

            state.keys = state.keys.filter(function(item, index, arr){ return item.quantity > 0;})

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
        basketItemsCount(state) {
            let count = state.keys.map(item => item.quantity).reduce((a, b) => a + b, null)
            return count
        }
    },
}
