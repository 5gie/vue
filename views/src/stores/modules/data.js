import axios from 'axios'
import router from '../../router'
export default {
    state: {
        lists: []
    },
    getters: {
        LISTS: state => state.lists
    },
    mutations: {
        SET_LISTS: (state, payload) => {
            state.lists = payload
        },
        ADD_LIST: (state, payload) => {
            state.lists.unshift(payload);
        }
    },
    actions: {
        GET_LISTS: async () => {
            return await axios.get(`profile`)
        },
        CREATE_LIST: async ({commit}, title) => {
            console.log(commit);
            return await axios.post(`profile/lists/create`, title)
            .then(({data}) => {
                console.log(data);
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