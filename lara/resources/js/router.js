import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./views/Home.vue";
import Error404 from "./views/404.vue";

import DashboardLayout from "./pages/Layout/DashboardLayout.vue";

import Dashboard from "./pages/Dashboard.vue";
import TableList from "./pages/TableList.vue";
import Typography from "./pages/Typography.vue";
import Icons from "./pages/Icons.vue";
import Maps from "./pages/Maps.vue";
import Notifications from "./pages/Notifications.vue";
import UpgradeToPRO from "./pages/UpgradeToPRO.vue";

import UserList from "./pages/Users/UserList.vue";
import UserProfile from "./pages/Users/UserProfile.vue";
import PostAdd from "./pages/Posts/PostAdd.vue";
// export default {
//     mode: "history",

//     routes: [{
//             path: "/admin//",
//             name: "home",
//             component: Home
//         },
//         {
//             path: "/admin/*",
//             name: "error",
//             component: Error404
//         }
//     ]
// };
const router = new VueRouter({
    mode: "history",
    routes: [{
        path: "/admin/",
        component: DashboardLayout,
        redirect: "/admin/dashboard",
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
                path: "/admin/publicacion/agregar",
                name: "Agregar Publicación",
                component: PostAdd
            },
            {
                path: "/admin/typography",
                name: "Typography",
                component: Typography
            },
            {
                path: "/admin/icons",
                name: "Icons",
                component: Icons
            },
            {
                path: "/admin/maps",
                name: "Maps",
                meta: {
                    hideFooter: true
                },
                component: Maps
            },
            {
                path: "/admin/notifications",
                name: "Notifications",
                component: Notifications
            },
            {
                path: "/admin/upgrade",
                name: "Upgrade to PRO",
                component: UpgradeToPRO
            },
            {
                path: "/admin/**",
                name: "Error",
                component: Error404
            }

        ]
    }]
});

export default router;
