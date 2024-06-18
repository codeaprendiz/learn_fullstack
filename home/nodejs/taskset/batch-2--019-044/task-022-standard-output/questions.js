const questions = [
  "What is your name?",
  "What would you rather be doing?",
  "What is your preferred programming language?"
];

const ask = (i = 0) => {
  process.stdout.write(`\n ${questions[i]}`);
  process.stdout.write(` > `);
};

ask();
