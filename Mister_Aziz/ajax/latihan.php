<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tebak Harga</title>
    <style>
        body{
            display: flex;
        }
        .succes{
            color: green;
        }
        .error{
            color: red;
        }
        .kotak{
            box-shadow: 0 0 20px 1px black;
            padding: 10px;
            margin: 20px auto;
            text-align: center;
            border: 1px solid black;
            display: inline-block;
        }
        img{
            box-shadow: 0 0 20px 1px black;
            /* transition: 0.1s; */
        }
        img:hover{
            transform: scale(1.1,1.1);
        }
    </style>
</head>
<body>
<div class="kotak">
<h1>Tebak Harga!</h1>
<h2>Coba tebak harga produk berikut!</h2>

<img src="01-APPLE-8DVPHAPP0-APPMGDX3ID-A-BlackRevSS.jpg" alt="" width="200">
<br>
<br>
<br>

<form action="proses_latihan1.php" id="formulir" method="POST">
    <input type="number" name="harga" min=0>
<br>
<br>
    <button>Submit</button>
</form>
<br>
<div id="notif"></div>
</div>
    

<script>
     document.querySelector('#formulir').addEventListener('submit',function(e){
        e.preventDefault();

        var aaa = new FormData(e.target);
            // aaa.delete('judul');
            // aaa.append('volume', '300m')

            fetch('proses_latihan1.php', {
                method: 'POST',
                credentials:'same-origin',
                body: aaa
            })
            .then((Response)=>Response.json())
            .then((data)=>{
                //--cetak pesan respon ke elemen #notif
                var fff =document.querySelector('#notif');
            if(data.status == 1){
                fff.classList.add('succes');
                fff.classList.remove('error');
            }else{
                fff.classList.add('error');
                fff.classList.remove('succes');
            }
            fff.innerHTML =  data.message;
                // console.log(data.status);
            })
            .catch ((error) =>{
                console.log(error);
            })
    })
 
</script>
</body>
</html>