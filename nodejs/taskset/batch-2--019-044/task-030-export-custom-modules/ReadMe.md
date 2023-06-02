# Export custom modules

## Code

- myModule.js

```javascript
let count = 0;

const inc = () => ++count;
const dec = () => --count;

const getCount = () => count;

module.exports = {
  inc,
  dec,
  getCount
};
```

- app.js

```javascript
const { inc, dec, getCount } = require("./myModule");
const count = require("./myModule")

inc();
inc();
inc();
dec();
count.dec();

console.log(getCount());
```

## Explaination

This is a simple Node.js program split into two parts. The first part exports a module that allows you to increment, decrement, and retrieve a count variable. The second part imports and uses this module.

Here is an explanation of the different parts:

1. **First part** - Defines and exports a module:

    - `let count = 0;` - This line creates a variable `count` and initializes it to 0. This will be the variable that gets incremented and decremented.

    - `const inc = () => ++count;` - This line defines a function `inc` that increments `count` by 1 when called.

    - `const dec = () => --count;` - This line defines a function `dec` that decrements `count` by 1 when called.

    - `const getCount = () => count;` - This line defines a function `getCount` that returns the current value of `count` when called.

    - `module.exports = {...}` - This line exports the `inc`, `dec`, and `getCount` functions so they can be imported and used in other files.

2. **Second part** - Imports and uses the module:

    - `const { inc, dec, getCount } = require("./myModule");` - This line imports the `inc`, `dec`, and `getCount` functions from the module defined in `myModule.js` (assuming the first part of the code is saved in a file named `myModule.js`).

    - `const count = require("./myModule")` - This line imports the whole module from `myModule.js` and stores it in a variable named `count`. This is a bit confusing, as `count` was also the name of the variable in `myModule.js`. Here, `count` is an object that contains the `inc`, `dec`, and `getCount` functions.

    - `inc(); inc(); inc();` - These lines call the `inc` function three times, incrementing the `count` variable in `myModule.js` to 3.

    - `dec();` - This line calls the `dec` function once, decrementing the `count` variable in `myModule.js` to 2.

    - `count.dec();` - This line also calls the `dec` function once, but it uses the `dec` function from the `count` object. This decrements the `count` variable in `myModule.js` to 1.

    - `console.log(getCount());` - This line calls the `getCount` function and logs the returned value (which is the current value of the `count` variable in `myModule.js`) to the console. It should print `1`.

This code demonstrates how you can create a simple module in Node.js, export functions from it, and then import and use those functions in another file.

## Run

- Run

```bash
node app.js
2
```
