/**
 * Loops Aplenty!
 * @link https://developer.mozilla.org/en-US/docs/Glossary/Callback_function
 */

const stuff = ["piggy", "headlamp", "pen", "pencil", "eraser", "water bottle"];

const nestedObjects = {
  item01: {
    name: "piggy",
    type: "toy",
    weight: 30,
  },
  item02: {
    name: "headlamp",
    type: "equipment",
    weight: 120,
  },
  item03: {
    name: "pen",
    type: "tool",
    weight: 30,
  },
  item04: {
    name: "pencil",
    type: "tool",
    weight: 30,
  },
  item05: {
    name: "eraser",
    type: "tool",
    weight: 40,
  },
  item03: {
    name: "water bottle",
    type: "equipment",
    weight: 1300,
  },
};

const article = document.querySelector("article");
let stuffList = document.createElement("ul");

console.log("Stuff : ", stuff);
console.log("Nested Object : ", nestedObjects);
console.log("\n\n");

console.log("Using for loop of type: for (let i = 0; i < stuff.length; i++) {} ")
/**
 * for loop
 * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/for
 */
for (let i = 0; i < stuff.length; i++) {
  let listItem = document.createElement("li");
  listItem.innerHTML = stuff[i];
  console.log("Inner HTML : ", listItem.innerHTML)
  console.log("Item : ", listItem)
  stuffList.append(listItem);
}

console.log("stuffList : ", stuffList);

console.log("\n\nUsing for loop of type: for (const item of stuff) {} ")
/**
 * for...of loop and arrays
 * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/for...of
 */
for (const item of stuff) {
  let listItem = document.createElement("li");
  listItem.innerHTML = item;
  console.log("Inner HTML", listItem.innerHTML);
  console.log("Item ", listItem);
  stuffList.append(listItem);
}

console.log("\n\n For loop completed");
console.log("stuffList : ", stuffList);

console.log("\n\n The forEach method");
/**
 * foreach array method
 * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/forEach
 */
stuff.forEach((item) => {
  let listItem = document.createElement("li");
  listItem.innerHTML = item;
  console.log("The innerHTML : ", listItem.innerHTML);
  console.log("listItem : ", listItem);
  stuffList.append(listItem);
});

console.log("End of forEach Method");
console.log("stuffList : ", stuffList);

console.log("\n\nUsing for (const singleObject in nestedObjects)");
console.log("nestedObjects: ", nestedObjects);
/**
 * for...in loop and objects
 * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/for...of
 */
for (const singleObject in nestedObjects) {
  let listItem = document.createElement("li");
  listItem.innerHTML = `Weight: ${nestedObjects[singleObject].weight}`;
  console.log("singleObject : ", singleObject);
  console.log(`typeOf(${singleObject})`, typeof (singleObject));
  stuffList.append(listItem);
}

console.log(`nestedObjects["item01"].name : `, nestedObjects["item01"].name);
console.log(`nestedObjects["item01"].type : `, nestedObjects["item01"].type);
console.log(`nestedObjects["item01"].weight : `, nestedObjects["item01"].weight);

console.log("stuffList : ", stuffList);
article.append(stuffList);
