backButton = document.getElementById("back");
nextButton = document.getElementById("next");
number = document.getElementById("number");
var i = 1;
function ready() {
    backButton.disabled = true;
    opt.classList.add("ready");
  }  
  function next() {
    i++;
    if (i == 30) {
      nextButton.disabled = true;
    }
    backButton.disabled = false;
    number.innerHTML = i;
  }
  function back() {
    i--;
    if (i == 1) {
      backButton.disabled = true;
    }
    nextButton.disabled = false;
    number.innerHTML = i;
  }