"use strict";

var _vue = _interopRequireDefault(require("vue"));

var _vueSession = _interopRequireDefault(require("vue-session"));

var _vueRouter = _interopRequireDefault(require("vue-router"));

var _vueAxios = _interopRequireDefault(require("vue-axios"));

var _axios = _interopRequireDefault(require("axios"));

var _store = require("./store");

var _router = _interopRequireDefault(require("./router"));

var _globalComponents = _interopRequireDefault(require("./globalComponents"));

var _globalDirectives = _interopRequireDefault(require("./globalDirectives"));

var _NotificationPlugin = _interopRequireDefault(require("./components/NotificationPlugin"));

var _materialDashboard = _interopRequireDefault(require("./material-dashboard"));

var _chartist = _interopRequireDefault(require("chartist"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

// Plugins
// MaterialDashboard plugin
_vue["default"].use(_vueAxios["default"], _axios["default"]);

_vue["default"].use(_vueSession["default"], {
  persist: true
});

_vue["default"].prototype.$Chartist = _chartist["default"];

_vue["default"].use(_vueRouter["default"]);

_vue["default"].use(_materialDashboard["default"]);

_vue["default"].use(_globalComponents["default"]);

_vue["default"].use(_globalDirectives["default"]);

_vue["default"].use(_NotificationPlugin["default"]);

var app = new _vue["default"]({
  el: "#app",
  data: {
    Chartist: _chartist["default"]
  },
  store: _store.store,
  router: _router["default"],
  components: {},
  mounted: function mounted() {},
  created: function created() {
    if (!this.$session.exists()) {
      this.$session.start();
    }
  }
});
//# sourceMappingURL=app.dev.js.map
