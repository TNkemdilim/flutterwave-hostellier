import HTTP from "@/helpers/http";
import * as Endpoints from "../endpoints";

class OffCampusRoomsApi {
  _authToken = null;

  constructor(authToken) {
    this._authToken = authToken;
  }

  /**
   * Get all off campis rooms.
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

  async addOffCampusRoom(formData) {
    try {
      var response = await HTTP.post(
        Endpoints.OffCampusRoom,
        formData,
        this._authToken
      );
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }

  async deleteOffCampusRoom(id) {
    try {
      var response = await HTTP.get(
        `${Endpoints.OffCampusRoom}/${id}`,
        this._authToken
      );
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }
}

export default OffCampusRoomsApi;
