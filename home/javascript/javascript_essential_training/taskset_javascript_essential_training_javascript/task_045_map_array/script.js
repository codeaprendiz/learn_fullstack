/**
 * The map() array method.
 * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/map
 */

const stuff = ["piggy", "headlamp", "pen", "pencil", "eraser", "water bottle"];

const article = document.querySelector("article");
let stuffList = document.createElement("ul");

console.log("stuff : ", stuff);
console.log("article", article);
console.log("stuffList : ", stuffList);

// map() through the stuff array to make a new stuffItems array.
const stuffItems = stuff.map((item) => {
  let listItem = document.createElement("li");
  listItem.innerHTML = item;
  console.log("Adding HTML : ", listItem.innerHTML);
  console.log("Element : ", listItem);
  return listItem;
});

console.log("\n\nstuffItems : ", stuffItems);

// Append each element from the stuffItems array to the stuffList <ul>
stuffItems.forEach((item) => {
  console.log("Appending item", item, " to stuffItems.")
  stuffList.append(item);
});

// Append stuffList to the <article>
console.log("Finally adding stuffList to article");
article.append(stuffList);


