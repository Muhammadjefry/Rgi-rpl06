<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
     background-image: url(pngtree-abstract-modern-neon-frame-background-picture-image_1178251.png);
     background-size: cover;
     background-position-x: center;
     }
     .kotak{
        width: 30%;
    padding: 10px 40px;
    border-radius: 7px;
    text-align: center;
    background: transparent;
    backdrop-filter: blur(10);
    box-shadow: 0 0 7px 7px white;
    margin: 200px ;
     }
     input,select,option{
        display: block;
        margin-bottom: 20px;
        /* width: 100%;
        height: 30px; */
     }
     .Nama_Lengkap input, .Nama_Panggilan input, .Tanggal_Lahir input, .Angkatan input, .Jurusan select{
        width: 100%;
        height: 30px;
        background: none;
  border: none;
  border-bottom: 1px solid yellow;
  outline: none;
  color: #fff;
     }
     label{
        display: block;
        text-align: left;
    color: aqua;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    margin-bottom: 2px;
     }
     /* .Jenis_Kelamin .satu{
        display: block;
     } */
     .satu{
    display: block;
        margin-bottom: 20px;
        width: 100%;
        height: 30px;
}
.Bawah {
  width: 100%;
  margin: auto;
  display: flex;
  justify-content: space-between;
}
.satu1, .dua2{
    display: flex;
}
.satu1 input, .dua2 input{
    width: none;
    height: none;
}

h2{
    color: #fff;
    font-family: sans-serif;
}
    </style>
</head>

<body>
<form action="proses.php" method="POST">
    <div class="kotak">
        <h2>Login</h2>
       <div class="Nama_Lengkap">
         <!-- --------Nama lengkap----------- -->
            <label for="Nama_Lengkap">Nama lengkap</label>
            <input type="text" name="Nama_Lengkap" id ="Nama_Lengkap">
       </div>
       <div class="Nama_Panggilan">
         <!-- ------Nama Panggilan-------- -->
            <label for="Nama_Panggilan">Nama Panggilan</label>
            <input type="text" name="Nama_Panggilan" id="Nama_Panggilan">
        </div>
        <div class="Tanggal_Lahir">
         <!-- ------Tanggal lahir-------- -->
            <label for="Tanggal_Lahir">Tanggal Lahir</label>
            <input type="date" name="Tanggal_Lahir" id="Tanggal_Lahir">
        </div>
        <div class="Jenis_Kelamin">
         <!-- ------Jenis_Kelamin-------- -->
            <label for="Jenis_Kelamin" >Jenis Kelamin</label>

         <div class="satu1">  
            <input type="radio" name="Jenis_Kelamin" id="Jenis_Kelamin" value="0"  >
            <label for="Jenis_Kelamin">Laki-Laki</label>
        </div>    
        <div class="dua2">
            <input type="radio" name="Jenis_Kelamin" id="Jenis" value="1" >
            <label for="Jenis">Perempuan</label>
        </div>
        </div>
        <div class="Angkatan">
        <label for="Angkatan">Angkatan</label>
        <input type="number" id="Angkatan" name="Angkatan">
         </div>

        <div class="Jurusan">
        <label for="">Jurusan</label>
       <select name="Jurusan" id="Jurusan">
        <option value="0">RPL</option>
        <option value="1">TABUS</option>
        <option value="2">TKJ</option>
       </select>
      </div>
     
     
      <button class="satu">Login</button>
         <div class="Bawah">
            <button type="submit" class="dua">Register</button>
            <button type="reset" class="tiga">Forgot password</button>
          </div>
    </div>
</body>
</html>