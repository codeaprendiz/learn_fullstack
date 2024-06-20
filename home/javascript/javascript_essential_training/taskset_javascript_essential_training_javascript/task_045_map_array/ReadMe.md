# Map Array

## Screenshots

- Declare elements and print

```javascript
const stuff = ["piggy", "headlamp", "pen", "pencil", "eraser", "water bottle"];

const article = document.querySelector("article");
let stuffList = document.createElement("ul");

console.log("stuff : ", stuff);
console.log("article", article);
console.log("stuffList : ", stuffList);
```

![img](.images/image-2023-05-12-14-28-14.png)

- Adding elements

```javascript
const stuffItems = stuff.map((item) => {
  let listItem = document.createElement("li");
  listItem.innerHTML = item;
  console.log("Adding HTML : ", listItem.innerHTML);
  console.log("Element : ", listItem);
  return listItem;
});
```

![img](.images/image-2023-05-12-14-31-12.png)

- Appending those elements to stuffItems

```javascript
console.log("\n\nstuffItems : ", stuffItems);

// Append each element from the stuffItems array to the stuffList <ul>
stuffItems.forEach((item) => {
  console.log("Appending item", item, " to stuffItems.")
  stuffList.append(item);
});
```

![img](.images/image-2023-05-12-14-35-50.png)

- Adding stuffList to article

```javascript
// Append stuffList to the <article>
console.log("Finally adding stuffList to article");
article.append(stuffList);
```

![img](.images/image-2023-05-12-14-37-00.png)
