# Create child process with spawn

## Explaination

This Node.js script is separated into three parts and is about spawning a child process and communicating with it:

1. The first part spawns a child process to run the "questions.js" script and then writes some data to its standard input.

2. The second part is the "questions.js" script, which collects answers to some questions from the standard input.

3. The third part is a module that facilitates the collection of answers by emitting events when a question is asked and an answer is received.

Here's a more detailed explanation:

**Part 1:**

1. `const cp = require("child_process");`: This line imports the built-in `child_process` module.

2. `const questionApp = cp.spawn("node", ["questions.js"]);`: This line creates a new child process to run the "questions.js" script using Node.js.

3. `questionApp.stdin.write("Alex \n"); questionApp.stdin.write("Tahoe \n"); questionApp.stdin.write("Change the world \n");`: These lines write data to the standard input of the child process.

4. `questionApp.stdout.on("data", data => {...`: This line sets up an event handler for the `data` event of the child process's standard output. The handler prints any data received from the child process to the console.

5. `questionApp.on("close", () => {...`: This line sets up an event handler for the `close` event of the child process. The handler prints a message to the console when the child process has exited.

**Part 2:**

1. `const collectAnswers = require("./lib/collectAnswers");`: This line imports a module that facilitates the collection of answers.

2. `const questions = ["What is your name? ", "Where do you live? ", "What are you going to do with node js? "];`: This line defines an array of questions to ask.

3. `const answerEvents = collectAnswers(questions);`: This line starts the process of asking the questions and collecting the answers.

4. `answerEvents.on("complete", answers => {...`: This line sets up an event handler for the `complete` event. The handler prints a message and the collected answers to the console when all answers have been collected.

**Part 3:**

1. `const readline = require("readline"); const { EventEmitter } = require("events");`: These lines import the `readline` and `events` built-in modules. 

2. `const rl = readline.createInterface({ input: process.stdin, output: process.stdout });`: This line creates a `readline` interface for reading data from the standard input and writing data to the standard output.

3. `module.exports = (questions, done = f => f) => {...`: This line exports a function that asks the provided questions and collects the answers. It emits an `ask` event each time a question is asked, an `answer` event each time an answer is received, and a `complete` event when all answers have been collected.

4. `process.nextTick(() => {...`: This line ensures that the first question is asked on the next tick of the Node.js event loop. This allows the caller to set up event handlers after calling the function but before any events are emitted.

## Run

- Run

```bash
node spawn.js
from the question app: What is your name?
from the question app: Where do you live? What are you going to do with node js? Thank you for your answers.
[ 'Alex ', 'Tahoe ', 'Change the world ' ]

questionApp process exited
```
