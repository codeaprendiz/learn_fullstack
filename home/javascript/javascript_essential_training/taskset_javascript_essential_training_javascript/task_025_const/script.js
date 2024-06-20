/**
 * The const statement
 * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/const
 */

const color = "purple";

document.querySelector(".left").style.backgroundColor = color;
document.querySelector(".left .color-value").innerHTML = color;


function headingColor() {
  let colorNew = "blue";
  document.querySelector(".title").style.color = colorNew;
}

headingColor();

// Should result in error because we cannot re-define the constant
color = "skyblue";

document.querySelector(".right").style.backgroundColor = color;
document.querySelector(".right .color-value").innerHTML = color;
