import HTTP from "@/helpers/http";
import * as Endpoints from "../endpoints";

class AdminAuthApi {
  /**
   * Login an admin.
   * @param {Object} formData Admin data
   */
  static async login(formData) {
    try {
      var response = await HTTP.post(Endpoints.loginAdmin, formData);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }

  static async register(formData) {
    try {
      var response = await HTTP.post(Endpoints.registerAdmin, formData);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }
}

export default AdminAuthApi;
