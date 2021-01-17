import Vue from 'vue'
import vuetify from './plugins/vuetify'

import axios from 'axios'
import store from './stores/store'

import App from './App.vue'

import router from './router'


Vue.config.productionTip = false

axios.defaults.baseURL = '/api/';
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
axios.defaults.withCredentials = true;

// let axiosConfig = {
//   headers: {
//       'Content-Type' : 'application/json; charset=UTF-8',
//       'Accept': 'Token',
//       "Access-Control-Allow-Origin": "*",
//   }
// }


new Vue({
  store,
  router,
  vuetify,
  render: h => h(App)
}).$mount('#app')
