# Pass Argument Through Event Listners

## Javascript Code

Let's go through the changes in the code where we are passing arguments to the callback function:

```javascript
const lidToggle = function (event, button, newArg) {
  console.log(event)
  console.log(newArg)

  // Find the current backpack object in backpackObjectArray
  let backpackObject = backpackObjectArray.find(({ id }) => id === button.parentElement.id);

  // Toggle lidOpen status
  backpackObject.lidOpen == true
    ? backpackObject.lidOpen = false
    : backpackObject.lidOpen = true;

  // Toggle button text
  button.innerText == "Open lid"
    ? button.innerText = "Close lid"
    : button.innerText = "Open lid";

  // Set visible property status text
  let status = button.parentElement.querySelector(".backpack__lid span");
  status.innerText == "closed"
    ? (status.innerText = "open")
    : (status.innerText = "closed");
}
```

- The `lidToggle` function now has three parameters: `event`, `button`, and `newArg`. These parameters represent the arguments that will be passed to the callback function.
- Inside the `lidToggle` function, we log the `event` object and the `newArg` value to the console. These logs can be used to inspect the event details and verify the value of `newArg`.
- The logic for toggling the `lidOpen` status, button text, and status text remains the same as in the previous version.

```javascript
button.addEventListener("click", (event) => {
  lidToggle(event, button, newArg)
})
```

- When adding the event listener to the button, we pass the `event` object, `button` element, and `newArg` value as arguments to the `lidToggle` function.
- This ensures that when the button is clicked, the `lidToggle` function is called with the appropriate arguments.

The overall functionality of the code remains the same, but now the `lidToggle` function can access and utilize the `event` object, `button` element, and the additional `newArg` value within its scope.

## Screenshots

- Pass arguments through event listners

![img](.images/pass-arguments-through-event-listners.png)