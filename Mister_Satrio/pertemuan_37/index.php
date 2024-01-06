<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi</title>
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
		padding: 40px;
      }
      span {
        color: rgb(255, 221, 0);
      }
		 .kotak{
			display: flex;
			justify-content: center;
			margin: 2em auto;
			padding: 40px;
		 }
		 .tulisan{
			padding: 40px;
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
		 tr,td,th{
			padding: 0.9em;
		 }
	</style>
</head>
<body>
<div class="banner-area">
      <h2>DATA <span class="type"></span></h2>
</div>
<div class="kotak">
	<div class="tulisan">
	<p>TAMBAH MAHASISWA<a href="tambah_view.html">+</a></p>
	</div>
	<div class="tabel">
	<table border="1" >
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>NIM</th>
			<th>Alamat</th>
			<th>Opsi</th>		
		</tr>
		<?php 
		include "koneksi.php";
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['nim']; ?></td>
			<td><?php echo $d['alamat']; ?></td>
			<td>
				<a href="edit.php?id=<?php echo $d['id']; ?>">Edit</a> |
				<a href="hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>					
			</td>
		</tr>
		<?php } ?>
	</table>
	</div>
	
	</div>
	<script src="assets/typed.js"></script>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script>
      var typed = new Typed(".type", {
        strings: ["Santri RGI 29"],
        typeSpeed: 160,
        backSpeed: 160,
        loop: true,
      });
    </script>
</body>
</html>