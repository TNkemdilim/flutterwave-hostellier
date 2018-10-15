import Student from "../utilities/auth/student";

/**
 * Check if a student is logged in.
 * @param {*} to
 * @param {*} from
 * @param {*} next
 */
export default function verifyIfStudent(to, from, next) {
  if (!Student.isLoggedIn()) {
    next({
      path: "/admin",
      query: {
        redirect: to.fullPath
      }
    });
  } else {
    next();
  }
}
