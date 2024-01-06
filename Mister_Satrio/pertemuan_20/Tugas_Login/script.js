let password;
function check8Character(data) {
  if (data.length == 8) {
    return true;
  } else {
    return false;
  }
}
function checkSpasi(data) {
  let spasi = data.indexOf(" ");
  if (spasi == -1) {
    return true;
  } else {
    return false;
  }
}
function checkNumber(data) {
  let status = 0;
  for (let i = 0; i <= data.length; i++) {
    if (!isNaN(data[i])) {
      status += 1;
    }
  }
  if (status == 0) {
    return false;
  } else if (status > 0) {
    return true;
  }
}
function checkUpperCase(data) {
  let huruf = "";
  let kapital = data.toUpperCase();
  let counter = 0;
  for (let n = 0; n < data.length; n++) {
    huruf = data[n];
    if (huruf === kapital[n]) {
      counter += 1;
    }
  }
  if (counter == 0) {
    return false;
  } else if (counter > 0) {
    return true;
  }
}
function checkLowerCase(data) {
  let huruf = "";
  let huruf_kecil = data.toLowerCase();
  let counter = 0;
  for (let n = 0; n < data.length; n++) {
    huruf = data[n];
    if (huruf === huruf_kecil[n]) {
      counter += 1;
    }
  }
  if (counter == 0) {
    return false;
  } else if (counter > 0) {
    return true;
  }
}
function myFunction() {
  let data_form = document.getElementById("id01");
  //   let output = document.getElementById("output");
  password = data_form[(2, 3, 4, 5)].value;
  alert(check8Character(password));
  if (check8Character(password)) {
    if (checkSpasi(password)) {
      if (checkNumber(password)) {
        if (checkUpperCase(password)) {
          if (checkLowerCase(password)) {
            alert("Password Diterima");
          } else {
            alert("Password harus memiliki huruf kecil");
          }
        } else {
          alert("Password harus memiliki huruf kapital");
        }
      } else {
        alert("Password harus mempunyai angka");
      }
    } else {
      alert("Password tidak boleh ada spasi");
    }
  } else {
    alert("Password harus 8 character");
  }
  data_form.reset();
}
