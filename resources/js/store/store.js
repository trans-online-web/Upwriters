import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios";

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        orders: sessionStorage.getItem('orders') ? JSON.parse(sessionStorage.getItem('orders')) : [],
        subjects: sessionStorage.getItem('subjects') ? JSON.parse(sessionStorage.getItem('subjects')) : [],
        documents: sessionStorage.getItem('documents') ? JSON.parse(sessionStorage.getItem('documents')) : [],
    },
    mutations: {
        SET_DOCUMENTS(state, documents){
            state.documents = documents
        },
        SAVE_DOCUMENTS_DATA(state){
            window.sessionStorage.setItem('documents', JSON.stringify(state.documents));
        },
        SET_ORDERS(state, orders){
            state.orders = orders
        },
        SAVE_ORDERS_DATA(state){
            window.sessionStorage.setItem('orders', JSON.stringify(state.orders));
        },
        SET_SUBJECTS(state, subjects){
            state.subjects = subjects
        },
        SAVE_SUBJECTS_DATA(state){
            window.sessionStorage.setItem('subjects', JSON.stringify(state.subjects));
        }
    },
    actions: {
        getOrdersStudent({commit}) {
            try {
                axios.get('/api/student-task').then(data =>{
                    commit('SET_ORDERS', data.data);
                    commit('SAVE_ORDERS_DATA')
                })
            }catch (e) {
                throw new Error(e);
            }
        },
        getOrdersAdmin({commit}) {
            try {
                axios.get('/api/task').then(data =>{
                    commit('SET_ORDERS', data.data);
                    commit('SAVE_ORDERS_DATA')
                })
            }catch (e) {
                throw new Error(e);
            }
        },
        getDocuments({commit}) {
            try {
                axios.get('/api/document').then(data =>{
                    commit('SET_DOCUMENTS', data.data);
                    commit('SAVE_DOCUMENTS_DATA')
                })
            }catch (e) {
                throw new Error(e);
            }
        },
        getSubjects({commit}) {
            try {
                axios.get('/api/subject').then(data =>{
                    commit('SET_SUBJECTS', data.data);
                    commit('SAVE_SUBJECTS_DATA');
                })
            }catch (e) {
                throw new Error(e);
            }
        }

    },
    modules: {},
    getters: {}
})
