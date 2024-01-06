<?php 
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
    $username = $_POST['email'];
    $password =md5($_POST['password']);
// WHERE status=1 ORDER BY id DESC LIMIT 5 status=1 AND
    $sql = "SELECT * FROM siswa2 WHERE  email='$username' ";//pilih semua data  dari tabel siswa2
    $result = $conn->query($sql);//jalankan SQL
    if ($result->num_rows > 0) {//jika lebih dari 0 data
        while($row = $result -> fetch_assoc()){//lopp data data tersebut
            if($row['password'] == $password){
                // data cocok, izinkan login dengan menyimpen user id ke dalam $_COOKIE['data_nis] dengan durasi 1 jam
              setcookie(
                'data_nis',
                $row['id'],
                time() + 3600,
                '/'
              );
              setcookie(
                'nama-siswa',
                $row['nama'],
                time() + 3600,
                '/'
              );
              

              echo 'Login Berhasil. ';
            }
        }
      
    } else {//jika data kurang dari satu 
        echo "Email dan passwod tidak cocok.";
    };




    // if ($conn->query($sql) === TRUE) {
    //     echo "New record created successfully";
    //   } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //   }
      
      $conn->close();



?>

<!-- // $aaa = $row['id'];
            // $bbb = $row['name'];
            // $ccc = itungUsia($row['tanggalLahir']);
            // $ddd = jenis($row['jenisKelamin']);
            // $eee = $row['angkatan'];
            // $fff = kelas($row['jurusan']);
            // $ggg = 1;
            // $hhh = $row['email'];
            // $iii = $row['password'];

        //     echo  '<tbody>
        //     <tr>
        //       <th>'.$aaa.'</th>
        //       <th>'.$bbb.'</th>
        //       <th>'.$ccc.'</th>
        //       <th>'.$ddd.'</th>
        //       <th>'.$fff.' - ' .$eee.'</th>
        //     </tr>
        //   </tbody>';
        // <th>'.$ggg.'</th>
        // <th>'.$hhh.'</th>
        // <th>'.$iii.'</th> -->