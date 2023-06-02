const cp = require("child_process");

console.log("I am creating a new process that will read a file")

cp.exec("node readStream", (err, data, stderr) => {
  console.log(data);
});

console.log("Done.")
