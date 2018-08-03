import HTTP from "@/helpers/http";
import * as Endpoints from "../../api/endpoints";

class OnCampusBookingApi {
  /**
   * Login a student.
   * @param {Object} formData Student data
   */
  static async createOnCampusBooking(formData) {
    try {
      var response = await HTTP.post(Endpoints.createOnCampusBooking, formData);
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
