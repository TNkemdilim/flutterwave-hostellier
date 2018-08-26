import HTTP from "@/helpers/http";
import * as Endpoints from "../endpoints";

class OnCampusRoomsApi {
  _authToken = null;

  constructor(authToken) {
    this._authToken = authToken;
  }

  /**
   * Login a student.
   * @param {Object} formData Student data
   */
  async getAllOnCampusRooms() {
    try {
      var response = await HTTP.get(
        Endpoints.allOnCampusRooms,
        this._authToken
      );
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }
}

export default OnCampusRoomsApi;
