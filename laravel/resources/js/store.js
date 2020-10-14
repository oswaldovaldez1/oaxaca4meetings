import Vue from "vue";
import Vuex from "vuex";


Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        //valores
        userList: [],
        user: {},
        blogList: [],
        blogPub: {}
    },
    getters: {
        getblogPub: state => {
            return state.blogPub;
        },
        getBlogList: state => {
            return state.blogList;
        },
        getUser: state => {
            return state.user;
        },

        getUserList: state => {

            return state.userList;
        }
    },
    mutations: {
        ADD_BLOG_PUB(state, pub) {
            state.blogPub = pub;
        },
        GET_ALL_USER(state) {
            Vue.axios.get("/api/user").then(response => {
                state.userList = response.data;
            });
        },
        GET_PUB(state, id) {
            Vue.axios.get("/api/blog/" + id).then(response => {
                state.blogPub = response.data;
                if (state.blogPub.etiquetas === null) {
                    state.blogPub.etiquetas = []
                } else {
                    state.blogPub.etiquetas = JSON.parse(state.blogPub.etiquetas);
                }
                state.blogPub.status_publicacion = state.blogPub.status_publicacion === 1;
            });
        },
        GET_ALL_PUB(state) {
            Vue.axios.get("/api/blog").then(response => {
                state.blogList = response.data;
            });
        },
        GET_USER(state, id) {
            Vue.axios.get("/api/user/" + id).then(response => {

                state.user = response.data;
                state.user.nivelAcceso = JSON.parse(state.user.nivelAcceso);
                state.user.tipoUser = state.user.roles[0].name;
            });
        }
    },
    actions: {
        addBlogPub(contex, pub) {
            contex.commit("ADD_BLOG_PUB", pub);
        },
        getAllUser(contex) {
            contex.commit('GET_ALL_USER');
        },
        getUserById(contex, id) {
            contex.commit('GET_USER', id);
        },
        getAllPub(contex) {
            contex.commit('GET_ALL_PUB');
        },
        getPubById(contex, id) {
            contex.commit('GET_PUB', id);
        }
    }
    // modules: {}
});
