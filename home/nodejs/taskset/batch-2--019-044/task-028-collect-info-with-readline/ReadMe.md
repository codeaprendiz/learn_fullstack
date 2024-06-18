# Collect info with readline

## Code

```javascript
const readline = require("readline");

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

rl.question("How do you like Node? ", (answer) => {
  console.log(`Your answer: ${answer}`);
});
```

## Explaination

The provided code snippet is a simple Node.js program that uses the `readline` module to interact with the user via the console.

Let's go through the code step by step:

1. **`const readline = require("readline");`**: This line imports the `readline` module, which is a core Node.js module used for reading data from a Readable stream (like `process.stdin`) one line at a time.

2. **`const rl = readline.createInterface({...})`**: The `readline.createInterface` method is used to create a new `readline.Interface` instance. This instance is configured to take input from `process.stdin` (standard input, typically the keyboard) and output to `process.stdout` (standard output, typically the console).

3. **`rl.question("How do you like Node? ", answer => {...})`**: The `rl.question` method is used to prompt the user with a question ("How do you like Node?"). The program waits for the user to provide an input and press Enter. Once they do that, a callback function is invoked with the input provided by the user. In this case, the callback function takes the user's input (represented by the `answer` parameter), and logs a message to the console with their answer.

4. **`console.log(`Your answer: ${answer}`);`**: This line uses the `console.log` method to print the message "Your answer: " followed by the user's input to the console. The `${answer}` is a JavaScript template literal syntax which allows embedding expressions within string literals. Here, it is used to embed the user's input in the string that's printed to the console.

The program will keep running until it is explicitly stopped or until the `readline.Interface` instance is closed. Since there's no code to close the interface in this snippet, you would have to manually stop the program (e.g., by pressing `Ctrl+C`).

### how does rl which is an object of readline.createInterface has a method question() ? I never created it?

The `readline.createInterface()` function is a part of the Node.js `readline` module. This function creates an instance of the `readline.Interface` class. The `readline.Interface` class provides several methods for receiving and writing lines of text in Node.js, one of which is the `question()` method.

When you call `readline.createInterface()`, the returned object (in your case, `rl`) is an instance of `readline.Interface`. This object has access to the methods defined in the `readline.Interface` class, including the `question()` method.

It's similar to how, in object-oriented programming, objects of a certain class have access to methods defined by that class. You didn't have to define the `question()` method yourself because it's already defined as a part of the `readline.Interface` class.

This is a common pattern in Node.js, where you create an object by calling a function (like `readline.createInterface()`) and then use the methods of the returned object (like `rl.question()`). The function effectively acts as a constructor, setting up the object and its methods for you.

### I see, why exactly I had to provide the following snippet? while creating interface?

```javascript
{
  input: process.stdin,
  output: process.stdout
}
```

The object `{input: process.stdin, output: process.stdout}` passed to `readline.createInterface()` is a configuration object that sets up the basic settings for the readline interface.

- `input: process.stdin`: This sets the input stream for the readline interface. `process.stdin` is a standard input stream, which is used to read data input from the user via the console (typically, the keyboard). `readline` will listen for 'data' events on this stream to capture the input from the user.

- `output: process.stdout`: This sets the output stream for the readline interface. `process.stdout` is a standard output stream, which is used to print data out to the console. `readline` will use this stream to output prompts and data to the user.

In this way, `readline` can provide an interactive command line interface between the user and your Node.js application. You can ask questions, get responses, and print data all through the console.

### Give me other possible values for this which I could have used

In the Node.js `readline.createInterface()` function, `input` and `output` are expected to be instances of `stream.Readable` and `stream.Writable`, respectively. Here are a few possibilities:

- **`process.stdin` and `process.stdout`**: These are the most commonly used options. As discussed, they represent the standard input and output streams, allowing interaction with the console.

- **File Streams**: If you're working with file input and output instead of user input and output, you can use `fs.createReadStream()` for `input` and `fs.createWriteStream()` for `output`. For example:

```javascript
const fs = require('fs');
const readline = require('readline');

const rl = readline.createInterface({
  input: fs.createReadStream('input.txt'),
  output: fs.createWriteStream('output.txt')
});
```

    In this case, the `readline` interface will read lines from `input.txt` and write lines to `output.txt`.

- **Network Streams**: You can also use a network stream as your `input` and/or `output`. For example, if you've created a server with the `net` module, you could use the socket as the `input` and `output`:

```javascript
const net = require('net');
const readline = require('readline');

const server = net.createServer(socket => {
  const rl = readline.createInterface({
    input: socket,
    output: socket
  });
  // Now you can use rl.question() etc. with this client
});

server.listen(1337);
```

In this case, the `readline` interface will read lines from and write lines to the network socket.

These are a few possibilities, but in theory, you could use any readable stream for `input` and any writable stream for `output`.

## Run

- Run

```bash
node ask.js 
How do you like Node? very much
Your answer: very much

```
