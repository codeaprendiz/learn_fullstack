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
(node:95383) ExperimentalWarning: Importing JSON modules is an experimental feature. This feature could change at any time
(Use `node --trace-warnings ...` to show where the warning was created)
The server is listening on port 3000
Error
    at file:///Users/ankitsinghrathi/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-106-handling-errors/express-essentials/index.js:14:11
    at Layer.handle [as handle_request] (/Users/ankitsinghrathi/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-106-handling-errors/express-essentials/node_modules/express/lib/router/layer.js:95:5)
    at next (/Users/ankitsinghrathi/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-106-handling-errors/express-essentials/node_modules/express/lib/router/route.js:144:13)
    at Route.dispatch (/Users/ankitsinghrathi/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-106-handling-errors/express-essentials/node_modules/express/lib/router/route.js:114:3)
    at Layer.handle [as handle_request] (/Users/ankitsinghrathi/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-106-handling-errors/express-essentials/node_modules/express/lib/router/layer.js:95:5)
    at /Users/ankitsinghrathi/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-106-handling-errors/express-essentials/node_modules/express/lib/router/index.js:284:15
    at Function.process_params (/Users/ankitsinghrathi/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-106-handling-errors/express-essentials/node_modules/express/lib/router/index.js:346:12)
    at next (/Users/ankitsinghrathi/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-106-handling-errors/express-essentials/node_modules/express/lib/router/index.js:280:10)
    at urlencodedParser (/Users/ankitsinghrathi/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-106-handling-errors/express-essentials/node_modules/body-parser/lib/types/urlencoded.js:91:7)
    at Layer.handle [as handle_request] (/Users/ankitsinghrathi/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-106-handling-errors/express-essentials/node_modules/express/lib/router/layer.js:95:5)

```

- Test commands

```bash
$ curl localhost:3000/error
Something went wrong
```