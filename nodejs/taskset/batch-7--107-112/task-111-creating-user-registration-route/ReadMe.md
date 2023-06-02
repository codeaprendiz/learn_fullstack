- Run

```bash
$ npx mocha test/server/routes/users/index.registration.test.js
Avatars ignored


  The /users/registration route
(node:16420) [MONGODB DRIVER] Warning: Current Server Discovery and Monitoring engine is deprecated, and will be removed in a future version. To use the new Server Discover and Monitoring engine, pass option { useUnifiedTopology: true } to the MongoClient constructor.
(Use `node --trace-warnings ...` to show where the warning was created)
(node:16420) DeprecationWarning: collection.ensureIndex is deprecated. Use createIndexes instead.
    ✓ should return an error 500 with empty request (234ms)
(node:16420) [DEP0066] DeprecationWarning: OutgoingMessage.prototype._headers is deprecated
    ✓ should show a success message after succesful registration (338ms)


  2 passing (637ms
```