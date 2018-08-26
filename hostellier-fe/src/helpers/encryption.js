const jwt = require("node.jwt");
const SECRET = process.env.VUE_APP_SECRET;

export function encodeData(params) {
  var token = jwt.encode(params, SECRET);
  return token;
}

export function decodeData(params) {
  var token = jwt.decode(params, SECRET);
  return token.payload;
}

/**
 * Generate a random hash for reference keys.
 */
export function generateRandomReferenceHash() {
  let text = "";
  let possible =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (let i = 0; i < 10; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}
