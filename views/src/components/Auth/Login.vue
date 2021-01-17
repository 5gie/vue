<template>
  <v-container fill-height>
    <v-layout align-center justify-center>
        <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
                <v-form v-if="form">
                    <v-toolbar dark color="blue">
                        <v-toolbar-title>
                            Login Form
                        </v-toolbar-title>
                    </v-toolbar>
                    <v-alert v-if="error" color="error" type="error" dense>{{ error }}</v-alert>
                    <v-card-text>
                        <v-text-field v-for="(data, name) in form" v-model="model[name]" :key="name" :label="data.label" :type="data.type" :prepend-icon="`mdi-${data.icon}`"></v-text-field>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn color="blue" dark to="/register">Register</v-btn>
                        <v-spacer></v-spacer>
                        <v-btn color="success" dark @click.prevent="login()">Login <v-icon>mdi-chevron-right</v-icon></v-btn>
                    </v-card-actions>
                </v-form>
            </v-card>
        </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
    name: "Login",
    data: () => ({
        error: false,
        form: false,
        model: {}
    }),
    created(){
        this.$store.dispatch("GET_FORM", this.$router.currentRoute.path)
            .then(resp => {
                if(resp.data.form){
                    this.form = resp.data.form;
                    for(let key in resp.data.form) this.model[key] = '';
                }
            })
            .catch(err => this.alert = err)
    },
    methods: {
        login() {
            this.error = false;
            this.$store.dispatch("LOGIN", this.model)
            .then(resp => {
                if(resp.data.error) this.error = resp.data.error;
                this.$router.push('/profile')
            })
            .catch(err => this.error = err.response.data.error)
        }
    }
}
</script>

<style>

</style>