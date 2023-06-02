# List Directory Files

## Code

```javascript
const fs = require("fs");

fs.readdir("./assets", (err, files) => {
  if (err) {
    throw err;
  }
  console.log("Inside readdir callback");
  console.log(files);
});

console.log("Started reading files");
```

## Explaination

The code you've posted is a simple Node.js script which uses the `fs` (file system) module to read the contents of a directory. Here's how it works:

1. `const fs = require("fs");`: This line imports the built-in `fs` module. This module allows you to interact with the file system in your computer. It has methods for reading and writing files, creating directories, and more.

2. `fs.readdir("./assets", (err, files) => { ... });`: This line calls the `readdir` method from the `fs` module. This method is used to read the contents of a directory. The first argument it takes is the path to the directory you want to read. In this case, it's reading a directory named `assets` in the same directory where the script is located (`./` refers to the current directory).

    The second argument is a callback function which is executed once Node.js finishes reading the directory. This function takes two arguments: `err` and `files`.

    - If an error occurred while trying to read the directory (for example, if the directory does not exist), then `err` will contain an Error object, and `files` will be `undefined`.
    - If there was no error, `err` will be `null` and `files` will be an array of strings, where each string is the name of a file or subdirectory inside the `assets` directory.

3. `if (err) { throw err; }`: This is an error-handling pattern in Node.js. If an error occurred while reading the directory (i.e., if `err` is not `null`), this line will throw the error, which will stop the execution of the script and print the error message to the console.

4. `console.log("Inside readdir callback"); console.log(files);`: If no error occurred, these lines will log a message to the console and print the list of files and subdirectories in the `assets` directory.

5. `console.log("Started reading files");`: This line is outside of the `readdir` callback function. It will be executed right after the `readdir` method is called. However, because `readdir` is an asynchronous function (meaning that it doesn't block the rest of the code from running), this line will actually be executed before the `readdir` callback, even though it appears later in the code. That's why the message "Started reading files" will appear in the console before "Inside readdir callback" and the list of files.

This code demonstrates the asynchronous nature of Node.js - it does not wait for `fs.readdir` to complete before moving on to the `console.log("Started reading files");` line. Instead, it starts reading the files and then immediately logs "Started reading files" to the console. When the file reading is eventually complete, it will then execute the callback function and log the files to the console.

## Run

- Run

```bash
node list.js 
started reading files
complete
[ 'Readme.md', 'alex.jpg', 'colors.json' ]
```
