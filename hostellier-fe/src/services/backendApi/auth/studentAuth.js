import HTTP from "@/helpers/http";
import * as Endpoints from "../endpoints";

class StudentAuthApi {
  /**
   * Login a student.
   * @param {Object} formData Student data
   */
  static async login(formData) {
    try {
      var response = await HTTP.post(Endpoints.loginStudent, formData);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }

  static async register(formData) {
    try {
      var response = await HTTP.post(Endpoints.registerStudent, formData);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  }
}

export default StudentAuthApi;
