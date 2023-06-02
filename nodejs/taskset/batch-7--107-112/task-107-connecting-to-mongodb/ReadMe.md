- Install

```bash
$ yarn install       
```

- Run tests 

```bash
$ npx mocha test/db/connect.js


  The DSN
    ✓ should be configured for development
    ✓ should be configured for production
    ✓ should be configured for testing

  The database
(node:7582) [MONGODB DRIVER] Warning: Current Server Discovery and Monitoring engine is deprecated, and will be removed in a future version. To use the new Server Discover and Monitoring engine, pass option { useUnifiedTopology: true } to the MongoClient constructor.
(Use `node --trace-warnings ...` to show where the warning was created)
    ✓ development should be reachable
    ✓ test should be reachable
    ✓ production should be reachable


  6 passing (42ms)

```