import axios from 'axios'

export default{
    state: {},
    getters: {},
    mutations: {},
    actions: {
        LOGIN: async (commit, payload) => {
            console.log(commit);
            return await axios.post(`login`, payload)
        },
        REGISTER: async (commit, payload) => {
            console.log(commit);
            return await axios.post(`register`, payload)
        }
    }
}