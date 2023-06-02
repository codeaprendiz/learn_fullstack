- Run


```bash
$ yarn start
yarn run v1.22.18
$ nodemon --experimental-json-modules --exec babel-node index.js
[nodemon] 2.0.16
[nodemon] to restart at any time, enter `rs`
[nodemon] watching path(s): *.*
[nodemon] watching extensions: js,mjs,json
[nodemon] starting `babel-node --experimental-json-modules index.js`
(node:93674) ExperimentalWarning: Importing JSON modules is an experimental feature. This feature could change at any time
(Use `node --trace-warnings ...` to show where the warning was created)
The server is listening on port 3000
{ key: 'value' }
{ key: 'value' }
```

- Test

```bash
$ curl --location --request POST 'localhost:3000/item' \
--header 'Content-Type: application/json' \
--data-raw '{
    "key": "value"
}'

{"key":"value"}
```

- Also 

```bash
$ curl --location --request POST 'localhost:3000/item' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'key=value'
{"key":"value"}
```