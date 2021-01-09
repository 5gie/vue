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
                            <v-alert :value="true" color="error" type="error" dense>This user already exists</v-alert>
                            <v-text-field name="login" label="Login" type="text" prepend-icon="mdi-account" :rules="[rules.required]"></v-text-field>
                            <v-text-field name="email" label="E-mal" type="text" prepend-icon="mdi-email" :rules="[rules.required, rules.email]"></v-text-field>
                            <v-text-field name="password" label="Password" type="password" prepend-icon="mdi-lock" :rules="[rules.required]" v-model="password"></v-text-field>
                            <v-text-field name="password" label="Confirm password" type="password" prepend-icon="mdi-lock" :rules="[rules.required]" :error="!valid()" v-model="confirm_password"></v-text-field>
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
        password: '',
        confirm_password: '',
        rules: {
            required: value => !!value || "Required",
            email: value => {
                const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return pattern.test(value) || "Invalid e-mail.";
            }
            
        }
    }),
    methods: {
        register(){
            // this.$router.push('/login')
        },
        valid() { 
            return this.password === this.confirm_password
        }
    }
}
</script>

<style>

</style>