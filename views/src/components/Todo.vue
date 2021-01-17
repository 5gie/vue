<template>
  <div class="pb-12" style="height:100vh">
    <v-container fluid px-0 style="height:100%">
      <v-layout row align-space-beetween justify-space-beetween>
        <v-flex lg3 px-3>
          <Lists />
        </v-flex>
        <v-flex lg6 px-3>
          <router-view name="Tasks" :key="$route.fullPath"></router-view>
        </v-flex>
        <v-flex lg3 px-3>
          <OptionsBar />
        </v-flex>
      </v-layout>
    </v-container>
    <v-footer padless fixed>
      <v-col class="text-center">
          {{ new Date().getFullYear() }} &copy; <strong>Pozdrawiam serdecznie</strong>
      </v-col>
    </v-footer>
  </div>
</template>

<script>
import Lists from "./Lists";
import OptionsBar from './OptionsBar';
export default {
  name: "Todo",
  components: { 
    Lists,
    OptionsBar,
  },
};
</script>
<style>
    html{
      overflow: hidden auto;
    }
</style>