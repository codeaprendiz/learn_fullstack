# Incorporating setInterval

## Code

```javascript
const waitTime = 5000;
const waitInterval = 500;
let currentTime = 0;

const incTime = () => {
  currentTime += waitInterval;
  const p = Math.floor((currentTime / waitTime) * 100);
  console.log(currentTime)
};

console.log(`setting a ${waitTime / 1000} second delay`);

const timerFinished = () => {
  clearInterval(interval);
  console.log("done");
};

const interval = setInterval(incTime, waitInterval);
setTimeout(timerFinished, waitTime);
```

## Explaination

Certainly! Let's break down the code and explain each part in detail:

1. `const waitTime = 5000;`:
   - This declares a constant variable `waitTime` and assigns it a value of 5000 milliseconds (5 seconds).
   - It represents the total time for which the program will wait before executing the timerFinished function.

2. `const waitInterval = 500;`:
   - This declares a constant variable `waitInterval` and assigns it a value of 500 milliseconds.
   - It represents the interval at which the incTime function will be called.

3. `let currentTime = 0;`:
   - This declares a variable `currentTime` and initializes it to 0.
   - It represents the current elapsed time during the wait period.

4. `const incTime = () => {...}`:
   - This is an arrow function named `incTime`.
   - It is called at the specified `waitInterval` and increments the `currentTime` variable by `waitInterval`.
   - It calculates the percentage of time passed by dividing `currentTime` by `waitTime`, multiplying by 100, and storing it in the variable `p`.
   - Finally, it logs the current time (`currentTime`) to the console.

5. `console.log(`setting a ${waitTime / 1000} second delay`);`:
   - This logs a message to the console, indicating the delay duration.
   - It calculates the delay time in seconds by dividing `waitTime` by 1000 and interpolates it into the message using a template string.

6. `const timerFinished = () => {...}`:
   - This is an arrow function named `timerFinished`.
   - It is executed once the specified `waitTime` elapses.
   - It clears the interval by calling `clearInterval` and passing the `interval` variable as an argument.
   - Finally, it logs the message "done" to the console.

7. `const interval = setInterval(incTime, waitInterval);`:
   - This sets up an interval using the `setInterval` function.
   - The `incTime` function is called every `waitInterval` milliseconds, which is 500 in this case.
   - It assigns the returned interval ID to the variable `interval`.

8. `setTimeout(timerFinished, waitTime);`:
   - This sets a timer using the `setTimeout` function.
   - After the specified `waitTime` (5 seconds), the `timerFinished` function is executed.

Overall, this code sets up a timer with a delay of 5 seconds. During the wait period, the `incTime` function is called every 500 milliseconds, incrementing the `currentTime` variable and logging the current time to the console. Once the wait time elapses, the `timerFinished` function is executed, which stops the interval and logs "done" to the console.

This code demonstrates how to create a timer and execute functions at regular intervals using `setInterval` and `setTimeout` in JavaScript.

## Run

- Run

```bash
node timers.js
setting a 5 second delay
500
1000
1500
2000
2500
3000
3500
4000
4500
done
```
