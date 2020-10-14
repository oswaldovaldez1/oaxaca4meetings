import Vue from "vue";
import VueSession from "vue-session";
import VueRouter from "vue-router";
import VueAxios from "vue-axios";
import axios from "axios";





import {
    store
} from "./store";
import router from "./router";

// Plugins
import GlobalComponents from "./globalComponents";
import GlobalDirectives from "./globalDirectives";
import Notifications from "./components/NotificationPlugin";



// MaterialDashboard plugin
import MaterialDashboard from "./material-dashboard";

import Chartist from "chartist";

Vue.use(VueAxios, axios);

Vue.use(VueSession, {
    persist: true
});

Vue.prototype.$Chartist = Chartist;

Vue.use(VueRouter);
Vue.use(MaterialDashboard);
Vue.use(GlobalComponents);
Vue.use(GlobalDirectives);
Vue.use(Notifications);



const app = new Vue({
    el: "#app",
    data: {
        Chartist: Chartist
    },
    store,
    router,
    components: {},
    mounted: function () {

    },
    created() {
        if (!this.$session.exists()) {
            this.$session.start();
        }
    },

});
