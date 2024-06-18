# Core Modules

## Code

```javascript
const path = require("path");
const { log } = require("util");
const { getHeapStatistics } = require("v8");

console.log(path.basename(__filename))
log(getHeapStatistics());
```

## Explaination

Certainly! Let's break down the code and explain each part in detail:

1. `const path = require("path");`:
   - This line imports the Node.js built-in module `path` using the `require` function.
   - The `path` module provides utilities for working with file paths.

2. `const { log } = require("util");`:
   - This line imports the `log` function from the Node.js built-in module `util` using destructuring assignment and the `require` function.
   - The `log` function is a utility function for logging messages to the console.

3. `const { getHeapStatistics } = require("v8");`:
   - This line imports the `getHeapStatistics` function from the Node.js built-in module `v8` using destructuring assignment and the `require` function.
   - The `getHeapStatistics` function provides statistics about the V8 JavaScript engine's heap memory usage.

4. `console.log(path.basename(__filename));`:
   - This line logs the base name of the current file (`__filename`) using the `console.log` function.
   - The `path.basename` function is used to extract the file name from the full path.

5. `log(getHeapStatistics());`:
   - This line calls the `log` function from the `util` module to log the result of calling `getHeapStatistics()` to the console.
   - The `getHeapStatistics` function returns an object containing statistics about the V8 heap memory usage.

In summary, this code imports three Node.js built-in modules: `path`, `util`, and `v8`. It then demonstrates the usage of these modules by logging the base name of the current file and printing statistics about the V8 heap memory usage. The `path` module helps with file path manipulation, the `util` module provides utility functions for logging, and the `v8` module provides access to V8 engine-related features.

## Run

- Run

```bash
node core.js
core.js
10 Dec 18:09:54 - {
  total_heap_size: 4833280,
  total_heap_size_executable: 524288,
  total_physical_size: 3697920,
  total_available_size: 4342187544,
  used_heap_size: 4018416,
  heap_size_limit: 4345298944,
  malloced_memory: 254120,
  peak_malloced_memory: 90624,
  does_zap_garbage: 0,
  number_of_native_contexts: 1,
  number_of_detached_contexts: 0
}
```
