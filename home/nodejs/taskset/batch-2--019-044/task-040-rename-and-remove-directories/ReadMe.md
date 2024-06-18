# Rename and Remove directories

## Code

```javascript
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
```

## Explaination

The code snippet you posted demonstrates how to delete all files within a directory and then remove the directory itself in Node.js using the File System (`fs`) module. Let's break it down:

1. `const fs = require("fs");`: This line imports the built-in `fs` module, which provides an API for interacting with the file system in Node.js.

2. `fs.readdirSync("./assets").forEach(fileName => {...});`: This line first synchronously reads the contents of the directory `./assets` with the `fs.readdirSync` method, which returns an array of the names of the files in the directory. It then uses `Array.prototype.forEach` to loop through each file name in the array.

3. `fs.unlinkSync(`./assets/${fileName}`);`: Inside the forEach loop, this line synchronously removes (deletes) each file in the `./assets` directory using `fs.unlinkSync`. `fs.unlinkSync` will block the execution of further code until the file is deleted.

4. `fs.rmdir("./assets", err => {...});`: This line attempts to asynchronously remove (delete) the `./assets` directory using `fs.rmdir`. If an error occurs during this operation, it will call the provided callback function with an `err` object. If no error occurs, it will log `./assets directory removed` to the console. Note that `fs.rmdir` can only remove empty directories.

So, in summary, this script is used to delete all files within a directory, and then delete the directory itself. It demonstrates the use of both synchronous (with 'Sync' suffix) and asynchronous operations in the Node.js File System module.

## Run

- Before

```bash
ls assets 
Readme.md      colorData.json
```

- Run

```bash
node directories.js 
Removing file :  Readme.md
Removing file :  colorData.json
./assets directory removed
```

- After

```bash
ls
ReadMe.md      directories.js
```
