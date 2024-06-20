- Start

```bash
$ npx mocha test/server/models/UserModel.test.password.js
Avatars ignored


  The mongoose schema
(node:14617) [MONGODB DRIVER] Warning: Current Server Discovery and Monitoring engine is deprecated, and will be removed in a future version. To use the new Server Discover and Monitoring engine, pass option { useUnifiedTopology: true } to the MongoClient constructor.
(Use `node --trace-warnings ...` to show where the warning was created)
(node:14617) DeprecationWarning: collection.ensureIndex is deprecated. Use createIndexes instead.
    ✓ should let you create a new user with valid data (234ms)
    ✓ should store the password encrypted (231ms)
    ✓ should be able to correctly validate a password (647ms)


  3 passing (1s)
```