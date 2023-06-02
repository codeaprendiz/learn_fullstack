# Read Files

## Code

```javascript
const fs = require("fs");

fs.readFile("./assets/alex.jpg", (err, img) => {
  if (err) {
    console.log(`An error has occured: ${err.message}`);
    process.exit();
  }
  console.log("file contents read");
  console.log(img);
});
```

## Explaination

The given code is another example of a Node.js script which uses the `fs` (file system) module, but this time to read a file, specifically an image file. Let's break down the code:

1. `const fs = require("fs");`: This line imports the built-in `fs` module, which provides methods to interact with the file system.

2. `fs.readFile("./assets/alex.jpg", (err, img) => { ... });`: The `readFile` method from the `fs` module is used to read the contents of a file asynchronously. The first argument is the path to the file you want to read. In this case, it's reading a file named `alex.jpg` located in the `assets` directory (the `./` refers to the current directory).

    The second argument is a callback function which is executed once Node.js finishes reading the file. This function takes two arguments: `err` and `img`.

    - If an error occurred while trying to read the file (for example, if the file does not exist), then `err` will contain an Error object, and `img` will be `undefined`.
    - If there was no error, `err` will be `null` and `img` will be a Buffer object representing the contents of the file. The Buffer object can be converted to a string, written to another file, sent in a HTTP response, etc.

3. `if (err) { console.log(`An error has occured: ${err.message}`); process.exit(); }`: This is an error-handling pattern in Node.js. If an error occurred while reading the file (i.e., if `err` is not `null`), this line will log the error message to the console and terminate the Node.js process using `process.exit()`.

4. `console.log("file contents read"); console.log(img);`: If no error occurred, these lines will log a message to the console and print the Buffer object representing the file contents. As buffers are a sequence of raw binary data, you will see a lot of unreadable characters if you log the buffer directly to the console. For a text file, you could convert it to a string using `img.toString()`. But for an image file like in this case, the binary data won't be meaningful if printed as a string. Normally you might write the buffer to a file or send it in a HTTP response.

This script demonstrates asynchronous file reading in Node.js. Just like the previous script, it starts reading the file and then immediately moves on. When the file reading is eventually complete, it then executes the callback function.

## Run

- Run

```bash
node readFile.js 
file contents read
<Buffer ff d8 ff e2 02 1c 49 43 43 5f 50 52 4f 46 49 4c 45 00 01 01 00 00 02 0c 6c 63 6d 73 02 10 00 00 6d 6e 74 72 52 47 42 20 58 59 5a 20 07 dc 00 01 00 19 ... 35292 more bytes>
```
