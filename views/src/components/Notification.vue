<template>
    <!-- <v-snackbar :color="NOTIFICATION.class" v-model="snackbar" bottom right :timeout="NOTIFICATION.timeout">
        {{ NOTIFICATION.text }}
        <v-btn text dark @click.prevent="snackbar = false"><v-icon>mdi-close</v-icon></v-btn>
    </v-snackbar> -->
    <v-snackbar v-model="snackbar" :timeout="NOTIFICATION.timeout">
        {{ NOTIFICATION.text }}
        <template v-slot:action="{ attrs }">
            <v-btn
            :color="NOTIFICATION.class"
            text
            v-bind="attrs"
            @click="snackbar = false"
            >
            Close
            </v-btn>
        </template>
    </v-snackbar>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    name: "Notification",
    computed: {
        ...mapGetters(['NOTIFICATION']),
        snackbar: {
            get() {
                return this.$store.getters.NOTIFICATION.display
            },
            set (value) {
                console.log(value);
                this.$store.commit("SET_NOTIFICATION", {
                    display: false
                })
            }
        }
        
    }
}
</script>