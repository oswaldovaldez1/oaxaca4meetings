"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _vue = _interopRequireDefault(require("vue"));

var _vueRouter = _interopRequireDefault(require("vue-router"));

var _ = _interopRequireDefault(require("./views/404.vue"));

var _DashboardLayout = _interopRequireDefault(require("./pages/Layout/DashboardLayout.vue"));

var _Dashboard = _interopRequireDefault(require("./pages/Dashboard.vue"));

var _login = _interopRequireDefault(require("./pages/login.vue"));

var _UserList = _interopRequireDefault(require("./pages/Users/UserList.vue"));

var _UserProfile = _interopRequireDefault(require("./pages/Users/UserProfile.vue"));

var _PostAdd = _interopRequireDefault(require("./pages/Posts/PostAdd.vue"));

var _PostList = _interopRequireDefault(require("./pages/Posts/PostList.vue"));

var _seccionIndex = _interopRequireDefault(require("./pages/Secciones/seccionIndex.vue"));

var _seccionopcion = _interopRequireDefault(require("./pages/Secciones/seccionopcion.vue"));

var _ExperirnciasAdd = _interopRequireDefault(require("./pages/Experiencias/ExperirnciasAdd.vue"));

var _ExperienciasList = _interopRequireDefault(require("./pages/Experiencias/ExperienciasList.vue"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

_vue["default"].use(_vueRouter["default"]);

var router = new _vueRouter["default"]({
  mode: "history",
  routes: [{
    path: "/admin/login",
    name: "login",
    component: _login["default"]
  }, {
    path: "/admin/dashboard",
    component: _DashboardLayout["default"],
    // redirect: "/admin/dashboard",
    meta: {
      requiresAuth: true
    },
    children: [{
      path: "/admin/dashboard",
      name: "Dashboard",
      component: _Dashboard["default"]
    }, {
      path: "/admin/usuario/listar",
      name: "Listar Usuarios",
      component: _UserList["default"]
    }, {
      path: "/admin/usuario/agregar",
      name: "Agregar Usuario",
      component: _UserProfile["default"]
    }, {
      path: "/admin/usuario/actualizar/:id",
      name: "Actualizar Usuario",
      component: _UserProfile["default"]
    }, {
      path: "/admin/publicacion/agregar",
      name: "Agregar Publicación",
      component: _PostAdd["default"]
    }, {
      path: "/admin/publicacion/actualizar/:id",
      name: "Actualizar Publicación",
      component: _PostAdd["default"]
    }, {
      path: "/admin/publicacion/listar",
      name: "Listar Publicaciónes",
      component: _PostList["default"]
    }, {
      path: "/admin/secciones",
      name: "Secciones",
      component: _seccionIndex["default"]
    }, {
      path: "/admin/seccion/actualizar/:id",
      name: "Actualizar Seccion",
      component: _seccionopcion["default"]
    }, {
      path: "/admin/experiencia/listar",
      name: "Listar Experiencias",
      component: _ExperienciasList["default"]
    }, {
      path: "/admin/experiencia/agregar",
      name: "Agregar Experiencia",
      component: _ExperirnciasAdd["default"]
    }, {
      path: "/admin/experiencia/actualizar/:id",
      name: "Actualizar Experiencias",
      component: _ExperirnciasAdd["default"]
    }, {
      path: "/admin/**",
      name: "Error",
      component: _["default"]
    }]
  }]
});
router.beforeEach(function (to, from, next) {
  if (to.matched.some(function (record) {
    return record.meta.requiresAuth;
  })) {
    var isLogin = false;

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
var _default = router;
exports["default"] = _default;
//# sourceMappingURL=router.dev.js.map
