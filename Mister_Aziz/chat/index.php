<?php require_once('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatto</title>
    <style>
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
li.u<?php echo userid(); ?>{
    text-align: right;
}
li {
    padding: 8px 16px;
}
li + li {
    border-bottom: 1px solid #eee;
}

#form {
    border-top: 4px double #eee;
    padding: 10px;
}
    </style>
</head>
<body>
    
<div id="chat"></div>
<div id="form">
    <form>
        <textarea name="pesan" placeholder="Say something..."></textarea>
        <button>Send</button>
    </form>
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
        document.querySelector('textarea').value = '';

        // console.log(data);
    })
    .catch((error) => {
        console.log(error);
    })
});
</script>

</body>
</html>