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
(node:68453) ExperimentalWarning: Importing JSON modules is an experimental feature. This feature could change at any time
(Use `node --trace-warnings ...` to show where the warning was created)
The server is listening on port 3000
response will be sent by next handler function
```

- Run

```bash
$ curl -X GET "localhost:3000/next"
this is the next handler function
```