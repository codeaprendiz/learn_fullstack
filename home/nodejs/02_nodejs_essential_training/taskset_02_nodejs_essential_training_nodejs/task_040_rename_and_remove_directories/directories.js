const fs = require("fs");

fs.readdirSync("./assets").forEach(fileName => {
  console.log("Removing file : ", fileName)
  fs.unlinkSync(`./assets/${fileName}`);
});

fs.rmdir("./assets", err => {
  if (err) {
    throw err;
  }

  console.log("./assets directory removed");
});
