# Readable File Streams

## Code

```javascript
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
```

## Explaination

This script reads from a file and reports on the data it receives from that file. It utilizes the `fs` (File System) module in Node.js to create a Readable Stream, which is a way to handle reading data from a source in an asynchronous, non-blocking manner. Let's break it down:

1. `const fs = require("fs");` : This line imports the built-in `fs` module which provides API for interacting with file system.

2. `const readStream = fs.createReadStream("./assets/lorum-ipsum.md", "UTF-8");` : This creates a readable stream from the file `lorum-ipsum.md` in the `./assets` directory. It specifies `UTF-8` as the encoding to convert the file's content to text as it's being read.

3. `let fileTxt = "";` : This declares a variable `fileTxt` that will be used to accumulate the file's content as it's being read.

4. `console.log("type something...");` : This simply logs a message to the console. 

5. `readStream.on("data", (data) => {...});` : This listens for the 'data' event, which is emitted when there is data available to be read from the stream. In the callback, it logs how many characters were read and then appends the chunk of data to `fileTxt`.

6. `readStream.once("data", (data) => {...});` : This also listens for the 'data' event, but only once. The `once` method ensures that the callback is only called the first time the event occurs. Here, it logs the first chunk of data read from the file.

7. `readStream.on("end", () => {...});` : This listens for the 'end' event, which is emitted when there is no more data to be read from the stream. When this happens, it logs that the file reading has finished and reports on the total number of characters read.

So, in summary, this script reads a file asynchronously and reports on the data it receives, using both the 'data' and 'end' events of a Readable Stream.

## Run

- Run

```bash
$ node readStream.js
type something...
****** Inside readStream.on() ******
************ I read 280 characters of text
****** Inside readStream.once() ******
The following is that state of dataread : 
 # Lorem ipsum

Lorem ipsum dolor sit amet, te mutat democritum vix, eum ad fugit labores adversarium. Principes comprehensam ex eum, in sint debitis sed. Est ea mucius semper dissentiet. Mei eu prima rebum illum, est justo dicam et. Eu persius corpora eum. Tale diam nulla no his.

finished reading file
In total I read 280 characters of text
```