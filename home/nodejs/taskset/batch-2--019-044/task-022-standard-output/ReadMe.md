# Standard Output

## Code

```javascript
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
```

## Explaination

The code you provided sets up an array called `questions` containing three strings representing different questions. 

The `ask` function is defined, which takes an optional parameter `i` that defaults to 0. This function is responsible for displaying a question to the user and prompting for input. 

Inside the `ask` function, `process.stdout.write` is used to write the question to the console. The `\n` characters at the beginning create three new lines to separate the question from any previous output. The `questions[i]` accesses the question from the `questions` array based on the index `i`. 

After displaying the question, `process.stdout.write` is used again to display the `> ` prompt, indicating that the user should input their answer. 

Lastly, the `ask` function is called without any arguments, so it will use the default value of `0` to display the first question from the `questions` array.

In summary, this code sets up a simple question-and-answer interaction in the console, where the program displays a question and prompts the user to input their answer.

- Run

```bash
## Note : The value of i is not getting incremented.
$ node questions.js

 What is your name? >

$                      
```
