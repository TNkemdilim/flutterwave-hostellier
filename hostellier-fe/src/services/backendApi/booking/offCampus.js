import HTTP from "@/helpers/http";
import * as Endpoints from "../endpoints";

class OffCampusBookingApi {
  _authToken = null;

  constructor(authToken) {
    this._authToken = authToken;
  }

  /**
   * Get all room that exist.
   * @param {Object} formData Student data
   */
  async createOffCampusBooking(formData) {
    try {
      var response = await HTTP.post(
        Endpoints.createOffCampusBooking,
        formData,
        this._authToken
      );
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }

  /**
   * Get booking by Id.
   * @param {Object} formData Student data
   */
  async getOffCampusBookingById(id) {
    try {
      var response = await HTTP.get(`${Endpoints.getOffCampusBooking}/${id}`);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }
}

export default OffCampusBookingApi;
