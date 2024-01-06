<?php 
function jenis($a){
    if($a == 0 ){
       $sy = 'L';
    }elseif($a == 1){
        $sy = 'P';
    }else{
        $sy = 'tumbal...!!';
    }
    return $sy;
}
function kelas($a){
    if($a == 0 ){
       $s = 'RPL';
    }elseif($a == 1){
        $s = 'TABUS';
    }elseif($a == 2){
        $s = 'TKJ';
    }
    return $s;
}
function itungUsia($x){
    $year = (date('Y')- date('Y',strtotime($x)));
    return $year;
}
// function status($a){
//     if($a == 0 ){
//        $s = 'Pending';
//     }elseif($a == 1){
//         $s = 'Active';
//     }elseif($a == 2){
//         $s = 'Banned';
//     }
//     return $s;
// }
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "data_siswa";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM siswa2 ";//pilih semua data  dari tabel siswa2
    $result = $conn->query($sql);//jalankan SQL
    if ($result->num_rows > 0) {//jika lebih dari 0 data
        while($row = $result -> fetch_assoc()){
            $aaa = $row['id'];
            $bbb = $row['name'];
            $ccc = itungUsia($row['tanggalLahir']);
            $ddd = jenis($row['jenisKelamin']);
            $eee = $row['angkatan'];
            $fff = kelas($row['jurusan']);
            // $ggg = 1;
            // $hhh = $row['email'];
            // $iii = $row['password'];

            echo  '<tbody>
            <tr>
              <th>'.$aaa.'</th>
              <th>'.$bbb.'</th>
              <th>'.$ccc.'</th>
              <th>'.$ddd.'</th>
              <th>'.$fff.' - ' .$eee.'</th>
            </tr>
          </tbody>';
        }
        // <th>'.$ggg.'</th>
        // <th>'.$hhh.'</th>
        // <th>'.$iii.'</th>
    } else {//jika data kurang dari satu 
        echo "Tidak ada data..";
    };




    // if ($conn->query($sql) === TRUE) {
    //     echo "New record created successfully";
    //   } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //   }
      
      $conn->close();



?>