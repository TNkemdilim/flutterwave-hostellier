import StudentManager from "../dataManager/studentManager";

import { StudentAuth } from "../../services/backendApi/auth";

class Student {
  /**
   * Check if a student is logged in.
   */
  static isLoggedIn() {
    const studentData = StudentManager.getStudentData();
    console.log(studentData);
    return !!studentData;
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
