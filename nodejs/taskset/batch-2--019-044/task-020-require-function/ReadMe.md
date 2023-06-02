# Require Function

## Code

```javascript
const path = require("path");

console.log(__dirname);
console.log(__filename);
console.log(`The file name is ${path.basename(__filename)}`);
```

- Run

```bash
$ node require.js
/home/runner/taskset/batch-2--019-044/task-020-require-function
/home/runner/taskset/batch-2--019-044/task-020-require-function/require.js
The file name is require.js
```

## Explaination

In Node.js, the `require()` function is used to load and import modules into your code. It allows you to access functionality defined in other files or modules. The `require()` function takes the path of the module as an argument and returns the exported functionality from that module.

Let's break down the code you provided:

```javascript
const path = require("path");
```

In this line, the `require("path")` statement imports the built-in Node.js module called `path`. The `path` module provides utilities for working with file paths. Once imported, the `path` object becomes available in the current module, and you can use its methods and properties.

```javascript
console.log(__dirname);
console.log(__filename);
```

Here, `__dirname` and `__filename` are global variables provided by Node.js. They represent the directory name and the full path of the current module file, respectively. By printing their values to the console, you can see the directory and filename associated with the current module.

```javascript
console.log(`The file name is ${path.basename(__filename)}`);
```

In this line, the `path.basename()` function is used to extract the base filename from the full `__filename` path. It removes the directory path and returns only the filename part. The result is then interpolated within the string using template literals (`${}`) and printed to the console.

Overall, the code demonstrates how to use the `require()` function to import the `path` module, access the global variables `__dirname` and `__filename`, and utilize the `path.basename()` method to extract the base filename.
