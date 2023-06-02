/**
 * Event listeners
 * @link https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener
 * @link https://developer.mozilla.org/en-US/docs/Web/Events
 */
import backpackObjectArray from "./components/data.js";

/**
 * Add event listener to the lid-toggle button.
 */
const lidToggle = function () {
  console.log("Inside the callback function lidToggle()")
  // Find the current backpack object in backpackObjectArray

  let backpackObject = backpackObjectArray.find(({ id }) => {
    console.log("Comparing:", id, this.parentElement.id);
    return id === this.parentElement.id;
  });

  // Toggle lidOpen status
  console.log("Current lidOpen status:", backpackObject.lidOpen);
  backpackObject.lidOpen == true
    ? (backpackObject.lidOpen = false)
    : (backpackObject.lidOpen = true);
  console.log("Updated lidOpen status:", backpackObject.lidOpen);

  // Toggle button text
  console.log("Current button text:", this.innerText);
  this.innerText == "Open lid"
    ? (this.innerText = "Close lid")
    : (this.innerText = "Open lid");
  console.log("Updated button text:", this.innerText);

  // Set visible property status text
  let status = this.parentElement.querySelector(".backpack__lid span");
  console.log("Current status text:", status.innerText);
  status.innerText == "closed"
    ? (status.innerText = "open")
    : (status.innerText = "closed");
  console.log("Updated status text:", status.innerText);
};

const backpackList = backpackObjectArray.map((backpack) => {
  let backpackArticle = document.createElement("article");
  backpackArticle.classList.add("backpack");
  backpackArticle.setAttribute("id", backpack.id);

  backpackArticle.innerHTML = `
    <figure class="backpack__image">
      <img src=${backpack.image} alt="" loading="lazy" />
    </figure>
    <h1 class="backpack__name">${backpack.name}</h1>
    <ul class="backpack__features">
      <li class="feature backpack__volume">Volume:<span> ${backpack.volume
    }l</span></li>
      <li class="feature backpack__color">Color:<span> ${backpack.color
    }</span></li>
      <li class="feature backpack__age">Age:<span> ${backpack.backpackAge()} days old</span></li>
      <li class="feature backpack__pockets">Number of pockets:<span> ${backpack.pocketNum
    }</span></li>
      <li class="feature backpack__strap">Left strap length:<span> ${backpack.strapLength.left
    } inches</span></li>
      <li class="feature backpack__strap">Right strap length:<span> ${backpack.strapLength.right
    } inches</span></li>
      <li class="feature backpack__lid">Lid status: <span>${backpack.lidOpen ? "open" : "closed"
    }</span></li>
    </ul>
    <button class="lid-toggle">Open lid</button>
  `;

  let button = backpackArticle.querySelector(".lid-toggle");

  // Add event listener
  button.addEventListener("click", lidToggle);

  return backpackArticle;
});

// Append each backpack item to the main
const main = document.querySelector(".maincontent");

backpackList.forEach((backpack) => {
  main.append(backpack);
});
