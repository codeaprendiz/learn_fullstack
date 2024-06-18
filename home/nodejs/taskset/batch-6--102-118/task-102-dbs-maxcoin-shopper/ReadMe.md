### DBs in Nodejs

- Run


```bash
$ npm install mongodb            

added 20 packages, and audited 21 packages in 6s

3 packages are looking for funding
  run `npm fund` for details

found 0 vulnerabilities
```

- Google `Mongodb Nodejs API` to go to [https://mongodb.github.io/node-mongodb-native](https://mongodb.github.io/node-mongodb-native/)


- Run

```bash
$ npm start

> maxcoin@1.0.0 start
> node main.js

Connecting to MongoDB
Inside connect
Successfully connected to MongoDB
mongodb-connect: 23.145ms
disconnecting to MongoDB
mongodb-disconnect: 1.22ms
undefined
(node:98603) DeprecationWarning: isConnected is deprecated and will be removed in the next major version
(Use `node --trace-deprecation ...` to show where the warning was created)
```


- Wrong Url

```bash
$ npm start

> maxcoin@1.0.0 start
> node main.js

Connecting to MongoDB
Inside connect
MongoServerSelectionError: connect ECONNREFUSED 127.0.0.1:27018
    at Timeout._onTimeout (/Users/ankitsinghrathi/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-079-dbs-maxcoin-shopper/maxcoin/node_modules/mongodb/lib/core/sdam/topology.js:438:30)
    at listOnTimeout (node:internal/timers:559:17)
    at processTimers (node:internal/timers:502:7) {
  reason: TopologyDescription {
    type: 'Single',
    setName: null,
    maxSetVersion: null,
    maxElectionId: null,
    servers: Map(1) { 'localhost:27018' => [ServerDescription] },
    stale: false,
    compatible: true,
    compatibilityError: null,
    logicalSessionTimeoutMinutes: null,
    heartbeatFrequencyMS: 10000,
    localThresholdMS: 15,
    commonWireVersion: null
  }
}
```