<template>
    <v-navigation-drawer permanent width="100%">
        <div class="d-flex flex-column" fill-height  style="height: calc(100vh - 48px); overflow: hidden">
            <v-toolbar color="blue" dark>
                <v-toolbar-title v-if="!DISPLAY_SEARCH_LIST">
                    Your lists
                </v-toolbar-title>
                <SearchBar v-if="DISPLAY_SEARCH_LIST"/>
                <v-spacer></v-spacer>
                <v-btn icon @click.prevent="toggleSearchList()"><v-icon>mdi-magnify</v-icon></v-btn>
            </v-toolbar>
            <v-list>
                <v-list-item @click.prevent="openNewListForm()" v-if="!newListIsOpen">
                    <v-list-item-content>
                        <v-list-item-title>
                            Create new list 
                        </v-list-item-title>
                    </v-list-item-content>
                    <v-list-item-action>
                        <v-btn icon>
                            <v-icon>mdi-plus</v-icon>
                        </v-btn>
                    </v-list-item-action>
                </v-list-item>
                <v-list-item v-if="openNewListFormValue">
                    <NewList />
                </v-list-item>
            </v-list>
            <v-divider></v-divider>
            <v-list class="flex-grow-1" style="overflow:hidden auto">
                <v-list-item v-for="(list, key) in lists" :key="key" :to="{ name: 'Tasks', params: { id:list.id } }">
                    <v-list-item-content>
                        <v-list-item-title>
                            {{ list.title }}
                        </v-list-item-title>
                    </v-list-item-content>
                    <v-list-item-action>
                        <v-list-item-title>
                            {{ list.tasks }} 
                        </v-list-item-title>
                    </v-list-item-action>
                </v-list-item>
            </v-list>
        </div>
    </v-navigation-drawer>
</template>

<script>
import SearchBar from './SearchBar'
import NewList from './NewList'
import { mapGetters } from 'vuex'
export default {    
    name: "Lists",
    components: { SearchBar, NewList },
    methods: {
        toggleSearchList() {
            this.$store.commit("SET_DISPLAY_SEARCH_LIST", !this.DISPLAY_SEARCH_LIST);
        },
        openNewListForm() {
            this.$store.commit("SET_NEW_LIST_FORM", true);
        }
    },
    data: () => ({
        lists: [
            {
                id: 1,
                title: 'test 1',
                tasks: 12
            },
            {
                id: 2,
                title: 'testtest',
                tasks: 13
            },
            {
                id: 3,
                title: 'test 123',
                tasks: 54
            },
            {
                id: 4,
                title: 'test 1',
                tasks: 12
            },
            {
                id: 5,
                title: 'testtest',
                tasks: 13
            },
            {
                id: 6,
                title: 'test 123',
                tasks: 54
            },
            {
                id: 7,
                title: 'test 1',
                tasks: 12
            },
            {
                id: 8,
                title: 'testtest',
                tasks: 13
            },
            {
                id: 9,
                title: 'test 123',
                tasks: 54
            },
            {
                id: 10,
                title: 'test 1',
                tasks: 12
            },
            {
                id: 11,
                title: 'testtest',
                tasks: 13
            },
            {
                id: 12,
                title: 'test 123',
                tasks: 54
            },
            {
                id: 13,
                title: 'test 1',
                tasks: 12
            },
            {
                id: 14,
                title: 'testtest',
                tasks: 13
            },
            {
                id: 15,
                title: 'test 123',
                tasks: 54
            },
            {
                id: 16,
                title: 'test 123',
                tasks: 54
            },
            {
                id: 17,
                title: 'test 1',
                tasks: 12
            },
            {
                id: 18,
                title: 'testtest',
                tasks: 13
            },
            {
                id: 19,
                title: 'test 123',
                tasks: 54
            },
        ],
    }),
    computed: {
        ...mapGetters(['DISPLAY_SEARCH_LIST']),
        openNewListFormValue: {
            get() {
                return this.$store.getters.NEW_LIST_FORM;
            }, 
            set (value) {
                this.$store.commit("SET_NEW_LIST_FORM", value);
            }
        },
        newListIsOpen() {
            return this.$store.getters.NEW_LIST_FORM;
        }
    }
}
</script>