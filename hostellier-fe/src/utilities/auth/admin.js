import AdminManager from "../dataManager/adminManager";

import { AdminAuth } from "../../services/backendApi/auth";

class Admin {
  /**
   * Check if an admin is logged in.
   */
  static isLoggedIn() {
    const adminData = AdminManager.getAdminData();
    return !!adminData;
  }

  /**
   * Retrieves the bearer token header for the admin.
   */
  static getBearerHeader() {
    let adminAuthToken = AdminManager.getAdminToken();
    if (adminAuthToken === null) {
      return null;
    }

    var Header = {
      headers: {
        Authorization: `Bearer ${adminAuthToken}`
      }
    };
    return Header;
  }

  /**
   * Login an admin.
   * @param {Object} formData Admin data
   */
  static async login(formData) {
    let response = await AdminAuth.login(formData);
    if (response.status === true) {
      await AdminManager.setAdminData(response.data);
    }

    return response;
  }

  static async register(formData) {
    return await AdminAuth.register(formData);
  }

  static async updateAdminData(data) {
    if (data.status === true) {
      await AdminManager.setAdminData(data);
      return true;
    }
    return false;
  }

  static logout() {
    AdminManager.clearAdminData();
  }
}

export default Admin;
