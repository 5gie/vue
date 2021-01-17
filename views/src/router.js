import Vue from 'vue'
import Router from 'vue-router'

import Login from './components/Auth/Login'
import Register from './components/Auth/Register'
import Todo from './components/Todo'
import Tasks from './components/Tasks'
import NotesModal from './components/NotesModal'

Vue.use(Router)

const routes = [
  {
    path: '/profile',
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

const router = new Router({
  mode: 'history',
  routes,
  base: '/'
})

export default router