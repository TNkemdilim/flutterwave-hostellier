import Admin from "../utilities/auth/admin";

/**
 * Check if an admin is logged in.
 * @param {*} to
 * @param {*} from
 * @param {*} next
 */
export default function verifyIfAdmin(to, from, next) {
  if (!Admin.isLoggedIn()) {
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
