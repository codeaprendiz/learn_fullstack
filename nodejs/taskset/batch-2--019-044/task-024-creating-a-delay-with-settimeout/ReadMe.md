# Creating a delay with setTimeout()

## Code

```javascript
const waitTime = 3000;
console.log(`setting a ${waitTime / 1000} second delay`);

const timerFinished = () => console.log("done");

setTimeout(timerFinished, waitTime);
```

## Explaination

Let's go through the code step by step and explain each part:

1. `const waitTime = 3000;`:
   - This declares a constant variable `waitTime` and assigns it a value of 3000.
   - The value represents the time in milliseconds (3 seconds) for which the program will wait before executing the specified callback function.

2. `console.log(`setting a ${waitTime / 1000} second delay`);`:
   - This statement logs a message to the console using a template string.
   - The template string includes an expression `${waitTime / 1000}` inside `${}` that calculates the delay in seconds by dividing `waitTime` by 1000.
   - The resulting message is displayed as "setting a 3 second delay".

3. `const timerFinished = () => console.log("done");`:
   - This declares a constant variable `timerFinished` and assigns it an arrow function.
   - The arrow function has no parameters and logs the message "done" to the console.

4. `setTimeout(timerFinished, waitTime);`:
   - This function sets a timer to delay the execution of a specified function (`timerFinished`) by the specified time (`waitTime`).
   - The `setTimeout` function takes two arguments: the callback function to execute (`timerFinished`) and the time to delay in milliseconds (`waitTime`).
   - In this case, after waiting for 3 seconds (as specified by `waitTime`), the callback function `timerFinished` will be executed, and it will log the message "done" to the console.

Overall, this code sets a delay of 3 seconds using `setTimeout` and displays a message indicating the delay duration. Once the delay time elapses, the specified callback function is executed, logging "done" to the console. This demonstrates how to use timers and callbacks in JavaScript to introduce delays in program execution.

## Run

- Run

```bash
node timers.js 
setting a 3 second delay
done
```
