export default {
    actions: {
        async fetchSlides(ctx) {
            const resource = await fetch('/api/slide')
            const slides = await resource.json()
            ctx.commit('updateSlides', slides)
        }
    },
    mutations: {
        updateSlides(state, slides) {
            state.slides = slides
        }
    },
    state: {
        slides: []
    },
    getters: {
        allSlides(state) {
            return state.slides
        }
    },
}
