<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP Dan MySQLi</title>
    <style>
      .kotak {
        display: flex;
        justify-content: center;
        margin: 7em auto;
        width: 80%;
      }
      .crud {
        text-align: center;
        font-family: sans-serif;
      }
      .crud h3 {
        font-family: monospace;
      }
      .kembali {
        margin-top: 50px;
        text-align: center;
        flex: 50%;
      }
      .kembali a {
        text-decoration: none;
        color: black;
        font-size: 2em;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
          "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
      }
      .form {
        flex: 50%;
        padding: 20px;
      }
    </style>
</head>
<body>
<div class="crud">
      <h2>CRUD DATA MAHASISWA</h2>
      <h3>EDIT DATA MAHASISWA</h3>
</div>
  <div class="kotak">
      <div class="kembali">
        <a href="index.php">&#8592; Kembali</a>
      </div>
    <div class="form">
	<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
			<table>
				<tr>			
					<td>Nama</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="text" name="nama" value="<?php echo $d['nama']; ?>">
					</td>
				</tr>
				<tr>
					<td>NIM</td>
					<td><input type="number" name="nim" value="<?php echo $d['nim']; ?>"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><input type="text" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN"></td>
				</tr>		
			</table>
		</form>
		<?php 
	}
	?>
   </div>
</div>
</body>
</html>