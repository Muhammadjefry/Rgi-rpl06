let subs = true;
let btn = document.getElementById("sube");
function myBtn() {
  if (subs) {
    sube.innerHTML = "Disubscribe";
    sube.style.background = " #444";
    subs = false;
  } else {
    sube.innerHTML = "Subscribe";
    subs = true;
    sube.style.background = "#fff";
  }
}
//---------------cara Simple ----------
var acc = document.getElementsByClassName("accordion");

var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
