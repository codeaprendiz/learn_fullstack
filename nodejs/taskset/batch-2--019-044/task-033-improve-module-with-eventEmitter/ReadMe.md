# Improve Module with Event Emitter

## Code

```js
// collectAnswers.js
const readline = require("readline");
const { EventEmitter } = require("events");

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

console.log("Inside collectAnswers.js: started");

module.exports = (questions, done) => {
  console.log("Inside collectAnswers.js: started module.exports");
  const answers = [];
  const [firstQuestion] = questions;
  console.log("Inside collectAnswers.js: started module.exports: firstQuestion: ", firstQuestion);
  const emitter = new EventEmitter();

  const questionAnswered = (answer) => {
    console.log("Inside collectAnswers.js: started questionAnswered");
    console.log("Inside collectAnswers.js: started questionAnswered: about to emit answer");
    emitter.emit("answer", answer);
    console.log("Inside collectAnswers.js: started questionAnswered: emitted answer");
    answers.push(answer);
    if (answers.length < questions.length) {
      console.log(`\nInside collectAnswers.js: started questionAnswered: about to emit ask, answers.length: ${answers.length} and questions.length: ${questions.length}`);
      emitter.emit("ask", questions[answers.length]);
      console.log("Inside collectAnswers.js: started questionAnswered: emitted ask");

      console.log("\nInside collectAnswers.js: started questionAnswered: about to ask next question");
      rl.question(questions[answers.length], questionAnswered);
      console.log("Inside collectAnswers.js: started questionAnswered: asked next question");
    } else {
      console.log("Inside collectAnswers.js: started questionAnswered: about to emit complete");
      emitter.emit("complete", answers);
      console.log("Inside collectAnswers.js: started questionAnswered: emitted complete");

      console.log("Inside collectAnswers.js: started questionAnswered: about to call done");
      done(answers);
      console.log("Inside collectAnswers.js: started questionAnswered: called done");
    }
  };

  console.log("Inside collectAnswers.js: about to start process.nextTick");
  process.nextTick(() => {
    console.log("Inside collectAnswers.js: started process.nextTick");

    console.log("\nInside collectAnswers.js: started process.nextTick: about to emit ask with first question");
    emitter.emit("ask", firstQuestion);
    console.log("Inside collectAnswers.js: started process.nextTick: emitted ask");

    console.log("\nInside collectAnswers.js: started process.nextTick: about to ask first question");
    rl.question(firstQuestion, questionAnswered);
    console.log("Inside collectAnswers.js: started process.nextTick: asked first question");
  });

  console.log("\nInside collectAnswers.js: about to return emitter");
  return emitter;
};
```

```js
// questions.js
const collectAnswers = require("./lib/collectAnswers");

const questions = [
  "What is your name? ",
  "Where do you live? ",
];

const answerEvents = collectAnswers(questions, (answers) => {
  console.log("Inside the callback function. Answers: ", answers);
  console.log("Inside questions.js :Inside answerEvents: ", answers);
  process.exit();
});

console.log("Inside questions.js : Before once: ask");
answerEvents.once("ask", () => {
  console.log("Inside questions.js :Inside once: ask: started asking questions");
});
console.log("Inside questions.js :After once: ask");

console.log("Inside questions.js :Before on: ask");
answerEvents.on("ask", question => {
  console.log(`Inside on: ask: question asked: ${question}`)
}
);
console.log("Inside questions.js :After on: ask");

console.log("Inside questions.js :Before on: answer");
answerEvents.on("answer", (answer) => {
  console.log(`Inside on: answer: question answered: ${answer}`)
}
);
console.log("Inside questions.js :After on: answer");

console.log("Inside questions.js :Before on: complete");
answerEvents.on("complete", answers => {
  console.log("Inside questions.js :Inside on: complete: Thank you for your answers. ");
  console.log(answers);
});
console.log("Inside questions.js :After on: complete");

console.log("Inside questions.js :Before on: complete, with no second argument");
answerEvents.on("complete", () => {
  console.log("Inside questions.js :Inside on: complete, with no second argument: Thank you for your answers. ");
  //process.exit()
});
console.log("Inside questions.js :After on: complete, with no second argument");
```

## Explaination

This is a Node.js program using the readline module to ask the user a series of questions in the terminal, and the events module to emit events and handle responses asynchronously. It's organized in two primary files: `collectAnswers.js` which is the module that asks the questions and manages responses, and `questions.js` which uses the `collectAnswers` module to define specific questions and handle events.

**`collectAnswers.js` Module Explanation:**

This module exports a function that takes an array of questions and a callback function as arguments. It uses the `readline` module to ask these questions to the user. It also uses the `events` module to emit and listen to events.

The `readline` module provides an interface for reading data from `process.stdin`, a readable stream for standard input, and writing data to `process.stdout`, a writable stream for standard output. This allows the program to interact with the user through the terminal.

The `events` module provides the `EventEmitter` class, which is used to emit named events that cause function objects, or "listeners", to be called. In this code, an `EventEmitter` instance named `emitter` is used to emit and listen to events.

The `questionAnswered` function is defined to handle user answers. It is used as a callback function for the `readline.question` method. When a question is answered, it emits an 'answer' event with the answer, pushes the answer to the `answers` array, and if there are still questions left, emits an 'ask' event with the next question and asks the next question. If there are no more questions left, it emits a 'complete' event with the `answers` array and calls the `done` callback function with the `answers` array.

The `process.nextTick` method is used to defer some actions to be taken during the next tick in the Node.js event loop, which is used here to emit an 'ask' event with the first question and ask the first question to the user. 

The module exports a function that returns the `emitter`, so the caller can listen to the events.

**`questions.js` Script Explanation:**

This script imports the `collectAnswers` module and defines a list of questions to ask the user. It then calls the `collectAnswers` function with the questions and a callback function. The callback function simply logs the `answers` array to the console and exits the process.

The script also sets up event listeners for the 'ask', 'answer', and 'complete' events emitted by the `emitter` returned by the `collectAnswers` function. The 'ask' event logs the question being asked, the 'answer' event logs the answer given, and the 'complete' event logs a thank-you message and the `answers` array. The script sets up a listener for the 'complete' event twice, once with and once without the `answers` parameter to demonstrate that the listener can be called with or without arguments.

This script demonstrates the use of the `EventEmitter` class to handle asynchronous user input from the terminal. It also demonstrates the use of `process.nextTick` to defer actions to the next tick in the event loop.

## Run

- Run

```bash
$ node questions.js
Inside collectAnswers.js: started
Inside collectAnswers.js: started module.exports
Inside collectAnswers.js: started module.exports: firstQuestion:  What is your name? 
Inside collectAnswers.js: about to start process.nextTick

Inside collectAnswers.js: about to return emitter
Inside questions.js : Before once: ask
Inside questions.js :After once: ask
Inside questions.js :Before on: ask
Inside questions.js :After on: ask
Inside questions.js :Before on: answer
Inside questions.js :After on: answer
Inside questions.js :Before on: complete
Inside questions.js :After on: complete
Inside questions.js :Before on: complete, with no second argument
Inside questions.js :After on: complete, with no second argument
Inside collectAnswers.js: started process.nextTick

Inside collectAnswers.js: started process.nextTick: about to emit ask with first question
Inside questions.js :Inside once: ask: started asking questions
Inside on: ask: question asked: What is your name? 
Inside collectAnswers.js: started process.nextTick: emitted ask

Inside collectAnswers.js: started process.nextTick: about to ask first question
What is your name? Inside collectAnswers.js: started process.nextTick: asked first question
Ankit
Inside collectAnswers.js: started questionAnswered
Inside collectAnswers.js: started questionAnswered: about to emit answer
Inside on: answer: question answered: Ankit
Inside collectAnswers.js: started questionAnswered: emitted answer

Inside collectAnswers.js: started questionAnswered: about to emit ask, answers.length: 1 and questions.length: 2
Inside on: ask: question asked: Where do you live? 
Inside collectAnswers.js: started questionAnswered: emitted ask

Inside collectAnswers.js: started questionAnswered: about to ask next question
Where do you live? Inside collectAnswers.js: started questionAnswered: asked next question
Dubai
Inside collectAnswers.js: started questionAnswered
Inside collectAnswers.js: started questionAnswered: about to emit answer
Inside on: answer: question answered: Dubai
Inside collectAnswers.js: started questionAnswered: emitted answer
Inside collectAnswers.js: started questionAnswered: about to emit complete
Inside questions.js :Inside on: complete: Thank you for your answers. 
[ 'Ankit', 'Dubai' ]
Inside questions.js :Inside on: complete, with no second argument: Thank you for your answers. 
Inside collectAnswers.js: started questionAnswered: emitted complete
Inside collectAnswers.js: started questionAnswered: about to call done
Inside the callback function. Answers:  [ 'Ankit', 'Dubai' ]
Inside questions.js :Inside answerEvents:  [ 'Ankit', 'Dubai' ]
```