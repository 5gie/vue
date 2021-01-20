<template>
    <v-form @submit.prevent="addTask()" @keyup.enter="addTask()">
        <v-text-field label="Add new task" append-icon="mdi-plus" v-model="title"></v-text-field>
    </v-form>
</template>

<script>
export default {
    name: "NewTask",
    data: () => ({
        title: ''
    }),
    methods: {
        addTask(){
            this.$store.dispatch("CREATE_TASK", {title: this.title, id: this.$route.params.id})
            .then(() => this.title = '')
        }
    }
}
</script>

<style>

</style>