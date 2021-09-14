// ----- BurgerMenu -----
let burgerMenu = document.getElementById("burger");
let topElement = document.getElementById("spantop");
let centerElement = document.getElementById("spancenter");
let botElement = document.getElementById("spanbot");
let menuElements = document.getElementById("menu");
let homeButton = document.getElementById("homebutton");
let homeMenu = document.getElementById("homemenu");
console.log(burger);

burgerMenu.addEventListener("click", () => {
  topElement.classList.toggle("spantopclose");
  centerElement.classList.toggle("spancenterclose");
  botElement.classList.toggle("spanbotclose");
  topElement.classList.toggle("spantopopen");
  centerElement.classList.toggle("spancenteropen");
  botElement.classList.toggle("spanbotopen");
  menuElements.classList.toggle("menuopen");
});

// ----- End Burger Menu -----

// ----- Slider product -----

var slidesp = document.querySelectorAll(".slide-product");
var btnsp = document.querySelectorAll(".btn-product");
let currentProduct = 1;

// JavaScript for slider manual navigation
var manualNav1 = function (manual1) {
  slidesp.forEach((slidep) => {
    slidep.classList.remove("actives");

    btnsp.forEach((btnp) => {
      btnp.classList.remove("actives");
    });
  });
  slidesp[manual1].classList.add("actives");
  btnsp[manual1].classList.add("actives");
};

btnsp.forEach((btnp, i) => {
  btnp.addEventListener("click", () => {
    manualNav1(i);
    currentProduct = i;
  });
});

// JavaScript for slider automatic navigation
var repeat = function (activeClass) {
  let actives = document.getElementsByClassName("actives");
  let i = 1;

  var repeater = () => {
    setTimeout(function () {
      [...actives].forEach((activesProduct) => {
        activesProduct.classList.remove("actives");
      });

      slidesp[i].classList.add("actives");
      btnsp[i].classList.add("actives");
      i++;

      if (slidesp.length == i) {
        i = 0;
      }
      if (i >= slidesp.length) {
        return;
      }
      repeater();
    }, 5000);
  };
  repeater();
};
repeat();

