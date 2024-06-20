# Directory Creation

## Code

```javascript
const fs = require("fs");

if (fs.existsSync("storage-files")) {
  console.log("Already there");
} else {
  fs.mkdir("storage-files", (err) => {
    if (err) {
      throw err;
    }

    console.log("directory created");
  });
}
```

## Explaination

This Node.js script uses the `fs` (File System) module to check if a directory named "storage-files" exists in the current directory, and if it does not exist, creates it. Here's a breakdown of the code:

1. `const fs = require("fs");`: This line imports the built-in `fs` module, which provides methods for interacting with the file system.

2. `if (fs.existsSync("storage-files")) {...}`: The `fs.existsSync()` method is used to synchronously check if a file or directory exists at the provided path ("storage-files" in this case). This returns a boolean value - `true` if the file or directory exists, `false` otherwise. If "storage-files" directory exists, it logs "Already there" to the console.

3. `else {...}`: This block of code will execute if "storage-files" directory does not exist. 

4. `fs.mkdir("storage-files", (err) => {...})`: The `fs.mkdir()` method is used to asynchronously create a new directory at the path provided in the first argument ("storage-files" in this case). The second argument is a callback function that Node.js will call after trying to create the directory.

5. `if (err) { throw err; }`: Inside the callback function, it checks if an error occurred while trying to create the directory (i.e., if `err` is not `null`). If there was an error, it throws the error, causing the Node.js process to terminate and print the stack trace to the console.

6. `console.log("directory created");`: If no error occurred (i.e., the directory was successfully created), it logs a message to the console saying "directory created".

This script demonstrates asynchronous directory creation in Node.js. It starts the operation and then immediately moves on. When the operation is eventually complete, it then executes the callback function.

## Run

- Run

```bash
$ node directory.js 
directory created

$ node directory.js
Already there
```
