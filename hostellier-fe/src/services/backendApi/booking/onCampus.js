import HTTP from "@/helpers/http";
import * as Endpoints from "../endpoints";

class OnCampusBookingApi {
  _authToken = null;

  constructor(authToken) {
    this._authToken = authToken;
  }

  /**
   * Login a student.
   * @param {Object} formData Student data
   */
  static async createOnCampusBooking(formData) {
    try {
      var response = await HTTP.post(
        Endpoints.createOnCampusBooking,
        formData,
        this._authToken
      );
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }

  /**
   * Login a student.
   * @param {Object} formData Student data
   */
  static async getOnCampusBookingById(id) {
    try {
      var response = await HTTP.get(`${Endpoints.getOnCampusBooking}/${id}`);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }
}

export default OnCampusBookingApi;
