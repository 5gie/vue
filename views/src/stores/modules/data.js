import axios from 'axios'
import router from '../../router'
export default {
    state: {
        lists: [],
        tasks: []
    },
    getters: {
        LISTS: state => state.lists,
        TASKS: state => state.tasks
    },
    mutations: {
        SET_TASKS: (state, payload) => {
            state.tasks = payload
        },
        SET_LISTS: (state, payload) => {
            state.lists = payload
        },
        ADD_LIST: (state, payload) => {
            state.lists.unshift(payload);
        },
        ADD_TASK: (state, payload) => {
            state.tasks.unshift(payload);
        }
    },
    actions: {
        GET_LISTS: async () => {
            return await axios.get(`profile`)
        },
        GET_TASKS: async ({commit}, id) => {
            console.log(commit);
            return await axios.get(`profile/list/${id}`)
        },
        CREATE_TASK: async ({commit}, data) => {
            return await axios.post(`profile/list/${data.id}/create`, {title: data.title})
            .then(({data}) => {
                if(data.error) commit("SET_NOTIFICATION", { display: true, text: data.error, alert: 'error' })
                else commit("ADD_TASK", data.task)
            })
        },
        CREATE_LIST: async ({commit}, title) => {
            return await axios.post(`profile/list/create`, title)
            .then(({data}) => {
                router.push({
                    name: 'Tasks',
                    params: {
                        id: data.list.id
                    }
                })
                commit("SET_NEW_LIST_FORM", false)
                commit("ADD_LIST", data.list)
            })
        }
    }
}