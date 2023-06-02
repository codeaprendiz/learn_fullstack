# Rename and remove directories

## Code

```javascript
const fs = require("fs");

fs.renameSync("./assets/colors.json", "./assets/colorData.json");

fs.rename("./assets/notes.md", "./storage-files/notes.md", (err) => {
  if (err) {
    throw err;
  }
});

setTimeout(() => {
  fs.unlinkSync("./assets/alex.jpg");
}, 4000);
```

## Explaination

The code snippet you posted demonstrates different operations on files in Node.js using the File System (`fs`) module. Let's break it down:

1. `const fs = require("fs");`: This line imports the built-in `fs` module, which provides an API for interacting with the file system in Node.js.

2. `fs.renameSync("./assets/colors.json", "./assets/colorData.json");`: This line synchronously renames the file `colors.json` to `colorData.json` in the `assets` directory. `fs.renameSync` is a synchronous operation, which means it will block the execution of further code until it is completed.

3. `fs.rename("./assets/notes.md", "./storage-files/notes.md", (err) => {...});`: This line asynchronously renames (or moves) the file `notes.md` from the `assets` directory to the `storage-files` directory. `fs.rename` is an asynchronous operation, which means the execution of further code won't be blocked. If an error occurs during the operation, it will call the provided callback function with an `err` object.

4. `setTimeout(() => {fs.unlinkSync("./assets/alex.jpg");}, 4000);`: The `setTimeout` function is used to schedule the execution of a function after a specific number of milliseconds. In this case, it is scheduled to execute after 4000 milliseconds (4 seconds). The function being scheduled uses `fs.unlinkSync` to synchronously delete the `alex.jpg` file in the `assets` directory. `fs.unlinkSync` will block the execution of further code until the file is deleted.

In summary, this code is demonstrating the use of both synchronous (with 'Sync' suffix) and asynchronous operations in the Node.js File System module, including renaming/moving files and deleting a file.

## Run

- Before

```bash
ls assets storage-files 
assets:
colors.json notes.md

storage-files:
colors.md
```

- Run as alex.jpg file is not present.

```bash
node rename.js 
node:internal/fs/utils:344
    throw err;
    ^

Error: ENOENT: no such file or directory, unlink './assets/alex.jpg'
    at Object.unlinkSync (node:fs:1718:3)
    at Timeout._onTimeout (/Users/admin/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-039-rename-and-remove-directories/rename.js:12:6)
    at listOnTimeout (node:internal/timers:557:17)
    at processTimers (node:internal/timers:500:7) {
  errno: -2,
  syscall: 'unlink',
  code: 'ENOENT',
  path: './assets/alex.jpg'
}
```

- After

```bash
ls assets storage-files 
assets:
colorData.json

storage-files:
colors.md notes.md
```
