import { HTTP } from "../http";

import {
  setStudentData,
  getStudentData,
  encodeData,
  clearToken
} from "./helper";

/**
 * Login a student.
 * @param {Object} formData Student data
 */
export async function loginStudent(formData) {
  try {
    var response = await HTTP.post("api/v1/auth/student/login", formData);
    if (response.data.status === true) {
      await setStudentData(encodeData(response.data));
    }

    return response.data;
  } catch (e) {
    return e.response.data;
  }
}

export async function registerStudent(formData) {
  try {
    var response = await HTTP.post("api/influencer/register", formData);

    return response.data;
  } catch (e) {
    return e.response.data;
  }
}

export async function updateInfluencerUserToken(data) {
  if (data.status === true) {
    await setStudentData(encodeData(data));
    return true;
  } else {
    return false;
  }
}

// function to log out user
export function logout() {
  clearToken();
  window.location.replace("/");
}

// funtion to check if an influencer is logged in
export function requireInfluencerAuth(to, from, next) {
  if (!isStudentLoggedIn()) {
    next({
      path: "/",
      query: {
        redirect: to.fullPath
      }
    });
  } else {
    next();
  }
}

// funtion to check if a user is not logged in
export function requireGuest(to, from, next) {
  if (isStudentLoggedIn()) {
    next({
      path: "/influencer",
      query: {
        redirect: to.fullPath
      }
    });
  } else {
    next();
  }
}

/**
 * Check if a student is logged in.
 */
export function isStudentLoggedIn() {
  const studentData = getStudentData();
  return !!studentData;
}
