export const state = () => ({
    selectedCategoryId: '',
})

export const mutations = {
    setCategoryId(state, categoryId) {
        state.selectedCategoryId = categoryId;
    },
}