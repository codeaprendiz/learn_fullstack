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

