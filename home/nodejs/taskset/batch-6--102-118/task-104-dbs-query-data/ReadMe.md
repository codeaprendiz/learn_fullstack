- Run


```bash
$ npm start                                                         

> maxcoin@1.0.0 start
> node main.js

Connecting to MongoDB
Inside connect
Successfully connected to MongoDB
mongodb-connect: 150.74ms
Inserting into mongo-db
(node:53260) DeprecationWarning: isConnected is deprecated and will be removed in the next major version
(Use `node --trace-deprecation ...` to show where the warning was created)
mongodb-insert: 979.856ms
Number of documents inserted 1823 into mongodb
Querying MongoDb 
mongodb-find: 69.262ms
disconnecting to MongoDB
mongodb-disconnect: 2.274ms
{ date: '2021-11-08', value: 67544.8733 }
```