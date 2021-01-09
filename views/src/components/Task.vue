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
              <v-checkbox @click.prevent="toggle()"
                :input-value="task.checked"
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
        toggle(){
            this.task.checked = !this.task.checked;
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