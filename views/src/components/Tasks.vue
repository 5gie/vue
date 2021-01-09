<template>
    <div>
        <v-card height="calc(100vh - 48px)" class="rounded-0 d-flex flex-column" style="overflow:hidden">
            <v-toolbar color="blue" dark class="flex-grow-0">
                <v-toolbar-title>
                    Title of the list {{ listId }}
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn icon>
                    <v-icon>mdi-magnify</v-icon>
                </v-btn>
            </v-toolbar>
            <v-list two-line class="flex-grow-1" style="overflow:hidden scroll">
                <template v-for="(task,key) in tasks">
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
export default {
    components: { Task, NewTask },
    name: "Tasks",
    data: () => ({
        tasks: [ 
            {
                id: 1,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: true
            },
            {
                id: 2,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 3,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 4,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 5,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 6,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 7,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 8,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 9,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 10,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 11,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 12,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 13,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 14,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            },
            {
                id: 15,
                title: "task title",
                sub_title: "This is task contains 8 notes",
                checked: false
            }
            
        ]
    }),
    computed: {
        listId() {
            return this.$route.params.id
        }
    }
}
</script>