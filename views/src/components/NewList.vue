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
            .then(resp => {
                console.log(resp);
                if(resp.data.alert) {
                    this.$store.commit("SET_NOTIFICATION", {
                        display: true,
                        text: resp.data.alert,
                        alert: 'blue'
                    });
                    this.title = '';
                    this.$router.push({
                        name: 'tasks',
                        params: {
                            id: resp.data.id
                        }
                    })
                    this.$store.commit("SET_NEWLIST_FORM", false)
                } else if(resp.data.error){
                    this.error = resp.data.error;
                }
            })
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