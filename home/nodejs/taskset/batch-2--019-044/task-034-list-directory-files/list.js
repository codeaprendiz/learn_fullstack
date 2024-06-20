const fs = require("fs");

fs.readdir("./assets", (err, files) => {
  if (err) {
    throw err;
  }
  console.log("Inside readdir callback");
  console.log(files);
});

console.log("Started reading files");
