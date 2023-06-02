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
