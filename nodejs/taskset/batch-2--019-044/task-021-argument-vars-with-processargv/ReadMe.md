# Handling Arguments with process.argv

## Code

```javascript
const grab = (flag) => {
  let indexAfterFlag = process.argv.indexOf(flag) + 1;
  return process.argv[indexAfterFlag];
};

console.log(process.versions.node);
console.log(process.pid);
console.log(process.argv)

const greeting = grab("--greeting");
const user = grab("--user");

console.log(`${greeting} ${user}`);
```

## Explaination

The provided code demonstrates the usage of the `process` object in Node.js to access command-line arguments and other process-related information.

1. The `grab` function takes a `flag` argument and retrieves the value provided after that flag in the command-line arguments. It uses the `process.argv` array to access the command-line arguments. The `indexOf` method is used to find the index of the specified `flag`, and then `+ 1` is added to get the index of the value after the flag. The function returns that value.

2. `console.log(process.versions.node);` prints the version of Node.js that is currently running.

3. `console.log(process.pid);` prints the process ID (PID) of the current Node.js process.

4. `console.log(process.argv);` prints the array of command-line arguments passed to the Node.js process. The `process.argv` array contains the full command-line argument list, with the first element being the path to the Node.js executable and the second element being the path to the script file being executed.

5. The `greeting` variable is assigned the value of the command-line argument following the `--greeting` flag, using the `grab` function.

6. The `user` variable is assigned the value of the command-line argument following the `--user` flag, using the `grab` function.

7. Finally, `console.log(`${greeting} ${user}`);` prints the concatenated value of the `greeting` and `user` variables, resulting in a custom greeting message based on the provided command-line arguments.

By running this script with additional command-line arguments like `--greeting Hello --user John`, it will output "Hello John" based on the provided values for the `--greeting` and `--user` flags.

## Run

- Run

```bash
$ node globalProcess.js
16.11.1
55105

$ node globalProcess.js --greeting ankit --user rathi
16.11.1
55151
ankit rathi


$ node globalProcess.js --greeting ankit --user rathi
16.11.1
55363
[
  '/usr/local/bin/node',
  '/Users/admin/Ankit/workspace/devops-essentials-prv/languages/nodejs/task-021-argument-vars-with-argv/globalProcess.js',
  '--greeting',
  'ankit',
  '--user',
  'rathi'
]
ankit rathi
```
