# Use readline function

## Code

```javascript
const readline = require("readline");

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

const questions = [
  "What is your name? ",
  "Where do you live? ",
  "What are you going to do with node js? "
];

console.log("----------   Declaration: collectAnswers    ---------------")

const collectAnswers = (questions, done) => {
  console.log("Inside declaration collectAnswers")
  const answers = [];
  const [firstQuestion] = questions;

  console.log("----------   Declaration: questionAnswered    ---------------")
  const questionAnswered = answer => {
    console.log("Inside declaration questionAnswered")
    answers.push(answer);
    if (answers.length < questions.length) {
      console.log("Not all answered...... asking another");
      console.log("Before rl.question()");
      rl.question(questions[answers.length], questionAnswered);
      console.log("After rl.question()");
      console.log("\n Came back after asking. After the rl.question function call\n");
    } else {
      done(answers);
    }
  };
  console.log("Completed----------   Declaration: questionAnswered    ---------------")

  console.log("Before FIRST rl.question()");
  rl.question(firstQuestion, questionAnswered);
  console.log("After FIRST rl.question()");

};

console.log("Completed ----------   Declaration: collectAnswers    ---------------")

console.log("Before collectAnswers()")
collectAnswers(questions, answers => {
  console.log("Thank you for your answers. ");
  console.log(answers);
  process.exit();
});
console.log("After collectAnswers()")
```

## Explaination

The code is a Node.js program that uses the `readline` module to ask a series of questions in the console. It defines a `collectAnswers` function to do this, and then calls that function with an array of questions.

Here's a step-by-step breakdown:

1. The `readline` module is imported and an interface is created with `stdin` (standard input - usually the keyboard) as the input stream and `stdout` (standard output - usually the console) as the output stream.

2. An array of questions is defined.

3. The `collectAnswers` function is defined. This function takes an array of questions and a callback function (`done`) as arguments.

4. Inside the `collectAnswers` function, an empty `answers` array and a `questionAnswered` function are defined. 

    - The `questionAnswered` function is a callback that gets invoked each time a question is answered by the user. This function pushes the answer into the `answers` array. If not all questions have been answered, it asks the next question with `rl.question()`. If all questions have been answered, it calls the `done` function (passed to `collectAnswers`) with the array of answers.

5. The `collectAnswers` function starts by asking the first question with `rl.question()`.

6. The `collectAnswers` function is then called with the array of questions and a callback. The callback logs the answers and exits the process.

Throughout the code, there are several `console.log` statements. These are essentially print statements that are used here for tracing or debugging the execution flow of the code. They indicate when each function is declared and when key lines of code (like `rl.question()`) are executed.

## Run

- Run

```bash
$ node questions.js
----------   Declaration: collectAnswers    ---------------
Completed ----------   Declaration: collectAnswers    ---------------
Before collectAnswers()
Inside declaration collectAnswers
----------   Declaration: questionAnswered    ---------------
Completed----------   Declaration: questionAnswered    ---------------
Before FIRST rl.question()
What is your name? After FIRST rl.question()
After collectAnswers()
Ankit
Inside declaration questionAnswered
Not all answered...... asking another
Before rl.question()
Where do you live? After rl.question()

 Came back after asking. After the rl.question function call

Dubai
Inside declaration questionAnswered
Not all answered...... asking another
Before rl.question()
What are you going to do with node js? After rl.question()

 Came back after asking. After the rl.question function call

Play
Inside declaration questionAnswered
Thank you for your answers. 
[ 'Ankit', 'Dubai', 'Play' ]
```
