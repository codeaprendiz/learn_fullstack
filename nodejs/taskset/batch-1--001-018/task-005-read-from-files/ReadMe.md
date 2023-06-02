# Read From Files

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
var data = require('./data.json')

console.log(data.name)

fs.readFile('./data.json', 'utf-8', (err,data) => {
    var data = JSON.parse(data)
    console.log(data.name)
})
```

## Explaination

The given Node.js code performs the following actions:

1. It imports the built-in `fs` module, which provides functions for working with the file system.
2. It imports data from the `data.json` file using `require('./data.json')` and assigns it to the variable `data`.
3. It logs the value of the `name` property from the `data` object using `console.log(data.name)`. Next, it reads the contents of the `data.json` file asynchronously using the `fs.readFile()` function.
4. `fs.readFile('./data.json', 'utf-8', (err, data) => { ... })` reads the contents of the `data.json` file using the specified file path and encoding (`utf-8`).
5. The callback function `(err, data) => { ... }` is executed when the file reading is completed or encounters an error.
6. Inside the callback function, `data` parameter holds the contents of the `data.json` file as a string.
7. It parses the `data` string using `JSON.parse(data)` to convert it into a JavaScript object.
8. Finally, it logs the value of the `name` property from the parsed `data` object using `console.log(data.name)`.

Overall, this code imports and reads data from the `data.json` file, then logs the `name` property value from the imported data.

## Running

- Running the program we get 

```bash
nodemon demo.js
[nodemon] 2.0.13
[nodemon] to restart at any time, enter `rs`
[nodemon] watching path(s): *.*
[nodemon] watching extensions: js,mjs,json
[nodemon] starting `node demo.js`
Tim
Tim
[nodemon] clean exit - waiting for changes before restart

```