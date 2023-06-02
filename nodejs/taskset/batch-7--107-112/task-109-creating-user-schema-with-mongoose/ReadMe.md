- Start

```bash
$ npx mocha test/server/models/UserModel.test.js 
Avatars ignored


  The mongoose schema
(node:11024) [MONGODB DRIVER] Warning: Current Server Discovery and Monitoring engine is deprecated, and will be removed in a future version. To use the new Server Discover and Monitoring engine, pass option { useUnifiedTopology: true } to the MongoClient constructor.
(Use `node --trace-warnings ...` to show where the warning was created)
(node:11024) DeprecationWarning: collection.ensureIndex is deprecated. Use createIndexes instead.
    ✓ should let you create a new user with valid data
    ✓ should reject a too short username
    ✓ should reject a too short password
    ✓ should reject an invalid email format
    ✓ should find a user


  5 passing (86ms)
```