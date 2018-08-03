import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import VuexStore from "./store";
import "semantic-ui-css/semantic.min.css";
import "../node_modules/bootstrap/dist/js/bootstrap.min.js";

Vue.config.productionTip = false;

new Vue({
  router,
  store: VuexStore,
  render: h => h(App)
}).$mount("#app");
