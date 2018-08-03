import HTTP from "@/helpers/http";
import * as Endpoints from "../../api/endpoints";
import OffCampusRooms from "./offCampus";
import OnCampusRooms from "./onCampus";

/**
 * Get all room that exist.
 * @param {Object} formData Student data
 */
const getAllRooms = async formData => {
  try {
    var response = await HTTP.post(Endpoints.allCampusRooms, formData);
    return response.data;
  } catch (e) {
    return e.response.data;
  }
};

export { getAllRooms, OnCampusRooms, OffCampusRooms };
