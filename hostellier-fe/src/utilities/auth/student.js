import StudentManager from "../dataManager/studentManager";

import { StudentAuth } from "../../services/backendApi/auth";

class Student {
  /**
   * Check if a student is logged in.
   */
  static isLoggedIn() {
    const studentData = StudentManager.getStudentData();
    return !!studentData;
  }

  /**
   * Retrieves the bearer token header for the student.
   */
  static getBearerHeader() {
    let studentAuthToken = StudentManager.getStudentToken();
    if (studentAuthToken === null) {
      return null;
    }

    var Header = {
      headers: {
        Authorization: `Bearer ${studentAuthToken}`
      }
    };
    return Header;
  }

  /**
   * Login a student.
   * @param {Object} formData Student data
   */
  static async login(formData) {
    let response = await StudentAuth.login(formData);
    if (response.status === true) {
      await StudentManager.setStudentData(response.data);
    }

    return response;
  }

  static async register(formData) {
    return await StudentAuth.register(formData);
  }

  static async updateStudentData(data) {
    if (data.status === true) {
      await StudentManager.setStudentData(data);
      return true;
    }
    return false;
  }

  static logout() {
    StudentManager.clearStudentData();
  }
}

export default Student;
