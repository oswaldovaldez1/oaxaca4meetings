import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);


import Error404 from "./views/404.vue";

import DashboardLayout from "./pages/Layout/DashboardLayout.vue";

import Dashboard from "./pages/Dashboard.vue";


import login from "./pages/login.vue"

//usuarios
import UserList from "./pages/Users/UserList.vue";
import UserProfile from "./pages/Users/UserProfile.vue";

//blog
import PostAdd from "./pages/Posts/PostAdd.vue";
import PostList from "./pages/Posts/PostList.vue";

//secciones
import secctionIndex from "./pages/Secciones/seccionIndex.vue";
import seccionopcion from "./pages/Secciones/seccionopcion.vue";

//experiencias
import experienciasAdd from "./pages/Experiencias/ExperienciasAdd.vue";
import experienciasList from "./pages/Experiencias/ExperienciasList.vue"


const router = new VueRouter({
    mode: "history",
    routes: [{
            path: "/admin/login",
            name: "login",
            component: login
        },

        {
            path: "/admin/dashboard",
            component: DashboardLayout,
            // redirect: "/admin/dashboard",
            meta: {
                requiresAuth: true
            },
            children: [{
                    path: "/admin/dashboard",
                    name: "Dashboard",
                    component: Dashboard
                },
                {
                    path: "/admin/usuario/listar",
                    name: "Listar Usuarios",
                    component: UserList
                },
                {
                    path: "/admin/usuario/agregar",
                    name: "Agregar Usuario",
                    component: UserProfile
                },
                {
                    path: "/admin/usuario/actualizar/:id",
                    name: "Actualizar Usuario",
                    component: UserProfile
                },
                {
                    path: "/admin/publicacion/agregar",
                    name: "Agregar Publicación",
                    component: PostAdd
                },
                {
                    path: "/admin/publicacion/actualizar/:id",
                    name: "Actualizar Publicación",
                    component: PostAdd
                },
                {
                    path: "/admin/publicacion/listar",
                    name: "Listar Publicaciónes",
                    component: PostList
                },
                {
                    path: "/admin/secciones",
                    name: "Secciones",
                    component: secctionIndex
                },
                {
                    path: "/admin/seccion/actualizar/:id",
                    name: "Actualizar Seccion",
                    component: seccionopcion
                },
                {
                    path: "/admin/experiencia/listar",
                    name: "Listar Experiencias",
                    component: experienciasList
                }, {
                    path: "/admin/experiencia/agregar",
                    name: "Agregar Experiencia",
                    component: experienciasAdd
                }, {
                    path: "/admin/experiencia/actualizar/:id",
                    name: "Actualizar Experiencias",
                    component: experienciasAdd
                },
                {
                    path: "/admin/**",
                    name: "Error",
                    component: Error404
                }

            ]
        },
    ]
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        let isLogin = false;

        if (router.app.$session.has("user")) {
            isLogin = true;
        }

        if (!isLogin) {
            next({
                path: "/admin/login",
                query: {
                    redirect: to.fullPath
                }
            });
        } else {
            next();
        }
    } else {
        next(); // make sure to always call next()!
    }
});

export default router;
