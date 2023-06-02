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
(node:66710) ExperimentalWarning: Importing JSON modules is an experimental feature. This feature could change at any time
(Use `node --trace-warnings ...` to show where the warning was created)
The server is listening on port 3000
{ id: '3' }
{ id: '30' }
```

- Run

```bash
$ curl -X GET "localhost:3000/class/3"
[{"id":3,"first_name":"Valdemar","last_name":"Westell","email":"vwestell2@geocities.jp"}]

$ curl -X GET "localhost:3000/class/30"
[]
```