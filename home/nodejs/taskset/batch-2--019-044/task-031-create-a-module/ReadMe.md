# Create a module

## Code

- questions.js

```javascript
const collectAnswers = require("./lib/collectAnswers");

const questions = [
  "What is your name? ",
];


// collectAnswers(questions);

collectAnswers(questions, answers => {
  console.log("Thank you for your answers. ");
  console.log(answers);
  process.exit();
});
```

- lib/collectAnswers.js

```javascript
const readline = require("readline");
const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

module.exports = (questions, done = f => console.log("using default values")) => {
  // module.exports = (questions, done = () => { console.log("using default values"); }) => {
  const answers = [];
  const [firstQuestion] = questions;

  const questionAnswered = answer => {
    answers.push(answer);
    if (answers.length < questions.length) {
      rl.question(questions[answers.length], questionAnswered);
    } else {
      done(answers);
    }
  };

  rl.question(firstQuestion, questionAnswered);
};
```

## Explaination

This Node.js program uses the "readline" module to read input from the user and process it. Here's a breakdown of what's happening:

1. The code imports the "readline" module and creates an interface that reads from `process.stdin` and writes to `process.stdout`.

2. The main function is exported using `module.exports`. This function takes an array of questions and a `done` callback function. If a callback function is not provided, a default function (`f => console.log("using default values")`) is used. 

3. Inside the exported function, an array `answers` is created to store the user's answers to the questions. The first question from the array is also extracted.

4. A function `questionAnswered` is declared. This function accepts an answer, pushes it to the `answers` array, and then checks if all questions have been answered. If there are still questions left, it uses the `rl.question` method to ask the next question. If all questions have been answered, it calls the `done` function with the `answers` array.

5. The first question is asked using `rl.question`.

6. The `collectAnswers` module is imported in a separate script.

7. A list of questions is defined.

8. The `collectAnswers` function is called with the list of questions and a callback function. The callback function logs the received answers to the console and terminates the process.

When you run the script with Node.js, it will prompt you to answer the questions in the terminal. After you enter each answer, it will either ask the next question or print all the answers you've provided if there are no more questions.

## Run

- Run

```bash
$ node questions.js 
What is your name? Ankit
Thank you for your answers. 
[ 'Ankit' ]
```

## Now let's change the code and try to run it again with default values of callback function

- questions.js

```javascript
const { setMaxIdleHTTPParsers } = require("http");
const collectAnswers = require("./lib/collectAnswers");

const questions = [
  "What is your name? ",
];


collectAnswers(questions);
```

- lib/collectAnswers.js

```javascript
const readline = require("readline");
const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

module.exports = (questions, done = (answers) => { console.log("using default values: ", answers); process.exit() }) => {
  console.log("Inside module.exports");
  const answers = [];
  const [firstQuestion] = questions;

  const questionAnswered = answer => {
    answers.push(answer);
    if (answers.length < questions.length) {
      rl.question(questions[answers.length], questionAnswered);
    } else {
      done(answers);
    }
  };

  rl.question(firstQuestion, questionAnswered);
  console.log("\nEnd of module.exports : ", answers);
};
```

## Explaination

The program you provided is a Node.js program that is designed to ask the user a series of questions via the command line, collect the responses, and then execute a callback function once all of the questions have been answered. 

Let's break it down:

1. The `readline` module is built into Node.js and provides an interface for reading data from a readable stream (like `process.stdin`, which represents the standard input - in this case, the keyboard) one line at a time. 

2. In the module.exports function, you are defining a function that takes an array of `questions` and a `done` function as parameters. If no `done` function is provided when the module is used (which is the case in the script), a default function is used which logs "using default values: " along with the array of answers collected so far, and then exits the process.

3. Inside the exported function, you're creating an array `answers` to hold the user's responses, and then starting the question-asking process with the first question in the `questions` array.

4. `rl.question` is used to pose the next question to the user. When the user types a response and hits enter, the `questionAnswered` function is called with the user's input.

5. `questionAnswered` function adds the answer to the `answers` array, and then checks if there are more questions to ask. If there are, it asks the next question. If not, it calls the `done` function with the `answers` array.

6. The script then proceeds to `console.log("\nEnd of module.exports : ", answers);`. But at this point, `answers` is still empty because the process of asking questions and waiting for user responses is asynchronous.

7. In your test run, after "End of module.exports :  []" is logged, you provide the answer "Ankit" to the question "What is your name?". After this, the default `done` function is called with the final `answers` array, which now contains your single response.

8. The `done` function logs "using default values: " along with the `answers` array, which shows your response "Ankit", and then `process.exit()` is called to stop the process.

This demonstrates the asynchronous nature of JavaScript and Node.js. The logging of "End of module.exports :  []" happens before the user has a chance to answer the question, even though the logging statement is written after the call to `rl.question` in the code.

## Run

```bash
$ node questions.js
Inside module.exports
What is your name? 
End of module.exports :  []
Ankit
using default values:  [ 'Ankit' ]
```
