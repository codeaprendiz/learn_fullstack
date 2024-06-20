# Create child process with exec

## Code

- exec.js

```javascript
const cp = require("child_process");

console.log("I am creating a new process that will read a file")

cp.exec("node readStream", (err, data, stderr) => {
  console.log(data);
});

console.log("Done.")
```

- readStream.js

```javascript

```javascript
const fs = require("fs");

const readStream = fs.createReadStream("./assets/lorum-ipsum.md", "UTF-8");

let fileTxt = "";

console.log("type something...");
readStream.on("data", data => {
  console.log(`I read ${data.length - 1} characters of text`);
  fileTxt += data;
});

readStream.once("data", data => {
  console.log(data);
});

readStream.on("end", () => {
  console.log("finished reading file");
  console.log(`In total I read ${fileTxt.length - 1} characters of text`);
});
```

## Explaination

The provided code is a demonstration of Node.js's child process module to create a separate process that will read a file. It's separated into two parts:

1. The first part is creating a new process and executing a Node.js script named `readStream`.

2. The second part is the `readStream` script which reads a file named `lorum-ipsum.md` in the `assets` directory.

Here's a more detailed breakdown:

**Part 1:**

1. `const cp = require("child_process");`: This line imports the built-in `child_process` module, which provides functions to create and manage child processes.

2. `console.log("I am creating a new process that will read a file")`: This line prints a message to the console to inform the user that a new child process is about to be created.

3. `cp.exec("node readStream", (err, data, stderr) => {...`: This line uses the `exec` method to create a child process that executes the command `node readStream`. The command is meant to run a Node.js script named `readStream`. The second argument is a callback function that will be called when the child process terminates. The callback function will receive any error that occurred, the data printed by the child process to its standard output, and any data printed to its standard error.

4. `console.log("Done.")`: This line prints "Done." to the console when the parent script has done all of its synchronous work. This does not mean that the child process has finished executing.

**Part 2:**

1. `const fs = require("fs");`: This line imports the built-in `fs` (file system) module, which provides functions for interacting with the file system.

2. `const readStream = fs.createReadStream("./assets/lorum-ipsum.md", "UTF-8");`: This line creates a readable stream from a file named `lorum-ipsum.md` in the `assets` directory. `UTF-8` is the character encoding used for reading the file.

3. The `readStream.on("data", data => {...` and `readStream.once("data", data => {...` lines set up event handlers for the `data` event. The `data` event is emitted whenever a chunk of the file's data has been read. The handlers print the chunk's length to the console and add the chunk to `fileTxt`.

4. The `readStream.on("end", () => {...` line sets up an event handler for the `end` event. The `end` event is emitted when the entire file has been read. The handler prints a message and the total length of the read data to the console.

## Run

- Run

```bash
node exec.js
I am creating a new process that will read a file
Done.
type something...
I read 279 characters of text
# Lorem ipsum

Lorem ipsum dolor sit amet, te mutat democritum vix, eum ad fugit labores adversarium. Principes comprehensam ex eum, in sint debitis sed. Est ea mucius semper dissentiet. Mei eu prima rebum illum, est justo dicam et. Eu persius corpora eum. Tale diam nulla no his.
finished reading file
In total I read 279 characters of text
```
