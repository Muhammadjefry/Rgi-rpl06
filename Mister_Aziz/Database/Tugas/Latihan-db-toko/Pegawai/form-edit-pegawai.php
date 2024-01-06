<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit pegawai</title>
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
     background-image: url(64c7971813e4d9e4f8cceb73c3218795.jpg);
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
     /* .satu{
    display: block;
        margin-bottom: 20px;
        width: 100%;
        height: 30px;
} */
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
/* .satu{
    background: none;
    transition: 1s;
}
.satu:hover{
    background-color: red;
}
.dua, .tiga{
  margin-bottom: 10px;
} */
.jk{
    text-align: left;
}
.jk input{
    display: inline-block;
}
.jk label{
    display: inline-block;
}
    </style>
</head>
<!-- ubah id dari form Dan url-->
<body>
    <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Latihan-db-toko";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //-------ASC = Ascending / Naik 
    //-------DES = Descending / turun
    $apu=$_GET['url'];
    $sql = "SELECT * FROM Pegawai WHERE id=$apu";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
        $opa = $row['nama_lengkap'];
        $opi = $row['nama_panggilan'];
        $opu = $row['tanggal_lahir'];
        $ope = $row['jenis_kelamin'];
        $opo =$row['posisi'];
        $api = $row['tanggal_bergabung'];
    }
    }
    
    ?>
<form action="proses3.php" method="POST" enctype="multipart/form-data" >
    <div class="kotak">
        <h2>Login</h2>
        <div class="id">
         <!-- -------id-------- -->
            <label for="id">ID</label>
            <input type="number" name="id" id="id"
            value="<?php echo $apu ?>">
        </div>
       <div class="nama_lengkap">
         <!-- --------Nama lengkap----------- -->
            <label for="nama_lengkap">Nama lengkap</label>
            <input type="text" name="nama_lengkap" id ="nama_lengkap"
            value="<?php echo $opa ?>">
       
             
       </div>
       <div class="nama_panggilan">
         <!-- ------Nama Panggilan-------- -->
            <label for="nama_panggilan">Nama Panggilan</label>
            <input type="text" name="nama_panggilan" id="nama_panggilan"
            value="<?php echo $opi ?>">
        </div>
        <div class="tanggal_lahir">
         <!-- ------Tanggal lahir-------- -->
            <label for="tanggal_tahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
            value="<?php echo $opu ?>">
        </div>
        <div class="jenis_kelamin">
         <!-- ------Jenis_Kelamin-------- -->
            <label for="jenis_kelamin" class="sasa">Jenis Kelamin</label>
<?php
$opsi_jenis_kelamin = array(
    array(0,'Pria'),
    array(1,'Wanita'),
);
foreach ($opsi_jenis_kelamin as $ojk) {
    if( $ojk[0]== $ope){
        echo '<div class="jk">  
        <input type="radio" name="jenis_kelamin" id="jenis_kelamin_'.$ojk[0].'" value="'.$ojk[0].'" checked >
        <label for="jenis_kelamin_'.$ojk[0].'">'.$ojk[1].'</label>
    </div>';
    }else{
        echo '<div class="jk">  
        <input type="radio" name="jenis_kelamin" id="jenis_kelamin_'.$ojk[0].'" value="'.$ojk[0].'" >
        <label for="jenis_kelamin_'.$ojk[0].'">'.$ojk[1].'</label>
        </div>';
    }
}
?>
        </div>
        <div class="posisi">
         <!-- ------posisi-------- -->
            <label for="posisi" class="sisi">Posisi</label>
            <?php
$opsi_posisi = array(
    array(0,'Kasir'),
    array(1,'Driver'),
    array(2,'Sales'),
);
foreach ($opsi_posisi as $pos) {
    if( $pos[0]== $opo){
        echo '<div class="jk">  
        <input type="radio" name="posisi" id="posisi'.$pos[0].'" value="'.$pos[0].'" checked >
        <label for="posisi'.$pos[0].'">'.$pos[1].'</label>
    </div>';
    }else{
        echo '<div class="jk">  
        <input type="radio" name="posisi" id="posisi'.$pos[0].'" value="'.$pos[0].'" >
        <label for="posisi'.$pos[0].'">'.$pos[1].'</label>
        </div>';
    }
}
// ?>
        <div class="foto">
       
            <label for="file">Foto</label>
            <input type="file" name="foto" id="file"  >
        </div>
        <div class="tanggal_bergabung">
        
            <label for="tanggal_bergabung">Tanggal Bergabung</label>
            <input type="date" name="tanggal_bergabung" id="tanggal_bergabung"  
            value="<?php echo $api ?>">
        </div>
     
     
      <button class="satu">Login</button>
         <div class="Bawah">
            <button type="submit" class="dua">Register</button>
            <button type="reset" class="tiga">Forgot password</button>
          </div>
    </div>
</body>
</html>