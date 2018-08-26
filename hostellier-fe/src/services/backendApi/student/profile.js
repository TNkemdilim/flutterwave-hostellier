import HTTP from "@/helpers/http";
import * as Endpoints from "../endpoints";

class GetStudentProfileApi {
  _authToken = null;

  constructor(authToken) {
    this._authToken = authToken;
  }

  /**
   * Get the profile of the student.
   */
  async getProfile() {
    try {
      var response = await HTTP.get(Endpoints.studentProfile, this._authToken);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }

  /**
   * Get the bookings of a student.
   */
  async getBookings() {
    try {
      var response = await HTTP.get(Endpoints.studentBookings, this._authToken);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }

  /**
   * Get the off-campus bookings of a student.
   */
  async getOffCampusBookings() {
    try {
      var response = await HTTP.get(
        Endpoints.studentOffCampusBooking,
        this._authToken
      );
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }

  /**
   * Get the on-campus bookings of a student.
   */
  async getOnCampusBookings() {
    try {
      var response = await HTTP.get(
        Endpoints.studentOnCampusBooking,
        this._authToken
      );
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }
}

export default GetStudentProfileApi;
