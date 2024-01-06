<!DOCTYPE html>
<html>
<head>
	<title>Halaman admin - www.malasngoding.com</title>
    <style>
		*{
			/* display: flex;
			justify-content: center; */
			margin: 0;
			padding: 0;
		}
        .banner-area {
        text-align: center;
        font-family: sans-serif;
        color: black;
        font-size: 1em;
		padding: 40px 0 0 0;
      }
      span {
        color: rgb(255, 221, 0);
      }
		 .kotak .tabel{
			display: flex;
			justify-content: center;
			margin: 10px auto;
			padding: 40px;
		 }
		 .tulisan{
			/* padding: 40px; */
            margin-bottom: 20px;
			text-align: center;
		 }
		 .tulisan p{
			font-size: 2em;
			font-family: sans-serif;
		 }
		 .tulisan p a{
			margin-left: 1em;
			text-decoration: none;
			border: 2px solid black;
			padding: 0 0.2em;
			border-radius: 50%;
			color: black;
		 }
		 .tulisan p a:hover{
			background: #DDE6ED;
			rotate: 90deg;
		 }
         th{
            font-size: 15px;
         }
         tbody{
            font-size: 15px;
            /* font-weight: 700; */
         }
		 tr,td,th{
			padding: 0.9em 7px;
            text-align: center;
		 }
         .bawah{
            color: white;
            background: black;
            width: 100%;
            position: absolute;
            bottom: 0;
            padding: 10px;
            text-align: center;
            font-family: sans-serif;
         }
         .tabel{
            margin: auto;
         }
	</style>
</head>
<body>
	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
	?>
    <div class="banner-area">
      <h2>Halaman Pengurus </h2>
   </div>
<div class="kotak">
  <!-- <div class="tulisan">
	<p>TAMBAH SISWA<a href="tambah_view.html">+</a></p>
 </div> -->
<div class="tabel">
	<table border="1" >
		<tr>
			<th>No</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Age</th>
			<th>Gender</th>
			<th>Address</th>		
			<th>Opsi</th>		
		</tr>
		<?php 
		include "koneksi2.php";
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT * FROM Siswa");
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['first_name']; ?></td>
			<td><?php echo $d['last_name']; ?></td>
			<td><?php echo $d['age']; ?></td>
			<td><?php echo $d['gender']; ?></td>
			<td><?php echo $d['address']; ?></td>
			<td>
				<a href="edit3.php?id=<?php echo $d['id']; ?>">Edit</a>				
			</td>
		</tr>
		<?php } ?>
	</table>
  </div>
</div>
	<div class="bawah">
	<p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b> <a href="logout.php">LOGOUT</a></p>
	
	</div>

</body>
</html>