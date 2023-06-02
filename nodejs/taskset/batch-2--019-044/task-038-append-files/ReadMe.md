# Append Files

## Code

```javascript
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
```

## Explaination

This Node.js script also uses the `fs` (File System) module to append data to a file. It's quite similar to the previous script you posted, but with a small difference: it begins by appending a string "Colors \n" to the file before appending the color data.

Here's the breakdown of the code:

1. `const fs = require("fs");`: This line imports the built-in `fs` module, which provides an API to interact with the file system.

2. `const colorData = require("./assets/colors.json");`: This line imports a JSON file named `colors.json` located in the `assets` directory. The JSON data is parsed into a JavaScript object and assigned to the `colorData` variable.

3. `fs.appendFile("./storage-files/colors.md", "Colors \n", (err) => {...})`: This line uses the `fs.appendFile` method to asynchronously append the string "Colors \n" to the beginning of the file. If the file does not exist, it will be created.

4. Inside the callback function, it checks if an error occurred while trying to append the data. If there was an error, it throws the error, causing the Node.js process to terminate and print the stack trace to the console. If no error occurred (i.e., the data was successfully appended to the file), it logs a message to the console saying "Beging : Append complete".

5. `colorData.colorList.forEach(c => {...})`: `forEach` is a JavaScript array method that executes a provided function for each item in the array. In this case, for each color object `c` in the `colorData.colorList` array, the function inside the `forEach` will run.

6. `fs.appendFile("./storage-files/colors.md", `${c.color}: ${c.hex} \n`, (err) => {...})`: This line uses the `fs.appendFile` method to asynchronously append data to the file. The data being appended is a string `${c.color}: ${c.hex} \n`, which includes the color's name and its hex value, followed by a newline character (`\n`). This is done for each color in `colorData.colorList`.

7. Inside the callback function, it checks if an error occurred while trying to append the data. If there was an error, it throws the error. If no error occurred (i.e., the data was successfully appended to the file), it logs a message to the console saying "Append complete".

This script demonstrates how to asynchronously append data to a file in Node.js. It starts the operation and then immediately moves on. When the operation is eventually complete, it then executes the callback function.

## Run

- Run

```bash
$ cat storage-files/colors.md 
red: #FF0000 
blue: #0000FF 
green: #00FF00 

$ node append.js              
Beging : Append complete
Append complete
Append complete
Append complete

$ cat storage-files/colors.md
red: #FF0000 
blue: #0000FF 
green: #00FF00 

Colors 
red: #FF0000 
green: #00FF00 
blue: #0000FF
```
