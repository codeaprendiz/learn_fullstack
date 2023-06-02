const { setMaxIdleHTTPParsers } = require("http");
const collectAnswers = require("./lib/collectAnswers");

const questions = [
  "What is your name? ",
];


collectAnswers(questions);

// collectAnswers(questions, answers => {
//   console.log("Thank you for your answers. ");
//   console.log(answers);
//   process.exit();
// });
