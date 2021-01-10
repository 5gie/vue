<template>
    <input type="text" placeholder="Search..." v-model.trim="input" v-on:input="search()" ref="input" @blur="closeSearchBar()">
</template>

<script>
export default {
    name: 'SearchBar',
    data: () => ({
        input: ''
    }),
    methods: {
        search(){
            // TODO search
        },
        closeSearchBar() {
            this.$store.commit("SET_DISPLAY_SEARCH_LIST", false);
        }
    }
}
</script>