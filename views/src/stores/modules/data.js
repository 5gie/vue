import axios from 'axios'
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
            state.lists.push(payload);
        }
    },
    actions: {
        GET_LISTS: async () => {
            return await axios.get(`profile`)
        },
        CREATE_LIST: async ({commit}, title) => {
            console.log(commit);
            return await axios.post(`profile/lists/create`, title)
                // .then(resp => {
                //     console.log(resp);
                //     // commit("ADD_LIST", resp.data.list)
                // });
        }
    }
}