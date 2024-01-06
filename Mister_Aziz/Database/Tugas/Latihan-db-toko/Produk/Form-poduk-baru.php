<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dafta produk baru</title>
    <style>
        *{
            box-sizing: border-box;
        }
     body{
    margin: 0;
    padding: 0;
     }
     form{
        justify-content: center;
  display: flex;
  align-items: center;
  background-image: url(walpaper-pemandangan-tepi-pantai-saat-malam-hari-HD.jpg);
  background-size: cover;
  background-position-x: center;
        
     }
     .kotak{
        width: 30%;
    padding: 30px 60px;
    border-radius: 7px;
    text-align: center;
    background: transparent;
    backdrop-filter: blur(6);
    box-shadow: 0 0 10px 11px rgba(0, 0, 0, 0.6);
    margin: 100px auto;
     }
     label,input,select,option{
        display: block;
        margin-bottom: 2px;
        width: 100%;
        height: 30px;
        border: none;
     }
     input{
margin-bottom: 20px;
        font-size: 18px;
        border-radius: 6px;
        background-color: rgba(255, 255, 255, 0.2);
        border-bottom: 1px solid yellow;
  outline: none;
  color: #fff;
     }
     label{
        margin-bottom: -20px;
       text-align: left;
       color: aqua;
       font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
       font-size: 14px;
     }
.satu{
    display: block;
        margin-bottom: 10px;
        margin-top: 10px;
        width: 100%;
        height: 30px;
}
.satu:hover{
    background-color: red;
    color: #fff;
}
.Bawah {
  width: 100%;
  margin: auto;
  display: flex;
  justify-content: space-between;
}
h2{
    color: #fff;
    font-family: sans-serif;
    margin-bottom: -10px;
    margin-top: -10px;
}

    </style>
</head>

<body>
<form action="proses.php" method="POST" enctype="multipart/form-data">
    <div class="kotak">
        <h2>Login</h2>
       <div class="id">
         <!-- --------id----------- -->
            <label for="id">ID</label>
            <input type="text" name="id" id ="id">
       </div>
       <div class="nama">
         <!-- ------nama-------- -->
            <label for="nama">Nama </label>
            <input type="text" name="nama" id="nama">
        </div>
        <div class="harga">
         <!-- ------harga-------- -->
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga">
        </div>
        <div class="stok">
         <!-- ------stok-------- -->
            <label for="">Stok</label>
            <input type="number" name="stok" id="">
        </div>
        <div class="terjual">
         <!-- ------terjual-------- -->
            <label for="terjual">Terjual</label>
            <input type="number" name="terjual" id="terjual">
        </div>
        <div class="gambar">
         <!-- ------gambar-------- -->
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar">
        </div>

     
         <button class="satu">Login</button>
         <div class="Bawah">
            <button type="submit" class="dua">Register</button>
            <button type="reset" class="tiga">Forgot</button>
          </div>
    </div>
</body>
</html>