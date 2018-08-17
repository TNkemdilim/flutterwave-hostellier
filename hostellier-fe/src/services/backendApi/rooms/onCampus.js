import HTTP from "@/helpers/http";
import * as Endpoints from "../endpoints";

class OnCampusRoomsApi {
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

export default OnCampusRoomsApi;
