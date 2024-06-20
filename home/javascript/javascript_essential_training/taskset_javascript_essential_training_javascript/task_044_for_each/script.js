/**
 * The map() array method.
 * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/map
 */

const stuff = ["piggy", "headlamp", "pen", "pencil", "eraser", "water bottle"];

const article = document.querySelector("article");
let stuffList = document.createElement("ul");

console.log("stuffList before: ", stuffList);
console.log("stuffList childNodes before: : ", stuffList.childNodes);
// forEach() array method
stuff.forEach((item) => {
  let listItem = document.createElement("li");
  listItem.innerHTML = item;
  console.log("item: ", item)
  console.log("listItem: ", listItem)
  stuffList.append(listItem);
});

console.log("Stuff : ", stuff)
console.log("stuffList after: ", stuffList);
console.log("stuffList childNodes after: : ", stuffList.childNodes);
article.append(stuffList)