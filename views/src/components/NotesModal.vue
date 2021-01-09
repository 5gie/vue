<template>
    <v-layout row justify-center>
        <v-dialog v-model="open" max-width="800px">
            <v-card>
                <v-card-title class="headline">Task title</v-card-title>
                <v-card-text>
                    <v-form>
                        <v-textarea outline v-model="note" label="Your note"></v-textarea>
                        <v-btn color="success">Save</v-btn>
                    </v-form>
                    <v-list subheader class="mt-3">
                        <v-subheader>Notes</v-subheader>
                        <v-list-item v-for="(note, key) in notes" :key="key">
                            <v-list-item-content>
                                <v-list-item-title>{{ note.note }}</v-list-item-title>
                            </v-list-item-content>
                            <v-list-item-action>
                                <v-btn icon>
                                    <v-icon color="red darken-3">mdi-delete</v-icon>
                                </v-btn>
                            </v-list-item-action>
                        </v-list-item>
                    </v-list>
                </v-card-text>
                <v-card-actions>
                    <v-btn text color="indigo">Close</v-btn>
                    <v-spacer></v-spacer>
                    <v-btn text color="red darken-3">Remove Task</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
export default {
    name: "NotesModal",
    data: () => ({
        open: true,
        note: '',
        notes: [
            {
                id: 1,
                note: 'some randomm note'
            },
            {
                id: 2,
                note: 'second note'
            },
            {
                id: 3,
                note: 'last note'
            },
        ]
    }),
}
</script>