export const isLoggedIn = state => state.loggedIn;
export const user = state => state.user;
export const userToken = state => state.userToken;
export const totalOnCampusRoomsBooked = state =>
  state.student.bookings.totalOnCampusRoomsBooked;
export const totalOffCampusRoomsBooked = state =>
  state.student.bookings.totalOffCampusRoomsBooked;
