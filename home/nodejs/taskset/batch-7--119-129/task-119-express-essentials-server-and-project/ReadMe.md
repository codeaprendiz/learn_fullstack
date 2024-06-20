- Init


```bash
$ npm init
This utility will walk you through creating a package.json file.
It only covers the most common items, and tries to guess sensible defaults.

See `npm help init` for definitive documentation on these fields
and exactly what they do.

Use `npm install <pkg>` afterwards to install a package and
save it as a dependency in the package.json file.

Press ^C at any time to quit.
package name: (express-essentials) 
version: (1.0.0) 
description: 
entry point: (index.js) 
test command: 
git repository: 
keywords: 
author: Ankit
license: (ISC) 
About to write to /Users/ankitsinghrathi/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-096-express-essentials-server-and-project/express-essentials/package.json:

{
  "name": "express-essentials",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "author": "Ankit",
  "license": "ISC"
}


Is this OK? (yes) yes
```

- Install dev dependencies

```bash
$ npm install --save-dev @babel/core @babel/cli @babel/preset-env @babel/node

```

- Install dependencies

```bash
$ npm install express nodemon                                                
```

- Run 

```bash
$ npm start

> express-essentials@1.0.0 start
> nodemon --experimental-json-modules --exec babel-node index.js

[nodemon] 2.0.16
[nodemon] to restart at any time, enter `rs`
[nodemon] watching path(s): *.*
[nodemon] watching extensions: js,mjs,json
[nodemon] starting `babel-node --experimental-json-modules index.js`
The server is listening on port 3000
```