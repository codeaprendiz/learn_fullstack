const fs = require("fs");
const colorData = require("./assets/colors.json");

fs.appendFile("./storage-files/colors.md", "Colors \n", (err) => {
  if (err) {
    throw err;
  }
  console.log("Beging : Append complete")
});

colorData.colorList.forEach(c => {
  fs.appendFile("./storage-files/colors.md", `${c.color}: ${c.hex} \n`, (err) => {
    if (err) {
      throw err;
    }
    console.log("Append complete")
  });
});
