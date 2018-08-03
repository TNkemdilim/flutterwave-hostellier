import HTTP from "@/helpers/http";
import * as Endpoints from "../../api/endpoints";

class OffCampusBookingApi {
  /**
   * Get all room that exist.
   * @param {Object} formData Student data
   */
  static async createOffCampusBooking(formData) {
    try {
      var response = await HTTP.post(
        Endpoints.createOffCampusBooking,
        formData
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
  static async getOffCampusBookingById(id) {
    try {
      var response = await HTTP.get(`${Endpoints.getOffCampusBooking}/${id}`);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }
}

export default OffCampusBookingApi;
