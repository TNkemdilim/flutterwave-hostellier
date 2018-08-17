import HTTP from "@/helpers/http";
import * as Endpoints from "../endpoints";

class OffCampusRoomsApi {
  /**
   * Login a student.
   * @param {Object} formData Student data
   */
  static async getAllOffCampusRooms() {
    try {
      var response = await HTTP.get(Endpoints.allOffCampusRooms);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }
}

export default OffCampusRoomsApi;
