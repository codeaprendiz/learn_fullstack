# Writeable File Streams

## Code

```javascript
const fs = require("fs");

const writeStream = fs.createWriteStream("./assets/myFile.txt", "UTF-8");
const readStream = fs.createReadStream("./assets/lorum-ipsum.md", "UTF-8");

readStream.pipe(writeStream);

console.log("Done")
```

## Explaination

The provided Node.js code performs a simple file copy operation using streams and the `pipe` function. Here's what each part does:

1. `const fs = require("fs");`: This line imports the built-in `fs` (file system) module, which provides functions for interacting with the file system.

2. `const writeStream = fs.createWriteStream("./assets/myFile.txt", "UTF-8");`: This line creates a writeable stream to a file named `myFile.txt` in the `assets` directory. If the file does not exist, it will be created. If it does exist, it will be overwritten. `UTF-8` is the character encoding used for the file.

3. `const readStream = fs.createReadStream("./assets/lorum-ipsum.md", "UTF-8");`: This line creates a readable stream from a file named `lorum-ipsum.md` in the `assets` directory. `UTF-8` is the character encoding used for reading the file.

4. `readStream.pipe(writeStream);`: The `pipe` function is a method on readable streams that you can use to send data from the readable stream to a writable stream. In this case, it's used to send data from `readStream` to `writeStream`. This effectively copies the contents of `lorum-ipsum.md` to `myFile.txt`.

5. `console.log("Done")`: Once the JavaScript interpreter reaches this line, it logs the string "Done" to the console. This doesn't necessarily mean that the copying operation is complete, because the operation is asynchronous and might still be in progress. 

Note: Streamed operations in Node.js are performed in chunks, allowing large files to be handled without overwhelming system memory. The `pipe` method automatically handles the listening for 'data' events and writing those chunks to the destination, making it easier to work with streams.

## Run

- Run

```bash
$ ls assets
lorum-ipsum.md
$ node writeStream.js
Done
$ ls assets
lorum-ipsum.md myFile.txt
```
