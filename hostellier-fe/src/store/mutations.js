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
  },
  [types.TOTAL_OFF_CAMPUS_ROOMS_BOOKED](state, payload) {
    state.student.bookings.totalOffCampusRoomsBooked = payload;
  },
  [types.TOTAL_ON_CAMPUS_ROOMS_BOOKED](state, payload) {
    state.student.bookings.totalOnCampusRoomsBooked = payload;
  }
};
