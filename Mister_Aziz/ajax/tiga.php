<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar pegawai</title>
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
     background-image: url(pngtree-fresh-and-simple-express-logistics-distribution-background-image_451302.jpg);
     background-size: cover;
     background-position-x: center;
     }
     .kotak{
        width: 40%;
    padding: 10px 40px;
    border-radius: 7px;
    text-align: center;
    background-color: rgba(255,255, 255, 0.4);
    backdrop-filter: blur(4px);
    box-shadow: 0 0 7px 3px black;
    margin: 200px ;
     }
     input,select,option{
        display: block;
        margin-bottom: 20px;
        /* width: 100%;
        height: 30px; */
     }
     .jenis_kelamin label, .posisi label{
        color:black;
        font-size: 14px;
     }
     .jenis_kelamin .sasa,   .posisi .sisi{
        color:red;
        font-size: 10px;
     }
     .foto input, .tanggal_bergabung input,.id input,.nama_lengkap input, .nama_panggilan input, .tanggal_lahir input{
        width: 100%;
        height: 30px;
        background: none;
       border: none;
      border-bottom: 1px solid green;
       outline: none;
       color: black;
       font-size: 14px;
     }
     label{
      font-size: 10px;
      display: block;
      text-align: left;
      color: red;
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
.satu1 input, .dua2 input {
    width: none;
    height: none;
}
.posisi{
    display: block;
}
.tiga3 , .empat4 , .lima5 {
    display: flex;
}
h2{
    color: #333;
    font-family: sans-serif;
}
.satu{
    background: none;
    transition: 1s;
}
.satu:hover{
    background-color: red;
}
.dua, .tiga{
  margin-bottom: 10px;
}
    </style>
</head>

<body>
<form action="proses3.php" method="POST" enctype="multipart/form-data" id="kek">
    <div class="kotak">
        <h2>Login</h2>
        <div class="id">
         <!-- -------id-------- -->
            <label for="id">ID</label>
            <input type="text" name="id" id="id">
        </div>
       <div class="nama_lengkap">
         <!-- --------Nama lengkap----------- -->
            <label for="nama_lengkap">Nama lengkap</label>
            <input type="text" name="nama_lengkap" id ="nama_lengkap">
       </div>
       <div class="nama_panggilan">
         <!-- ------Nama Panggilan-------- -->
            <label for="nama_panggilan">Nama Panggilan</label>
            <input type="text" name="nama_panggilan" id="nama_panggilan">
        </div>
        <div class="tanggal_lahir">
         <!-- ------Tanggal lahir-------- -->
            <label for="tanggal_tahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir">
        </div>
        <div class="jenis_kelamin">
         <!-- ------Jenis_Kelamin-------- -->
            <label for="jenis_kelamin" class="sasa">Jenis Kelamin</label>

         <div class="satu1">  
            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="0"  >
            <label for="jenis_kelamin">Laki-Laki</label>
        </div>    
        <div class="dua2">
            <input type="radio" name="jenis_kelamin" id="jenis" value="1" >
            <label for="jenis">Perempuan</label>
        </div>
        </div>
        <div class="posisi">
         <!-- ------posisi-------- -->
            <label for="posisi" class="sisi">Posisi</label>

         <div class="tiga3">  
            <input type="radio" name="posisi" id="posisi0" value="0"  >
            <label for="posisi0">Kasir</label>
         </div>    
         <div class="empat4">
            <input type="radio" name="posisi" id="posisi1" value="1" >
            <label for="posisi1">Driver</label>
         </div>
         <div class="lima5">
            <input type="radio" name="posisi" id="posisi2" value="2" >
            <label for="posisi2">Sales</label>
         </div>
        </div>

        <div class="foto">
       
            <label for="file">Foto</label>
            <input type="file" name="foto" id="file"  >
        </div>

        <div class="tanggal_bergabung">
            <label for="tanggal_bergabung">Tanggal Bergabung</label>
            <input type="date" name="tanggal_bergabung" id="tanggal_bergabung"  >
        </div>

      <button class="satu">Login</button>
         <div class="Bawah">
            <button type="submit" class="dua">Register</button>
            <button type="reset" class="tiga">Forgot password</button>
          </div>
    </div>
    <div id="notif"></div>
</form>

<script>
    document.querySelector('#kek').addEventListener('submit',function(e){
        e.preventDefault();

        var aaa = new FormData(e.target);
            // aaa.delete('judul');
            // aaa.append('volume', '300m')

            fetch('proses3.php', {
                method: 'POST',
                credentials:'same-origin',
                body: aaa
            })
            .then((Response)=>Response.json())
            .then((data)=>{
                //--cetak pesan respon ke elemen #notif
                document.querySelector('#notif').innerText= data.message;
                //---- jika status respon adalah 1, klik elemen #res
                if(data.status == 1 ){
                    document.querySelector('#res').click();
                }
               console.log(data);
            })
            .catch ((error) =>{
                console.log(error);
            })
    })
 
</script>
</body>
</html>