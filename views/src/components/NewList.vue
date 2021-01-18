<template>
    <v-container p-0>
        <v-form ref="form" @submit.prevent="submit()">
            <v-text-field append-icon="mdi-plus" ref="input" v-model="title" label="Title" :rules="[rules.required]" @blur="closeForm()"></v-text-field>
        </v-form>
    </v-container>
</template>

<script>
export default {
    data: () => ({
        title: '',
        rules: {
            required: value => !!value || "Required",
        }
    }),
    methods: {
        submit() {
            this.$store.dispatch("CREATE_LIST", {title: this.title})

        },
        closeForm() {
            this.$store.commit("SET_NEW_LIST_FORM", false)
        }
    },
    mounted() {
        this.$refs.input.focus();
    }
}
</script>