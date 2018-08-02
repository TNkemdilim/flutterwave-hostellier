import {
  setStudentData,
  clearStudentData,
  getStudentData
} from "../dataManager/studentManager";

import StudentAuth from "../auth/student";

class Student {
  /**
   * Check if a student is logged in.
   */
  static isLoggedIn() {
    const studentData = getStudentData();
    return !!studentData;
  }

  /**
   * Login a student.
   * @param {Object} formData Student data
   */
  static async login(formData) {
    let response = await StudentAuth.login(formData);
    if (response.status === true) {
      await setStudentData(response.data);
    }

    return response.data;
  }

  static async register(formData) {
    return await StudentAuth.register(formData);
  }

  static async updateStudentData(data) {
    if (data.status === true) {
      await setStudentData(data);
      return true;
    }
    return false;
  }

  static logout() {
    clearStudentData();
  }
}

export default Student;
