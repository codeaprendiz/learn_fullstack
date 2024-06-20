# package.json

## Environment

```bash
$ showenv               
node: v19.8.0
npm: 9.5.1
yarn: 1.22.19
```

## Code

- To create a package.json file for your project

```bash
$ ls 
demo.js

$ npm init
This utility will walk you through creating a package.json file.
It only covers the most common items, and tries to guess sensible defaults.

See `npm help init` for definitive documentation on these fields
and exactly what they do.

Use `npm install <pkg>` afterwards to install a package and
save it as a dependency in the package.json file.

Press ^C at any time to quit.
package name: (task-004-package.json) 
version: (1.0.0) 
description: 
entry point: (demo.js) 
test command: 
git repository: 
keywords: 
author: 
license: (ISC) 
About to write to /Users/admin/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-004-package.json/package.json:

{
  "name": "task-004-package.json",
  "version": "1.0.0",
  "description": "- To create a package.json file for your project",
  "main": "demo.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "author": "",
  "license": "ISC"
}


Is this OK? (yes) y

$ ls
ReadMe.md    demo.js      package.json


$ cat package.json 
{
  "name": "task-004-package.json",
  "version": "1.0.0",
  "description": "- To create a package.json file for your project",
  "main": "demo.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "author": "",
  "license": "ISC"
}

```

- But this did not add the dependencies for your project. Let's do npm install and then redo

```bash
$ npm install

up to date, audited 1 package in 212ms

found 0 vulnerabilities


### But this install from package.json
$ ls  
ReadMe.md         demo.js           package-lock.json package.json


$ npm install lodash

added 1 package, and audited 2 packages in 1s

found 0 vulnerabilities

$  ls
ReadMe.md         demo.js           node_modules      package-lock.json package.json

### Now we redo

$ npm init        
This utility will walk you through creating a package.json file.
It only covers the most common items, and tries to guess sensible defaults.

See `npm help init` for definitive documentation on these fields
and exactly what they do.

Use `npm install <pkg>` afterwards to install a package and
save it as a dependency in the package.json file.

Press ^C at any time to quit.
package name: (task-004-package.json) 
version: (1.0.0) 
git repository: 
keywords: 
author: 
license: (ISC) 
About to write to /Users/admin/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-004-package.json/package.json:

{
  "name": "task-004-package.json",
  "version": "1.0.0",
  "description": "- To create a package.json file for your project",
  "main": "demo.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "author": "",
  "license": "ISC",
  "dependencies": {
    "lodash": "^4.17.21"
  },
  "devDependencies": {}
}


Is this OK? (yes) 


```

- This time it installed the dependencies as well
