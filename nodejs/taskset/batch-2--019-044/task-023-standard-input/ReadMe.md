# Standard Input

## Code

```javascript
const questions = [
  "What is your name?",
  "What would you rather be doing?",
  "What is your preferred programming language?"
];

const ask = (i = 0) => {
  process.stdout.write(`\n\n\n ${questions[i]}`);
  process.stdout.write(` > `);
};

ask();

const answers = [];

process.stdin.on("data", data => {
  answers.push(data.toString().trim());

  if (answers.length < questions.length) {
    ask(answers.length);
  } else {
    process.exit();
  }
});

process.on("exit", () => {
  const [name, activity, lang] = answers;
  console.log(`
  
Thank you for your anwsers.

Go ${activity} ${name} you can write ${lang} code later!!!

  
  `);
});
```

## Explaination

Let's go through the code step by step and explain each function:

1. `const questions = [...]`:
   - This defines an array called `questions` that contains a series of strings representing different questions.

2. `const ask = (i = 0) => { ... }`:
   - This is a function called `ask` that takes an optional parameter `i`, which represents the index of the question to ask.
   - The function uses `process.stdout.write` to display the question at the given index.
   - It also displays a prompt symbol (`>`) to indicate that the user should provide an answer.

3. `ask();`:
   - This invokes the `ask` function without any arguments, causing it to display the first question in the `questions` array.

4. `const answers = [];`:
   - This declares an empty array called `answers` that will store the user's responses to the questions.

5. `process.stdin.on("data", data => { ... })`:
   - This sets up an event listener on the standard input stream (`process.stdin`) to listen for user input.
   - Whenever the user enters data and presses the enter key, the event is triggered, and the provided callback function is executed.
   - The entered data is received as the `data` parameter of the callback function.

6. `answers.push(data.toString().trim());`:
   - Inside the callback function, the entered data is converted to a string using `toString()` and any leading/trailing whitespace is removed using `trim()`.
   - The resulting trimmed string is then pushed into the `answers` array to store the user's response.

7. `if (answers.length < questions.length) { ... } else { ... }`:
   - This conditional statement checks if the number of user responses (`answers.length`) is less than the total number of questions (`questions.length`).
   - If there are more questions remaining to be asked, it calls the `ask` function with the index of the next question (`answers.length`), effectively displaying the next question.
   - If all questions have been answered, it calls `process.exit()` to exit the program.

8. `process.on("exit", () => { ... })`:
   - This registers an event listener for the "exit" event of the Node.js process.
   - When the process is about to exit, the registered callback function is executed.
   - Inside the callback function, the `answers` array is deconstructed to extract the individual answers into separate variables (`name`, `activity`, `lang`).
   - Finally, a multi-line template string is used to display a customized message using the extracted answers.

To summarize, this code prompts the user with a series of questions, captures their responses, and then displays a final message incorporating their answers. It demonstrates the use of event listeners, standard input/output streams, and arrays to interact with the user and process their input.

## Run

- Run

```bash
$ node questions.js

 What is your name? > Ankit

 What would you rather be doing? > Gym

 What is your preferred programming language? > nodejs

  
Thank you for your anwsers.

Go Gym Ankit you can write nodejs code later!!!
```
