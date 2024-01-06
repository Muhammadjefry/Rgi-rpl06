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

    <button>Submit</button> | <input type="reset" value="Reset" id="reset">
</form>

<p id="notif"></p>

<script>
document.querySelector('form').addEventListener('submit',function(e){
    e.preventDefault();

    var aaa = new FormData(e.target);
    fetch( 'proses-login.php', {
        method: 'POST',
        credentials: 'same-origin',
        body: aaa
    } )
    // .then((response) => response.json())
    .then((response) => response.text())
    .then((data) => {
        // sukses
        var notif = document.querySelector('#notif');
        notif.innerText = data;
        notif.style.display = 'block';
        setTimeout(() => {  notif.style.display = 'none'; }, 5000);
        
        console.log(data);
    })
    .catch((error) => {
        console.log(error);
    })
});
</script>
    
</body>
</html>