# JS Object

- Object

```javascript
/**
 * Create a Backpack object.
 */

const backpack = {
  name: "Everyday Backpack",
  volume: 30,
  color: "grey",
  pocketNum: 15,
  strapLength: {
    left: 26,
    right: 26,
  },
  lidOpen: false,
  toggleLid: function (lidStatus) {
    this.lidOpen = lidStatus;
  },
  newStrapLength: function (lengthLeft, lengthRight) {
    this.strapLength.left = lengthLeft;
    this.strapLength.right = lengthRight;
  },
};
```

This JavaScript code defines an object named `backpack` with various properties and methods.

Here's what each part of the object does:

- `name: "Everyday Backpack"`: This is a property of the backpack object. It's a string representing the name of the backpack.

- `volume: 30`: This is another property, a number representing the volume of the backpack.

- `color: "grey"`: This property represents the color of the backpack.

- `pocketNum: 15`: This property indicates the number of pockets the backpack has.

- `strapLength: { left: 26, right: 26 }`: This property is an object itself, representing the length of the left and right straps of the backpack.

- `lidOpen: false`: This boolean property tells us whether the backpack's lid is open or not.

- `toggleLid: function (lidStatus) { this.lidOpen = lidStatus; }`: This is a method (a function associated with an object) that changes the `lidOpen` status. When called, it will set the `lidOpen` property to whatever value is passed in as `lidStatus`.

- `newStrapLength: function (lengthLeft, lengthRight) { this.strapLength.left = lengthLeft; this.strapLength.right = lengthRight; }`: This method changes the length of the backpack's straps. When called, it takes two arguments—`lengthLeft` and `lengthRight`—and sets the `strapLength` properties accordingly. 

So, overall, this `backpack` object models a real-world backpack with some of its characteristics and behaviors (like opening/closing the lid or adjusting strap length).
