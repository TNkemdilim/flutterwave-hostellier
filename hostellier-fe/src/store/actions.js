import * as types from "./mutation-types";

export const setLoginStatus = ({ commit }, payload) => {
  commit(types.UPDATE_LOGIN_STATUS, payload);
};
