
# Reading directories

## Environment

```bash
$ showenv               
node: v19.8.0
npm: 9.5.1
yarn: 1.22.19
```

## Code

```javascript
var fs = require('fs')

fs.readdir('./', (err, data) => {
    console.log(data)
})
```

## Explaination

The given Node.js code performs the following actions:

1. It imports the built-in `fs` module, which provides functions for working with the file system.

2. It uses the `readdir()` function from the `fs` module to read the contents of the current directory (`'./'`).

3. The `readdir()` function takes two parameters: the directory path to read and a callback function.

4. The callback function `(err, data) => { ... }` is executed when the directory reading is completed or encounters an error. The callback function receives two parameters: an error object (`err`) and the array of directory entries (`data`).

5. Inside the callback function, it logs the `data` array, which contains the names of the files and directories present in the current directory.

6. The output will be an array of strings representing the names of the files and directories in the current directory.

Overall, this code reads the contents of the current directory and logs the array of directory entries to the console.

## Running

- Running the progream you get

```bash
$ nodemon demo.js
[nodemon] 2.0.13
[nodemon] to restart at any time, enter `rs`
[nodemon] watching path(s): *.*
[nodemon] watching extensions: js,mjs,json
[nodemon] starting `node demo.js`
[ 'ReadMe.md', 'demo.js' ]
[nodemon] clean exit - waiting for changes before restart
```
