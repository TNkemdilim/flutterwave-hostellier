import * as types from "./mutation-types";

export const setLoginStatus = ({ commit }, payload) => {
  commit(types.UPDATE_LOGIN_STATUS, payload);
};
export const setUser = ({ commit }, payload) => {
  commit(types.UPDATE_USER, payload);
};
export const setUserToken = ({ commit }, payload) => {
  commit(types.USER_TOKEN, payload);
};
