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
      <h3>EDIT DATA SISWA</h3>
</div>
  <div class="kotak">
      <div class="kembali">
        <a href="index.php">&#8592; Kembali</a>
      </div>
    <div class="form">
	<?php
	include 'koneksi2.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"SELECT * FROM Siswa WHERE id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update3.php">
			<table>
				<tr>			
					<td>First Name</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="text" name="first_name" value="<?php echo $d['first_name']; ?>">
					</td>
				</tr>
				<tr>
          <td>Last Name</td>
					<td><input type="text" name="last_name" value="<?php echo $d['last_name']; ?>"></td>
				</tr>
				<tr>
					<td>Age</td>
					<td><input type="text" name="age" value="<?php echo $d['age']; ?>"></td>
				</tr>
        <tr>
					<td>Gender</td>
					<td><input type="text" name="gender" value="<?php echo $d['gender']; ?>"></td>
				</tr>
        <tr>
					<td>Address</td>
					<td><input type="text" name="address" value="<?php echo $d['address']; ?>"></td>
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