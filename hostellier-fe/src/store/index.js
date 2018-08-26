import Vue from "vue";
import Vuex from "vuex";

import * as getters from "./getters";
import mutations from "./mutations";
import * as actions from "./actions";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    loggedIn: false,
    user: null,
    userToken: null,
    student: {
      bookings: {
        totalOffCampusRoomsBooked: 0,
        totalOnCampusRoomsBooked: 0
      }
    }
  },
  getters,
  mutations,
  actions
});
