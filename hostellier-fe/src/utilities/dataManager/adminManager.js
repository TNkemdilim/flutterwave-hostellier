import { encodeData, decodeData } from "../../helpers/encryption";
const ADMIN_DATA = process.env.VUE_APP_ADMIN_DATA;

class Admin {
  /**
   * Retrieves the auth token for admin.
   */
  static getAdminToken() {
    let data = Admin.getAdminData();
    if (data != null) {
      return data.token !== null ? data.token : null;
    }

    return null;
  }

  /**
   * Retrieves a admin data from local storage.
   */
  static getAdminData() {
    let data = decodeData(localStorage.getItem(ADMIN_DATA));
    if (data) return data;

    return null;
  }

  /**
   *  Clear admin data from local storage.
   */
  static clearAdminData() {
    localStorage.removeItem(ADMIN_DATA);
  }

  /**
   * Saves a admin data to local storage.
   * @param {Object} data Admin data
   */
  static setAdminData(data) {
    localStorage.setItem(ADMIN_DATA, encodeData(data));
  }
}

export default Admin;
