import Vue from 'vue'
import vuetify from './plugins/vuetify'
import VueRouter from 'vue-router'

import axios from 'axios'
import store from './stores/store'

import App from './App.vue'
import Login from './components/Auth/Login'
import Register from './components/Auth/Register'
import Todo from './components/Todo'
import Tasks from './components/Tasks'
import NotesModal from './components/NotesModal'

Vue.config.productionTip = false

Vue.use(VueRouter)

axios.defaults.baseURL = '/api/';
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
axios.defaults.withCredentials = true;
// axsios.defay

// let axiosConfig = {
//   headers: {
//       'Content-Type' : 'application/json; charset=UTF-8',
//       'Accept': 'Token',
//       "Access-Control-Allow-Origin": "*",
//   }
// }

const routes = [
  {
    path: '/',
    component: Todo,
    name: 'Todo',
    children: [
      {
        path: 'list/:id',
        components: { Tasks },
        name: 'Tasks',
        children: [
          {
            path: 'task/:taskId',
            components: { NotesModal },
            name: "NotesModal"
          }
        ]
      }
    ]
  },
  {
    path: '/login',
    component: Login,
    name: 'Login'
  },
  {
    path: '/register',
    component: Register,
    name: 'Register'
  }
]

const router = new VueRouter({
  mode: 'history',
  routes,
  base: '/'
})

new Vue({
  router,
  vuetify,
  store,
  render: h => h(App)
}).$mount('#app')
