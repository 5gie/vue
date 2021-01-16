import axios from 'axios'

export default{
    state: {},
    getters: {},
    mutations: {},
    actions: {
        LOGIN: async ({commit}, payload) => {
            console.log(commit);
            return await axios.post(`login`, payload)
                // .then(({data, status}) => {
                //     // console.log(data);
                //     // if(status == 200) console.log('poszlo')
                // })
                .catch(err => console.log(err))
        },
        REGISTER: async ({commit}, payload) => {
            console.log(commit);
            return await axios.post(`register`, payload)
                // .then(({data, status}) => {
                //     // console.log(data);
                //     // if(status == 200) console.log('poszlo')
                // })
                .catch(err => console.log(err))
        }
    }
}