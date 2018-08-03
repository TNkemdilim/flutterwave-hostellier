import * as types from "./mutation-types";

export default {
  [types.UPDATE_LOGIN_STATUS](state, payload) {
    state.loggedIn = payload;
  }
};
