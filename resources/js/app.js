import Vue from 'vue'
require('./bootstrap');
import BootstrapVue from 'bootstrap-vue/dist/bootstrap-vue.esm';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
Vue.use(BootstrapVue)
import App from './App.vue'
import VueResource from 'vue-resource';
export const serverBus=new Vue();
import VueRouter from 'vue-router'
import routes from "./routes";
Vue.use(VueRouter)
const router = new VueRouter({
  mode: 'history',
  routes: routes
});


new Vue({
  el: '#app',
  router:router,
  render: h => h(App)
})
