# Wriging to files

## Code

```javascript
var fs = require('fs')

var data = {
    name: 'Bob'
}

fs.writeFile('data.json', JSON.stringify(data), (err) =>{
    console.log('write finished', err)
})
```

## Explaination

The given Node.js code performs the following actions:

1. It imports the built-in `fs` module, which provides functions for working with the file system.

2. It defines an object `data` with a single property `name` set to the value `'Bob'`.

3. It uses the `writeFile()` function from the `fs` module to write the `data` object as a JSON string to a file named `data.json`.

4. The `writeFile()` function takes three parameters: the file path to write, the data to write (as a string or buffer), and a callback function.

5. The callback function `(err) => { ... }` is executed when the writing operation is completed or encounters an error. The callback function receives an error object (`err`) as a parameter.

6. Inside the callback function, it logs the message `'write finished'` along with the value of `err`. If `err` is `null` or `undefined`, it means the write operation was successful. Otherwise, it indicates an error occurred during the writing process.

7. The output will be either `'write finished null'` if the write operation is successful, or `'write finished [error message]'` if there is an error.

Overall, this code creates a file named `data.json` and writes the `data` object as a JSON string to that file. It then logs a message indicating the completion status of the write operation, along with any error encountered.

## Running

- Initially

```bash
ls
ReadMe.md demo.js

```

- After running the program

```bash
$ node demo.js
write finished null

$ ls
ReadMe.md data.json demo.js

$ cat data.json 
{"name":"Bob"}                       
```
