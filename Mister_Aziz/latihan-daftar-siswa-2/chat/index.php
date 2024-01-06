<?php require_once('../functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatto</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        :root {
  --text-color: #fff;
  --bg-color: #1b1f24;
  --second-bg-color: #22282f;
  --main-color: #13bbff;
  --other-color: #c3cad5;

  --h1-font: 4.5rem;
  --h2-font: 2.9rem;
  --p-font: 1rem;

}
.kita{
    padding: 10px;
}
body {

    margin: 0;
    font-family: arial;
    color: #eee;
    background: #222;
}
ul {
  display: flex;
  flex-direction: column-reverse;
  list-style: none;
  margin: 0;
  padding: 0;
}
/*
li.uxxx{
    text-align: right;
}
*/
li {
    padding: 8px 16px;
}
li:nth-child(even) {
    background: #ffffff10;
}
li + li {
    border-bottom: 1px solid #eee;
}
span {
    font-size: 12px;
}

#form {
    position: sticky;
    bottom: 0;
    border-top: 4px double #eee;
    padding: 10px;
}

.profile_chat{
   position: relative;
   top: 15px;
    border-radius: 30px;
    width: 40px;
    height: 40px;
}
input{
    height: 50px;
    width: 93%;
    border-radius: 30px;
    margin-right: 15px;
    padding-left: 15px;
    font-size: 20px;
}
/* input:focus{
    background: transparent;
  color: var(--main-color);
  border: 2px solid var(--main-color);
  transition: all 0.5s ease;
  color: var(--main-color);
  box-shadow: 0 0 20px var(--main-color);
} */
/* button{
    position: absolute;
    right:  15px;
    top: 25px;
    font-size: 50px;
    background: transparent;
    border: none;
} */
.bxs-microphone{
    
    text-align: center;
    position: absolute;
    right:  25px;
    top:30px;
    width: 50px;
    height: 50px;
    line-height: 50px;
    font-size: 40px;
    border-radius: 50%;
    background: green;
    border: none;
}
/* button:hover{
    border: none;
    background: transparent;
  color: var(--main-color);
  transition: all 0.5s ease;
  color: var(--main-color);
  box-shadow: 0 0 20px var(--main-color);
} */
.fixed{
    position: sticky;
    top: 0;
    width: 100%;
    height: 70px;
   background-color: green;
   padding: 0;
   margin: 0;
   z-index: 3;
}
/* .bxs-right-arrow{
    top: 10px;
    font-size: 40px;
    position: absolute;
    right: 85px;
} */
.bx-left-arrow-alt{
 
    font-size: 40px;
    position: absolute;
    top: 15px;
    left: 10px;
    z-index: 5;
    color: white;
}
.kotak img{
    position: absolute;
    top: 10px;
    left: 60px;
    z-index: 5;
    border-radius: 50%;
    height: 50px;
    width: 50px;
}
p{
    font-size: 25px;
    position: absolute;
    top: -5px;
    left: 120px;
    z-index: 5;
    border-radius: 50%;
}
.bxs-video{
    font-size: 40px;
    position: absolute;
    top: 10px;
    right: 150px;
    z-index: 5;
    color: white;
}
.bx-dots-vertical{
    font-size: 40px;
    position: absolute;
    top: 10px;
    right: 25px;
    z-index: 5;
    color: white;
}
.bxs-phone{
    font-size: 40px;
    position: absolute;
    top: 10px;
    right: 80px;
    z-index: 5;
    color: white;
}
    </style>
</head>
<body>
 <div class="fixed"><i class='bx bx-left-arrow-alt'></i><div class="kotak"><img src="https://i.pinimg.com/originals/c0/f6/64/c0f664bca7d668884f54db0fd7bd3dfa.gif" alt=""><p>Mhmmad jefry</p><i class='bx bxs-video'></i><i class='bx bx-dots-vertical'></i></div><i class='bx bxs-phone'></i></div>   
<div id="chat"></div>
<div id="form">
<div class="kita">
<?php if( isset($_COOKIE['data_nis']) ) { ?>
</div>
   
    <form>
   
        <input type="text" name="pesan" placeholder=" 😄 " class="pesan">
        <!-- <button><i class='bx bxs-right-arrow'></i></button> -->
        <div class="mic"><i class='bx bxs-microphone'></i></div>
    </form>
    <?php } else { echo 'Anda perlu login untuk menulis pesan.'; } ?>
</div>

<script>
function reloadList() {
    fetch( 'chat.php', {
        method: 'POST',
        credentials: 'same-origin'
    } )
    // .then((response) => response.json())
    .then((response) => response.text())
    .then((data) => {
        document.querySelector('#chat').innerHTML = data;
        // console.log(data);
    })
    .catch((error) => {
        console.log(error);
    });
}

// load chat untuk pertama kali
reloadList();

// reload chat setiap 5 detik
setInterval(function () {
	reloadList();
}, 5000);


document.querySelector('form').addEventListener('submit',function(e){
    e.preventDefault();

    var aaa = new FormData(e.target);
    fetch( 'proses.php', {
        method: 'POST',
        credentials: 'same-origin',
        body: aaa
    } )
    // .then((response) => response.json())
    .then((response) => response.text())
    .then((data) => {
        // reload chat setelah submit pesan
        reloadList();

        // kosongkan kolom pesan
        document.querySelector('input').value = '';

        // console.log(data);
    })
    .catch((error) => {
        console.log(error);
    })
});


document.body.addEventListener("mousemove", function (event) {
//   posisi mouse
//     console.log(event.clientY);
//   ukuran browser
//     console.log(window.innerWidth);
  const xPost = Math.round((event.clientX / window.innerWidth) * 255);

  const yPost = Math.round((event.clientY / window.innerHeight) * 255);

  document.body.style.backgroundColor = "rgb(" + xPost + "," + yPost + ",100)";
});

</script>

</body>
</html>