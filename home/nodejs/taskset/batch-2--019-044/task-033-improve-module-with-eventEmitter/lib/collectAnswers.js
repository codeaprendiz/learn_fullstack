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
