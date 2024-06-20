# Static Serving Express

## Code

```javascript
var express = require('express')
var app = express()

app.use(express.static(__dirname))
var server = app.listen(3000, () => {
    console.log('server is listening on port', server.address().port)
})
```

## Explaination

The given Node.js code sets up a basic Express server. Here's a breakdown of what it does:

1. It imports the `express` module, which is a popular framework for building web applications in Node.js.

2. It creates an instance of the Express application and assigns it to the variable `app`.

3. The line `app.use(express.static(__dirname))` configures the application to serve static files from the current directory (`__dirname` refers to the directory in which the script is located). This means that any files in the current directory can be accessed by the client directly through the server.

4. The code then calls the `listen()` method on the `app` object to start the server. It listens on port 3000 for incoming HTTP requests.

5. The callback function `( ) => { ... }` is executed when the server starts listening. Inside the callback function, it logs the message `'server is listening on port'` followed by the actual port number obtained from `server.address().port`.

6. The output will be `'server is listening on port [port number]'` indicating that the server is running and ready to accept incoming requests on the specified port.

In summary, this code sets up a basic Express server that serves static files from the current directory and listens on port 3000. It provides a simple way to serve files or build a web application using the Express framework.

## Running

- Create the package.json file first

```bash
$ npm init --yes
Wrote to ~/workspace/devops-essentials-prv/languages/nodejs/task-008-static-serving-express/package.json:

{
  "name": "05_01",
  "version": "1.0.0",
  "main": "server.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1",
    "start": "node server.js"
  },
  "keywords": [],
  "author": "",
  "license": "ISC",
  "dependencies": {
    "express": "^4.15.5"
  },
  "description": ""
}
```

- Install and save to package.json file

```bash
$ npm install -s express
.
```

- Start the app

```bash
nodemon server.js 
[nodemon] 2.0.13
[nodemon] to restart at any time, enter `rs`
[nodemon] watching path(s): *.*
[nodemon] watching extensions: js,mjs,json
[nodemon] starting `node server.js`
server is listening on port 3000

```

- Give curl request

```bash
curl http://localhost:3000
hello
```

- Opening in the brower

![img](.images/image-2023-05-13-15-04-41.png)
