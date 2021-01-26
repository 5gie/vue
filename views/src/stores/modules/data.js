import axios from 'axios'
import router from '../../router'
export default {
    state: {
        lists: [],
        tasks: []
    },
    getters: {
        LISTS: state => state.lists,
        TASKS: state => state.tasks,
        // TASKS_COUNT: state => index => {
        //     if(index) return state.lists.find(list => list.id === index).tasks.length
        // },
        LIST_TITLE: state => index => {
            // if(index) return state.lists.find(list => list.id === index).title
            let item;
            
            if(index) item = state.lists.find(list => list.id === index);

            if(item) return item.title;
        }
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
        },
        UPDATE_TASK_STATUS: (state, payload) => {
            const task = state.tasks.find(task => task.id === payload)
            task.status = task.status == 1 ? 0 : 1;
        }
    },
    actions: {
        GET_LISTS: async ({commit}) => {
            return await axios.get(`profile`)
            .then(resp => {
                const { data } = resp
                commit("SET_LISTS", data.lists)
            })
            .catch(err => {
                if(err.response.data.error) {
                    commit("SET_NOTIFICATION", {
                        display: true,
                        text: err.response.data.error,
                        alert: 'error'
                    })
                    this.$router.push('/login');
                }
            })
        },
        GET_TASKS: async ({commit}, id) => {
            return await axios.get(`profile/list/${id}`)
                .then(resp => commit("SET_TASKS", resp.data.tasks))
                .catch(
                    // err => {
                    // if(err.response.data.error) {
                    //     this.$store.commit("SET_NOTIFICATION", {
                    //         display: true,
                    //         text: err.response.data.error,
                    //         alert: 'error'
                    //     })
                    //     this.$router.push('/profile');
                    // }
                // }
                )
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
        },
        TOGGLE_TASK_STATUS: async ({commit}, {list_id, task_id}) => {
            return await axios.post(`profile/list/${list_id}/task/${task_id}/status`)
            .then(resp => {
                if(!resp.error) commit('UPDATE_TASK_STATUS', task_id)
            })
        }
    }
}