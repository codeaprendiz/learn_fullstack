# Custom Events with EventEmitter

## Code

```js
const events = require("events");

const emitter = new events.EventEmitter();

emitter.on("customEvent", (message, user) => {
  console.log(`${user}: ${message}`);
});


console.log("I am listening... go on....")
process.stdin.on("data", data => {
  const input = data.toString().trim();
  if (input === "exit") {
    emitter.emit("customEvent", "Goodbye!", "process");
    process.exit();
  }
  emitter.emit("customEvent", input, "terminal");
});
```

## Explaination

This is a simple Node.js program that uses the built-in `events` module to create an instance of `EventEmitter`. 

An `EventEmitter` is an object that emits named events which cause previously registered listeners to be called. This is an implementation of the observer pattern, a common design pattern for event handling.

Here is a step by step breakdown:

1. The `events` module is imported and an instance of `EventEmitter` named `emitter` is created.

2. A listener is added to `emitter` for an event named `customEvent`. When `customEvent` is triggered, it will execute the given callback function, which logs a message to the console. The listener callback takes two parameters: `message` and `user`.

3. The program logs "I am listening... go on...." to the console.

4. A listener is added to the `process.stdin` (standard input stream). This is where the program starts listening for keyboard input from the user.

5. When the user types something and hits enter, a `data` event is triggered and the provided callback function is executed. This callback function trims the user's input, checks if it is "exit", and if so, triggers the `customEvent` on `emitter` with the message "Goodbye!" and the user "process", then exits the program.

6. If the input isn't "exit", the program emits the `customEvent` with the user's input as the `message` and "terminal" as the `user`. This will cause the listener on `emitter` to be called, logging the user's input to the console.

To sum up, this program is essentially a command line chat interface where the user can type messages which are then logged to the console. If the user types "exit", the program logs "Goodbye!" and exits.

## Run

- Run

```bash
node events.js
I am listening... go on....
Hi
terminal: Hi
Ankit
terminal: Ankit
what
terminal: what
exit
process: Goodbye!
```
