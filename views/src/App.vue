<template>
  <v-app>
    <v-main>
      <Todo/>
      <!-- <Register/> -->
      <!-- <Login/> -->
    </v-main>
  </v-app>
</template>

<script>
// import Login from './components/Auth/Login.vue';
// import Register from './components/Auth/Register.vue';
import Todo from './components/Todo.vue';

export default {
  name: 'App',
  components: {
    // Login,
    // Register,
    Todo
  }

};
</script>