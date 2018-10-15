import * as types from "./mutation-types";
import StudentAuth from "@/utilities/auth/student";
import AdminAuth from "@/utilities/auth/admin";

export const setLoginStatus = ({ commit }, payload) => {
  commit(types.UPDATE_LOGIN_STATUS, payload);
  if (payload === false) {
    StudentAuth.logout();
    AdminAuth.logout();
  }
};
export const setUser = ({ commit }, payload) => {
  commit(types.UPDATE_USER, payload);
};
export const setUserToken = ({ commit }, payload) => {
  commit(types.USER_TOKEN, payload);
};
export const setTotalOffCampusRoomsBooked = ({ commit }, payload) => {
  commit(types.TOTAL_OFF_CAMPUS_ROOMS_BOOKED, payload);
};
export const setTotalOnCampusRoomsBooked = ({ commit }, payload) => {
  commit(types.TOTAL_ON_CAMPUS_ROOMS_BOOKED, payload);
};
