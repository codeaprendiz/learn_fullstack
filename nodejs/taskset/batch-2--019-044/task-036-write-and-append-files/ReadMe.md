# Write and append files

## Code

```javascript
const fs = require("fs");

const md = `
# This is a new file

We can write text to a file with fs.writeFile

* fs.readdir
* fs.readFile
* fs.writeFile

`;

fs.writeFile("./assets/notes.md", md.trim(), err => {
  if (err) {
    throw err;
  }
  console.log("file saved");
});
```

## Explaination

This Node.js script uses the `fs` (File System) module to create a new file and write content to it. Here's the breakdown of the code:

1. `const fs = require("fs");`: This line imports the built-in `fs` module, which provides methods for interacting with the file system.

2. `const md = '...'`: Here, a constant `md` is defined to hold a multi-line string, which uses backticks (`` ` ``) to define the string. This is a feature of ES6 known as "template literals". The content of the string is in Markdown format, denoted by elements such as `#` for a heading and `*` for a bullet list. The `md.trim()` function is used later to remove any leading or trailing white space from this string.

3. `fs.writeFile("./assets/notes.md", md.trim(), err => {...})`: The `writeFile` method from the `fs` module is used to write data to a file. The first argument is the file where you want to write the data. In this case, it's writing to a file named `notes.md` in the `assets` directory.

    The second argument is the data you want to write to the file. It uses `md.trim()`, which is the `md` string with leading and trailing white space removed.

    The third argument is a callback function which is executed once Node.js finishes writing to the file. This function takes one argument: `err`.

    - If an error occurred while trying to write to the file (e.g., if the file is read-only), then `err` will contain an Error object.
    - If there was no error, `err` will be `null`.

4. `if (err) { throw err; }`: This is an error-handling pattern in Node.js. If an error occurred while writing to the file (i.e., if `err` is not `null`), this line will throw the error, causing the Node.js process to terminate and print the stack trace to the console.

5. `console.log("file saved");`: If no error occurred, this line logs a message to the console indicating that the file was successfully written. 

This script demonstrates asynchronous file writing in Node.js. It starts writing the file and then immediately moves on. When the file writing is eventually complete, it then executes the callback function.

## Run

- Run

```bash
node writeFile.js 
file saved
```
