<template>
    <v-list-item>
        <v-list-item-action>
            <v-btn icon @click="openModal()">
                <v-icon color="indigo">mdi-pencil</v-icon>
            </v-btn>
        </v-list-item-action>
        <v-list-item-content>
            <v-list-item-title>
                {{ task.title }}
            </v-list-item-title>
            <v-list-item-subtitle>
                {{ task.sub_title }}
            </v-list-item-subtitle>
        </v-list-item-content>
        <v-list-item-action>
            {{task.status}}
              <v-checkbox @click.prevent="toggle(task.id)"
                :input-value="task.status == 1 ? true : false"
                color="green"
              ></v-checkbox>
        </v-list-item-action>
    </v-list-item>
</template>

<script>
export default {
    name: "Task",
    props: {
        task: Object,
    },
    methods: {
        toggle(task_id){
            // this.task.status = !this.task.status;
            this.$store.dispatch("TOGGLE_TASK_STATUS", { list_id: this.$route.params.id, task_id});
        },
        openModal(){
            this.$router.push({
                name: 'NotesModal',
                params: { taskId: this.task.id }
            })
        }
    }
}
</script>