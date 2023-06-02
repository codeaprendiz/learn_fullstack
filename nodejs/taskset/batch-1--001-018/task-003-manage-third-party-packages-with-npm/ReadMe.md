# Manage third party packages with npm

## Environment

```bash
$ showenv               
node: v19.8.0
npm: 9.5.1
yarn: 1.22.19
```

## Code

- Check the files

```bash
$ ls
ReadMe.md demo.js
```

- Install lodash

```bash
npm install lodash  
added 1 package, and audited 2 packages in 2s
found 0 vulnerabilities
```

- Check the files again

```bash
$ ls
ReadMe.md         demo.js           node_modules      package-lock.json package.json
```

- js code

```javascript
var _ = require('lodash')

console.log(_.random(1,10))
```

Here's what's happening in the code:

1. The `require` function is a built-in function in Node.js used to import modules. In this case, it's importing the `lodash` module and assigning it to the variable `_`. Lodash is a powerful utility library that provides helpful methods for manipulation and combination of arrays, objects, and other data types.

2. `_.random(1,10)` is a function provided by lodash. The `_.random()` function generates a random number within the range provided. The two arguments (`1` and `10`) define the range within which the random number is to be generated. In this case, it will generate a random number between 1 and 10 (inclusive).

3. `console.log(_.random(1,10))` will print the randomly generated number to the console.

So in summary, this code is using the lodash library to generate a random number between 1 and 10 and then printing that number to the console.

- Now we run the code

```bash
$ node demo.js
2
$ node demo.js
10
```

- To install a package globally

```bash
sudo npm install -g nodemon                   

added 116 packages, changed 1 package, and audited 118 packages in 5s

15 packages are looking for funding
  run `npm fund` for details

found 0 vulnerabilities
```

- So now you can create a `package.json` file to list all the packages you depend on. So when you use `npm command install` it will go
  through that list automatically and install all those packages.
