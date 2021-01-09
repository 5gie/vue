<template>
  <v-container fill-height>
    <v-layout align-center justify-center>
        <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
                <v-form>
                    <v-toolbar dark color="blue">
                        <v-toolbar-title>
                            Login Form
                        </v-toolbar-title>
                    </v-toolbar>
                    <v-card-text>
                        <v-text-field name="login" label="Login" type="text" prepend-icon="mdi-account"></v-text-field>
                        <v-text-field name="password" label="password" type="password" prepend-icon="mdi-lock"></v-text-field>
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
    methods: {
        login() {
            this.$router.push('/')
        }
    }
}
</script>

<style>

</style>