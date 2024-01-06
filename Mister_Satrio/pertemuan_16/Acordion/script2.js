let subs = true;
let btn = document.getElementById("sube");
function myBtn() {
  if (subs) {
    sube.innerHTML = "Disubscribe";
    sube.style.background = " #444";
    subs = false;
  } else {
    btn.innerHTML = "Subscribe";
    subs = true;
    sube.style.background = "#fff";
  }
}

//-----------cara banyak----------

let = accordion = document.getElementsByClassName("accordion");
let = panel = document.getElementsByClassName("panel");
let satu = accordion[0];
let dua = accordion[1];
let tiga = accordion[2];
let panel1 = panel[0];
let panel2 = panel[1];
let panel3 = panel[2];

satu.addEventListener("click", function () {
  this.classList.toggle("active");
  if (panel1.style.maxHeight) {
    panel1.style.maxHeight = null;
  } else {
    panel1.style.maxHeight = panel1.scrollHeight + "px";
  }
});

dua.addEventListener("click", function () {
  this.classList.toggle("active");
  if (panel2.style.maxHeight) {
    panel2.style.maxHeight = null;
  } else {
    panel2.style.maxHeight = panel2.scrollHeight + "px";
  }
});

tiga.addEventListener("click", function () {
  this.classList.toggle("active");
  if (panel3.style.maxHeight) {
    panel3.style.maxHeight = null;
  } else {
    panel3.style.maxHeight = panel3.scrollHeight + "px";
  }
});
