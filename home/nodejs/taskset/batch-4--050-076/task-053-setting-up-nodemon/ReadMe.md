# Setting up nodemon

- Install Devdependency nodemon

```bash
npm install -D nodemon
.
```

- Set up the scripts

```bash
$ npm run dev           

> website@1.0.0 dev
> nodemon --ignore feedback.json server.js

[nodemon] 2.0.22
[nodemon] to restart at any time, enter `rs`
[nodemon] watching path(s): *.*
[nodemon] watching extensions: js,mjs,json
[nodemon] starting `node server.js`
Server is listening on port 3000 Ready to accept requests!
```
