class LaravelError {
  static flattenValidationError(err, lineSeperator = "<br>") {
    if (typeof err === typeof "") return err;

    var a = JSON.stringify(err);
    a = a.split('"],"').join(lineSeperator);
    a = a.split('":["').join(": ");
    a = a.split('"]}').join("");
    a = a.split('{"').join("");
    a = a.split("<Br>").join(`${lineSeperator}${lineSeperator}`);
    return a; //.replace(/\b\w/g, l => l.toUpperCase());
  }
}

export default LaravelError;
