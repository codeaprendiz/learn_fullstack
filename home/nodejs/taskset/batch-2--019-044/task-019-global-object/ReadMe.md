# Global Objects

- [Globals](https://nodejs.org/api/globals.html)

These objects are available in all modules

## Env

```bash
$ showenv
node: v19.8.0
npm: 9.5.1
yarn: 1.22.19
```

## Code

- global.js

```javascript
console.log("Hello world");
```

- Run

```bash
$ node global.js
Hello world

$ node global
Hello world
```

- global.js

```javascript
let hello = "hello world from node js";
let justNode = hello.slice(17);
console.log(hello);
console.log(justNode);
console.log(`Rock on World from ${justNode}`);
```

- Run

```bash
$ node global.js
hello world from node js
node js
Rock on World from node js
```

## Explaination

Here are a few more examples of global objects in Node.js:

1. `console`:
   The `console` object provides methods to write data to the console. It is globally accessible and can be used in any module without requiring an explicit import.

```javascript
console.log('Hello, world!');
console.error('An error occurred.');
   ```

2. `setTimeout` and `setInterval`:
   The `setTimeout` and `setInterval` functions are used to schedule the execution of code after a specified delay. They are available globally and can be used in any module.

```javascript
setTimeout(() => {
    console.log('Delayed message');
}, 1000);

setInterval(() => {
    console.log('Repeated message');
}, 2000);
```

3. `process`:
   The `process` object provides information and control over the current Node.js process. It offers properties like `argv` (command-line arguments), `env` (environment variables), and methods like `exit()` (terminates the process).

```javascript
console.log(process.argv);
console.log(process.env.NODE_ENV);

process.exit(0);
```

4. `Buffer`:
   The `Buffer` class provides a way to work with binary data in Node.js. It is globally accessible and does not require an explicit import.

```javascript
const buf = Buffer.from('Hello', 'utf8');
console.log(buf.toString('hex'));
```

These are just a few examples of the global objects in Node.js. There are many more available, including `require()` (for importing modules), `global` (the global namespace object), and built-in JavaScript objects like `String`, `Array`, `Math`, etc.


## More code

```javascript
for (let key in global) {
    console.log(key);
}
```

- Running we get

```bash
global
queueMicrotask
clearImmediate
setImmediate
structuredClone
clearInterval
clearTimeout
setInterval
setTimeout
atob
btoa
performance
fetch
crypto
```

The provided code iterates over all the properties of the `global` object in Node.js and logs each property key to the console.

In Node.js, the `global` object represents the global scope, similar to the `window` object in a browser environment. It provides access to various globally available objects, functions, and variables.

The `for...in` loop is used to iterate over the properties of an object. In this case, it iterates over the properties of the `global` object. For each property, the loop logs the property key to the console using `console.log(key)`.

By running this code, you will see a list of property keys that are part of the `global` object. These keys represent various built-in objects, functions, and variables provided by Node.js. Some common examples of property keys in the `global` object include `require`, `module`, `console`, `process`, `setTimeout`, and `setInterval`, among others.

Note that the `global` object should be used with caution, as modifying or overriding its properties can have unintended consequences and may not follow best practices in modular programming.