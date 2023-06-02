# Async tasks and Callbacks

## Environment

```bash
$ showenv               
node: v19.8.0
npm: 9.5.1
yarn: 1.22.19
```

## sync-demo.js

```javascript
fs = require('fs');

data = fs.readdirSync('./');

console.log('data: ', data);

console.log('This comes after. Example of sync demo')
```

simple Node.js script that uses the `fs` (file system) module to read the contents of the current directory and then print them to the console. Let's break it down:

1. `fs = require('fs');`: This line imports the built-in Node.js `fs` module, which provides an API for interacting with the file system.

2. `data = fs.readdirSync('./');`: The `readdirSync` function is a method from the `fs` module that reads the contents of a directory. The function is synchronous, which means it blocks the execution of further code until it has completed. The `'./'` argument is a path to the directory you want to read; in this case, it's the current directory (represented by `'./'`). The function returns an array of filenames in the directory, which is assigned to the `data` variable.

3. `console.log('data: ', data);`: This line prints a string `'data: '` followed by the content of the `data` variable to the console. If the current directory contained the files `file1.txt` and `file2.txt`, the output might look like: `data:  [ 'file1.txt', 'file2.txt' ]`.

4. `console.log('This comes after. Example of sync demo')`: This line simply prints a string to the console. It will always execute after the previous `console.log` statement because `fs.readdirSync` is a synchronous function and Node.js is single-threaded. This means that the JavaScript engine will wait for `fs.readdirSync` to finish before moving to the next line of code.

So, in short, this script synchronously reads and logs the contents of the current directory and then logs a follow-up message. The key takeaway is that Node.js will not execute further code until a synchronous operation (like `fs.readdirSync`) has completed.

```bash
$ node sync-demo.js 
data:  [ 'ReadMe.md', 'async-demo.js', 'sync-demo.js' ]
This comes after. Example of sync demo
```

## async-demo.js

```javascript
fs = require('fs');

function phoneNumber(err, data) {
    if (err) {
    console.log('An error occurred: ', err);
    return;
    }
    console.log('data: ', data);
}

fs.readdir('./',phoneNumber);

console.log("This will come before. Example of async.")
```

This is a simple Node.js script that uses the `fs` (filesystem) module to read the contents of the current directory asynchronously.

Here's a line-by-line explanation:

1. `fs = require('fs');` - This line is importing Node.js's built-in filesystem module and assigning it to the variable `fs`. This module allows you to interact with the file system on your computer.

2. `function phoneNumber(err, data) {...}` - This is a callback function that takes two parameters: `err` and `data`. This function will be passed to `fs.readdir` and invoked once `fs.readdir` completes its operation. If there's an error in the operation, `err` will contain the error object, otherwise it will be null. `data` will contain the result of the operation.

3. `console.log('data: ', data);` - Inside the callback function, this line is logging the `data` to the console. If `fs.readdir` completes successfully, `data` will be an array of filenames in the directory.

4. `fs.readdir('./',phoneNumber);` - This line is calling the `readdir` method of the `fs` module, which reads the contents of a directory. In this case, it's reading the current directory (`'./'`). `readdir` is asynchronous, meaning it returns immediately and does not wait for the file reading operation to complete. The second argument is the callback function (`phoneNumber`) that will be invoked once the operation is completed.

5. `console.log("This will come before. Example of async.")` - This line demonstrates the asynchronous nature of `fs.readdir`. Even though it's written after the `fs.readdir` call in the code, this line will be logged to the console before the contents of the directory. This is because `fs.readdir` does not block the execution of subsequent code while it's performing its operation. Instead, it starts the operation and then immediately hands control back to the program, which continues executing the next lines of code. Once the operation is done, Node.js calls the callback function.

In conclusion, this script prints the statement "This will come before. Example of async." to the console, starts reading the contents of the current directory, and then, once the reading operation is completed, prints "data: " followed by an array of filenames in the directory.
  
```bash
$ node async-demo.js 
This will come before. Example of async.
data:  [ 'ReadMe.md', 'async-demo.js', 'sync-demo.js' ]
```
