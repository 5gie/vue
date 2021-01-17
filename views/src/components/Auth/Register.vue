<template>
    <v-container fill-height>
        <v-layout align-center justify-center>
            <v-flex xs12 sm8 md5>
                <v-card class="elevation-12">
                    <v-form>
                        <v-toolbar dark color="blue">
                            <v-toolbar-title>
                                Register Form
                            </v-toolbar-title>
                        </v-toolbar>
                        <v-card-text>
                            <v-alert v-if="error" color="error" type="error" dense>{{ error }}</v-alert>
                            <v-text-field v-for="(data, name) in form" v-model="model[name]" :key="name" :label="data.label" :type="data.type" :prepend-icon="`mdi-${data.icon}`"></v-text-field>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn color="blue" dark to="/login">Login</v-btn>
                            <v-spacer></v-spacer>
                            <v-btn color="success" dark @click.prevent="register()">Register <v-icon>mdi-chevron-right</v-icon></v-btn>
                        </v-card-actions>
                    </v-form>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
export default {
    name: "Register",
    data: () => ({
        error: false,
        form: false,
        model: {},
        // rules: {
        //     required: value => !!value || "Required",
        //     email: value => {
        //         const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        //         return pattern.test(value) || "Invalid e-mail.";
        //     }
        // }
    }),
    created(){
        this.$store.dispatch("GET_FORM",this.$router.currentRoute.path)
            .then(resp => {
                if(resp.data.form){
                    this.form = resp.data.form;
                    for(let key in resp.data.form) this.model[key] = '';
                }
            })
            .catch(err => this.alert = err)
    },
    methods: {
        register(){
            this.$store.dispatch("REGISTER", this.model)
            .then(resp => {
                if(resp.data.alert) {
                    this.$store.commit("SET_NOTIFICATION", {
                        display: true,
                        text: resp.data.alert,
                        alert: 'blue'
                    });
                    this.$router.push('/login')
                } else if(resp.data.error){
                    this.error = resp.data.error;
                }
            })
        },
        valid() { 
            return this.password === this.confirm_password
        }
    }
}
</script>

<style>

</style>