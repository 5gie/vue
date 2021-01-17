<template>
  <v-app>
    <router-view></router-view>    
    <Notification />
  </v-app>
</template>

<script>
import Notification from './components/Notification';
export default {
  name: 'App',
  components: {
    Notification
  }
};    
</script>