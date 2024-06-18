- Install

```bash
$ npm install        
npm WARN deprecated fsevents@2.1.3: "Please update to latest v2.3 or v2.2"
npm WARN deprecated debug@4.2.0: Debug versions >=3.2.0 <3.2.7 || >=4 <4.3.1 have a low-severity ReDos regression when used in a Node.js environment. It is recommended you upgrade to 3.2.7 or 4.3.1. (https://github.com/visionmedia/debug/issues/797)
npm WARN deprecated debug@4.2.0: Debug versions >=3.2.0 <3.2.7 || >=4 <4.3.1 have a low-severity ReDos regression when used in a Node.js environment. It is recommended you upgrade to 3.2.7 or 4.3.1. (https://github.com/visionmedia/debug/issues/797)
npm WARN deprecated debug@3.2.6: Debug versions >=3.2.0 <3.2.7 || >=4 <4.3.1 have a low-severity ReDos regression when used in a Node.js environment. It is recommended you upgrade to 3.2.7 or 4.3.1. (https://github.com/visionmedia/debug/issues/797)

added 441 packages, and audited 442 packages in 4s

41 packages are looking for funding
  run `npm fund` for details

found 0 vulnerabilities

$ npm install ioredis

added 10 packages, and audited 452 packages in 3s

42 packages are looking for funding
  run `npm fund` for details

found 0 vulnerabilities

```


- Run

```bash
$ npm run dev

> shopper@0.0.0 dev
> nodemon ./server/bin/start

[nodemon] 2.0.4
[nodemon] to restart at any time, enter `rs`
[nodemon] watching path(s): *.*
[nodemon] watching extensions: js,mjs,json
[nodemon] starting `node ./server/bin/start.js`
Successfully connected to Redis
Successfully connected to MongoDB
shopper listening on port 3000
```