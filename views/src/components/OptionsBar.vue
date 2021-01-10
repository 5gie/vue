<template>
    <div v-if="show">
        <v-card height="calc(100vh - 48px)" class="rounded-0 d-flex flex-column" style="overflow:hidden">
            <v-toolbar color="indigo" dark class="flex-grow-0">
                <v-toolbar-title>
                    Options
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-icon>mdi-account</v-icon>
            </v-toolbar>
            <v-list class="flex-grow-1" style="overflow:hidden auto">
                <v-list-group no-action :prepend-icon="item.action" v-for="(item, key) in items" :key="key" v-model="item.active">
                    <v-list-item slot="activator">
                        <v-list-item-content>
                            <v-list-item-title>{{ item.title }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>

                    <v-list-item v-for="(subItem, index) in item.items" :key="index"
                                v-on="item.action === 'sort' ? { click: () => sort(subItem.by) } : { click: () => filter(subItem.by) } ">
                        <v-list-item-content>
                            <v-list-item-title>{{ subItem.title }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-group>
                <v-list-group prepend-icon="mdi-filter" no-action>
                    <v-list-item slot="activator">
                        <v-list-item-content>
                            <v-list-item-title>
                                List options
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-content>
                            <v-list-item-title>
                                Remove list
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item @click.prevent="openDrawer">
                        <v-list-item-content>
                            <v-list-item-title>
                                Change background
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-group>
            </v-list>
        </v-card>
        <MoreOptions />
    </div>
</template>

<script>
import MoreOptions from './MoreOptions.vue'
export default {
    name: "OptionsBar",
    components: { MoreOptions },
    computed: {
        show() {
            return this.$route.params.id;
        }
    },
    data: () => ({
        items: [
            {
                action: "mdi-sort-variant",
                title: "Sort by",
                active: true,
                items: [
                    {
                        title: 'Date',
                        by: 'date'
                    },
                    {
                        title: 'Name',
                        by: 'name'
                    }
                ]
            },
            {
                action: "mdi-filter-variant",
                title: "Filter by",
                active: false,
                items: [
                    {
                        title: 'Remaining',
                        by: 'remaining'
                    },
                    {
                        title: 'Completed',
                        by: 'completed'
                    },
                    {
                        title: 'All',
                        by: 'all'
                    }
                ]
            }
        ]
    }),
    methods: {
        sort(value) {
            console.log('sort by '+value);
        }, 
        filter(value) {
            console.log('filter by '+value);
        },
        openDrawer(){
            this.$store.commit("SET_DRAWER", true);
        }
    }
}
</script>