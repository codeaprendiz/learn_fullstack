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
