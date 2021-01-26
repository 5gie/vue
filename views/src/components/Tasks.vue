<template>
    <div>
        <v-card height="calc(100vh - 48px)" class="rounded-0 d-flex flex-column" style="overflow:hidden">
            <v-toolbar color="blue" dark class="flex-grow-0">
                <v-toolbar-title>
                    {{ listTitle }}
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn icon>
                    <v-icon>mdi-magnify</v-icon>
                </v-btn>
            </v-toolbar>
            <v-list two-line class="flex-grow-1" style="overflow:hidden scroll">
                <template v-for="(task,key) in TASKS">
                    <Task :key="key" :task="task"/>
                </template>
            </v-list>
            <v-divider></v-divider>
            <v-card-actions>
                <v-layout>
                    <v-flex>
                        <NewTask />
                    </v-flex>
                </v-layout>
            </v-card-actions>
        </v-card>
        <router-view :key="$route.fullPath" name="NotesModal"></router-view>
    </div>
</template>

<script>
import Task from './Task';
import NewTask from './NewTask';
import { mapGetters } from 'vuex'
export default {
    components: { Task, NewTask },
    name: "Tasks",
    data: () => ({
        
    }),
    computed: {
         ...mapGetters(['TASKS']),
        // TASKS() {
        //     return this.$store.getters.TASKS(this.$route.params.id);
        // },
        listTitle() {
            return this.$store.getters.LIST_TITLE(this.$route.params.id)
        },
    },
    async mounted() {
        await this.$store.dispatch("GET_TASKS", this.$route.params.id)
    }
}
</script>