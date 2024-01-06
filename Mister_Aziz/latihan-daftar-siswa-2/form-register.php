<?php

$input_1 = '';
$input_2 = date('Y-m-d',strtotime('18 years ago'));
$input_3 = 0;
$input_4 = 0;
$input_5 = 29;
$input_6 = '';
$input_7 = '';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Siswa</title>
    <style>
        body {
            font-family: arial;
            margin: 0;
            padding: 20px;
            color: #eee;
            background: #222;
        }
        table {
            border-collapse: collapse;
        }
        th,td {
            border: 1px solid #ddd;
            padding: 4px 8px;
            text-align: center;
        }
        td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<body>

<form>
    <label for="siswa_nama">Nama</label>
    <br>
    <input type="text" name="siswa_nama" id="siswa_nama" value="<?php echo $input_1; ?>" required>
    <br>
    <br>

    <label for="siswa_bday">Tanggal Lahir</label>
    <br>
    <input type="date" name="siswa_bday" id="siswa_bday" value="<?php echo $input_2; ?>">
    <br>
    <br>

    <label for="siswa_gend">Jenis Kelamin</label>
    <br>
    <select name="siswa_gend" id="siswa_gend">
        <?php
            $options = array(
                array( 0, 'Laki-laki' ),
                array( 1, 'Perempuan' ),
            );
            foreach( $options as $o ) {
                $selected = ( $input_3 == $o[0] ) ? 'selected' : '';
                echo '<option value="'.$o[0].'" '.$selected.'>'.$o[1].'</option>';
            }
        ?>
    </select>
    <br>
    <br>

    <label for="siswa_clas">Kelas</label>
    <br>
    <select name="siswa_clas" id="siswa_clas">
        <?php
            $options = array(
                array( 0, 'RPL' ),
                array( 1, 'TaBus' ),
                array( 2, 'Otomotif' ),
            );
            foreach( $options as $o ) {
                $selected = ( $input_4 == $o[0] ) ? 'selected' : '';
                echo '<option value="'.$o[0].'" '.$selected.'>'.$o[1].'</option>';
            }
        ?>
    </select>
    <br>
    <br>

    <label for="siswa_year">Angkatan</label>
    <br>
    <input type="number" name="siswa_year" id="siswa_year" min=0 value="<?php echo $input_5; ?>" required>
    <br>
    <br>
    <br>
    <br>

    <label for="siswa_mail">Email</label>
    <br>
    <input type="email" name="siswa_mail" id="siswa_mail" value="<?php echo $input_6; ?>" required>
    <br>
    <br>

    <label for="siswa_pass">Password</label>
    <br>
    <input type="password" name="siswa_pass" id="siswa_pass" value="<?php echo $input_7; ?>" required>
    <br>
    <br>
    <br>
    <br>

    <label for="pick">gambar</label>
    <br>
    <input type="text" name="pick" id="pick" value="<?php echo $input_7; ?>" required>
    <br>
    <br>
    <br>
    <br>

    <button>Submit</button> | <input type="reset" value="Reset" id="reset">
</form>

<p id="notif"></p>

<hr>

<table>
    <thead>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>L/P</th>
            <th>Kelas</th>
        </tr>
    </thead>
    <tbody id="wadah_list">

    </tbody>
</table>

<script>
function reloadList() {
    fetch( 'list.php', {
        method: 'POST',
        credentials: 'same-origin'
    } )
    // .then((response) => response.json())
    .then((response) => response.text())
    .then((data) => {
        document.querySelector('#wadah_list').innerHTML = data;
        // console.log(data);
    })
    .catch((error) => {
        console.log(error);
    });
}

reloadList();


document.querySelector('form').addEventListener('submit',function(e){
    e.preventDefault();

    var aaa = new FormData(e.target);
    fetch( 'proses-register.php', {
        method: 'POST',
        credentials: 'same-origin',
        body: aaa
    } )
    // .then((response) => response.json())
    .then((response) => response.text())
    .then((data) => {
        reloadList();

        document.querySelector('#reset').click();

        var notif = document.querySelector('#notif');
        notif.innerText = data;
        notif.style.display = 'block';
        setTimeout(() => {  notif.style.display = 'none'; }, 5000);

        // console.log(data);
    })
    .catch((error) => {
        console.log(error);
    })
});
</script>
    
</body>
</html>