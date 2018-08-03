import HTTP from "@/helpers/http";
import * as Endpoints from "../../api/endpoints";

class OffCampusRoomsApi {
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
}

export default OffCampusRoomsApi;
