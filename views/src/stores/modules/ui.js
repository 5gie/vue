import axios from 'axios'

export default {
    state: {
        drawer: false,
        notification: {
            display: false,
            text: "Notification placeholder text",
            timeout: 3000,
            class: 'success'
        },
        displaySearchList: false,
        newListForm: false
    },
    getters: {
        DRAWER: state => {
            return state.drawer;
        },
        NOTIFICATION: state => {
            return state.notification;
        },
        DISPLAY_SEARCH_LIST: state => {
            return state.displaySearchList;
        },
        NEW_LIST_FORM: state => {
            return state.newListForm;
        },
    },
    mutations: {
        SET_DRAWER: (state, payload) => {
            state.drawer = payload;
        },
        SET_NOTIFICATION: (state, { display, text, alert  }) => {
            state.notification.display = display;
            state.notification.text = text;
            state.notification.class = alert;
        },
        SET_DISPLAY_SEARCH_LIST: (state, payload) => {
            state.displaySearchList = payload;
        },
        SET_NEW_LIST_FORM: (state, payload) => {
            state.newListForm = payload;
        }
    },
    actions: {
        GET_FORM: async ({commit}, payload) => {
            console.log(commit);
            return await axios.get(payload)
        }
    }
}