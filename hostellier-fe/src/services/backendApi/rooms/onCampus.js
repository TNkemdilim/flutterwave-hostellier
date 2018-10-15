import HTTP from "@/helpers/http";
import * as Endpoints from "../endpoints";

class OnCampusRoomsApi {
  _authToken = null;

  constructor(authToken) {
    this._authToken = authToken;
  }

  /**
   * Retrieves all on-campus rooms available.
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

  async addOnCampusRoom(formData) {
    try {
      var response = await HTTP.post(
        Endpoints.OnCampusRoom,
        formData,
        this._authToken
      );
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }

  async deleteOnCampusRoomById(id) {
    try {
      var response = await HTTP.delete(
        `${Endpoints.OnCampusRoom}/${id}`,
        this._authToken
      );
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }
}

export default OnCampusRoomsApi;
