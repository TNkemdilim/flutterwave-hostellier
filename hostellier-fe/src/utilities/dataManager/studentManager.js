import { encodeData, decodeData } from "../../helpers/encryption";
const STUDENT_DATA = process.env.VUE_APP_STUDENT_DATA;

class Student {
  /**
   * Retrieves the auth token for student.
   */
  static getStudentToken() {
    let data = Student.getStudentData();
    if (data != null) {
      return data.token !== null ? data.token : null;
    }

    return null;
  }

  /**
   * Retrieves a students data from local storage.
   */
  static getStudentData() {
    let data = decodeData(localStorage.getItem(STUDENT_DATA));
    if (data) return data;

    return null;
  }

  /**
   *  Clear student data from localstorage.
   */
  static clearStudentData() {
    localStorage.removeItem(STUDENT_DATA);
  }

  /**
   * Saves a student data to local storage.
   * @param {Object} data Student data
   */
  static setStudentData(data) {
    localStorage.setItem(STUDENT_DATA, encodeData(data));
  }
}

export default Student;
