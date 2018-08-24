import * as types from "./mutation-types";

export default {
  [types.UPDATE_LOGIN_STATUS](state, payload) {
    state.loggedIn = payload;
  },
  [types.UPDATE_USER](state, payload) {
    state.user = payload;
  },
  [types.USER_TOKEN](state, payload) {
    state.userToken = payload;
  }
};
