"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.store = void 0;

var _vue = _interopRequireDefault(require("vue"));

var _vuex = _interopRequireDefault(require("vuex"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

_vue["default"].use(_vuex["default"]);

var store = new _vuex["default"].Store({
  state: {
    //valores
    blogList: [],
    blogPub: {}
  },
  getters: {
    getBlogList: function getBlogList(state) {
      if (state.blogList.length === 0) {
        _vue["default"].axios.get("/api/blog").then(function (response) {
          //console.log(response.data);
          state.blogList = response.data;
        });
      }

      return state.blogList;
    }
  },
  mutations: {
    ADD_BLOG_PUB: function ADD_BLOG_PUB(state, pub) {
      state.blogPub = pub;
    }
  },
  actions: {
    addBlogPub: function addBlogPub(contex, pub) {
      contex.commit("ADD_BLOG_PUB", pub);
    }
  } // modules: {}

});
exports.store = store;