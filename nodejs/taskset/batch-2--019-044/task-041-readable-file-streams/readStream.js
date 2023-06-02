const fs = require("fs");

const readStream = fs.createReadStream("./assets/lorum-ipsum.md", "UTF-8");

let fileTxt = "";

console.log("type something...");
readStream.on("data", (data) => {
  console.log("****** Inside readStream.on() ******");
  console.log(`************ I read ${data.length - 1} characters of text`);
  fileTxt += data;
});

readStream.once("data", (data) => {
  console.log("****** Inside readStream.once() ******");
  console.log("The following is that state of dataread : \n", data);
});

readStream.on("end", () => {
  console.log("finished reading file");
  console.log(`In total I read ${fileTxt.length - 1} characters of text`);
});
