import HTTP from "@/helpers/http";
import * as Endpoints from "../../api/endpoints";

class BookingApi {
  /**
   * Get all room that exist.
   * @param {Object} formData Student data
   */
  static async createOffCampusBooking(formData) {
    try {
      var response = await HTTP.post(Endpoints.allCampusRooms, formData);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }

  /**
   * Login a student.
   * @param {Object} formData Student data
   */
  static async createOnCampusBooking(formData) {
    try {
      var response = await HTTP.post(Endpoints.allOffCampusRooms, formData);
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
      var response = await HTTP.post(Endpoints.allOnCampusRooms, formData);
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
      var response = await HTTP.post(Endpoints.allOnCampusRooms, formData);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }
}

export default BookingApi;
