# Report Progress with setInterval()

## Code

```javascript
const waitTime = 5000;
const waitInterval = 500;
let currentTime = 0;

const incTime = () => {
  currentTime += waitInterval;
  const p = Math.floor((currentTime / waitTime) * 100);
  process.stdout.clearLine();
  process.stdout.cursorTo(0);
  process.stdout.write(`waiting ... ${p}%`);
};

console.log(`setting a ${waitTime / 1000} second delay`);

const timerFinished = () => {
  clearInterval(interval);
  process.stdout.clearLine();
  process.stdout.cursorTo(0);
  console.log("done");
};

const interval = setInterval(incTime, waitInterval);
setTimeout(timerFinished, waitTime);
```

## Explaination

Certainly! Let's break down the code and explain each part in detail:

1. `const waitTime = 5000;`:
   - This declares a constant variable `waitTime` and assigns it a value of 5000 milliseconds (5 seconds).
   - It represents the total time for which the program will wait before executing the `timerFinished` function.

2. `const waitInterval = 500;`:
   - This declares a constant variable `waitInterval` and assigns it a value of 500 milliseconds.
   - It represents the interval at which the `incTime` function will be called.

3. `let currentTime = 0;`:
   - This declares a variable `currentTime` and initializes it to 0.
   - It represents the current elapsed time during the wait period.

4. `const incTime = () => {...}`:
   - This is an arrow function named `incTime`.
   - It is called at the specified `waitInterval` and increments the `currentTime` variable by `waitInterval`.
   - It calculates the percentage of time passed by dividing `currentTime` by `waitTime`, multiplying by 100, and storing it in the variable `p`.
   - It uses the `process.stdout` object to clear the current line, move the cursor to the beginning of the line, and write the updated progress message.
   - The progress message includes the percentage (`p`) and displays the progress as "waiting ... XX%".
   - This function provides a visual representation of the progress by updating the console output.

5. `console.log(`setting a ${waitTime / 1000} second delay`);`:
   - This logs a message to the console, indicating the delay duration.
   - It calculates the delay time in seconds by dividing `waitTime` by 1000 and interpolates it into the message using a template string.

6. `const timerFinished = () => {...}`:
   - This is an arrow function named `timerFinished`.
   - It is executed once the specified `waitTime` elapses.
   - It clears the interval by calling `clearInterval` and passing the `interval` variable as an argument.
   - It uses the `process.stdout` object to clear the current line, move the cursor to the beginning of the line, and log the message "done" to the console.

7. `const interval = setInterval(incTime, waitInterval);`:
   - This sets up an interval using the `setInterval` function.
   - The `incTime` function is called every `waitInterval` milliseconds, which is 500 in this case.
   - It assigns the returned interval ID to the variable `interval`.

8. `setTimeout(timerFinished, waitTime);`:
   - This sets a timer using the `setTimeout` function.
   - After the specified `waitTime` (5 seconds), the `timerFinished` function is executed.

Overall, this code sets up a timer with a delay of 5 seconds. During the wait period, the `incTime` function is called every 500 milliseconds, incrementing the `currentTime` variable and updating the progress in the console. Once the wait time elapses, the `timerFinished` function is executed, which stops the interval, clears the console output, and logs "done" to the console.

This code provides an interactive progress indicator that visually shows the progress of the timer while waiting, enhancing the user experience.

## Run

- Run

```bash
$ node timers.js
setting a 5 second delay
waiting ... 60%


### Finally
$ node timers.js
setting a 5 second delay
done
```
