<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mesin Login Logout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <p id="status_terbang"></p>
    <!-- jika user sudah login, Teks adalah "Logout "
 jika user Belum  login, Teks adalah "Login" -->
    <button>Tekan</button>
    <br>
    <br>
    <div id="notif"></div>
    <script>
        document.querySelector("button").addEventListener("click",function(e){
    fetch( 'proses.php', {
        method: 'POST',
        credentials: 'same-origin',
    } )
    // .then((response) => response.json())
    .then((response) => response.text())
    .then((data) => {
        document.querySelector("#notif").innerText=data;
        
        console.log(data);
    })
    .catch((error) => {
        console.log(error);
    })
});
      
        
    </script>
</body>
</html>