import HTTP from "@/helpers/http";
import * as Endpoints from "../../api/endpoints";

class RoomsApi {
  /**
   * Get all room that exist.
   * @param {Object} formData Student data
   */
  static async getAllRooms(formData) {
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
  static async getAllOffCampusRooms(formData) {
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
  static async getAllOnCampusRooms(formData) {
    try {
      var response = await HTTP.post(Endpoints.allOnCampusRooms, formData);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }
}

export default RoomsApi;
