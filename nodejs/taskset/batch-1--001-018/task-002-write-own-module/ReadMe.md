# Write your own module

## Environment

```bash
$ showenv               
node: v19.8.0
npm: 9.5.1
yarn: 1.22.19
```

## Code

Here's what's happening:

In Node.js, each JavaScript file is treated as a separate module. The `exports` keyword is used to make properties and methods available outside the module file.

In `my-module.js`, you're creating a property `myText` and setting its value to "hello from module". The `exports.myText` syntax makes this property available to any code that imports this module.

```javascript
// my-module.js
exports.myText = "hello from module";
```

In `module-demo.js`, you're using the `require` keyword to import `my-module.js` (which you referred to as `my-module.js`). The `require` function reads a JavaScript file, executes the file, and then returns the `exports` object. In this case, the `exports` object from `my-module.js` is being assigned to the variable `myModule`.

```javascript
// module-demo.js
var myModule = require('./my-module.js');
```

Finally, you're using `console.log` to print the value of `myModule.myText`. Because `myModule` is the `exports` object from `my-module.js`, and `myText` is a property on that object, `myModule.myText` is "hello from module".

```javascript
console.log(myModule.myText);  // prints: hello from module
```

So, essentially what this code does is it creates a property in one module (`my-module.js`), exports that property, imports it into another module (`module-demo.js`), and then prints it.

```bash
$ node module-demo.js 
hello from module
```
