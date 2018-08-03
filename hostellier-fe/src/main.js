import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import VuexStore from "./store";

// External Components
import Toasted from "vue-toasted";
import VueTimeago from "vue-timeago";
import VueSweetalert2 from "vue-sweetalert2";
import "@fortawesome/fontawesome-free/css/all.min.css";
import "@fortawesome/fontawesome-free/js/all.min";
import Toast from "vue2-toast";
import "vue2-toast/lib/toast.css";

Vue.use(VueSweetalert2);
Vue.use(Toast, {
  defaultType: "center",
  duration: 5000,
  wordWrap: true
});
Vue.use(Toasted, {
  position: "top-center",
  iconPack: "fontawesome",
  duration: 5000
});
Vue.use(VueTimeago, {
  name: "timeago",
  locale: "en-US"
});

import "semantic-ui-css/semantic.min.css";
import "../node_modules/bootstrap/dist/js/bootstrap.min.js";

Vue.config.productionTip = false;

new Vue({
  router,
  store: VuexStore,
  render: h => h(App)
}).$mount("#app");
