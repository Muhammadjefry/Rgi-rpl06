<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi</title>
  </head>
  <body>
    <div class="container">
      <h2>FORMULIR PENDAFTARAN MAHASISWA BARU</h2>
      <h3>Tahun Akademik 2021/2023</h3>
    </div>
    <form action="proses-form2.php">
      <label for="">No.Pendaftaran : </label>
      <br />
      <input type="text" name="pendaftaran"/>
      <br />
      <br />
      <label for="">Program Study yang dipilih : </label>
      <br />
      <select name="jurusan">
        <option value="Menejemen S1">Menejemen S1</option>
        <option value="Farmasi S1">Farmasi S1</option>
        <option value="Psikologi S1">Psikologi S1</option>
        <option value="Arsitektur S1">Arsitektur S1</option>
        <option value="Akuntansi S1">Akuntansi S1</option>
        <option value="Pariwisata S1">Pariwisata S1</option>
        <option value="Kedokteran S1">Kedokteran S1</option>
        <option value="Pertanian S1">Pertanian S1</option>
        <option value="Antropologi S1">Antropologi S1</option>
        <option value="Bahasa Arab S1">Bahasa Arab S1</option>
        <option value="Bahasa Inggris S1">Bahasa Inggris S1</option>
      </select>
      <br />
      <br />
      <label for="">Nama Siswa : </label>
      <br />
      <input type="text" name="nama" />
      <br />
      <br />
      <label for="">jenis kelamin : </label>
      <br />
      <input type="radio" name="kelamin" id="pria" />
      <label for="pria">pria</label>
      <input type="radio" name="kelamin" id="wanita" />
      <label for="wanita">wanita</label>
      <br />
      <br />
      <label for="">Tempat lahir : </label>
      <br />
      <input type="text" name="tempat" />
      <br />
      <br />
      <label for="">Tanggal lahir : </label>
      <br />
      <input type="date" name="tanggal" id="" />
      <br />
      <br />
      <label for="">Agama : </label>
      <br />
      <select name="agama" id="">
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Budha">Budha</option>
        <option value="Katolik">Katolik</option>
        <option value="Konghucu">Konghucu</option>
      </select>
      <br />
      <br />
      <label for="">Alamat Lengkap : </label>
      <br />
      <input type="text" name="alamat" id="" />
      <br />
      <br />
      <label for="">No. Telpon : </label>
      <br />
      <input type="text" name="telfon" id="" />
      <br />
      <br />
      <label for="">E-mail : </label>
      <br />
      <input type="text" name="mail" id="" />

      <br /><br />
      <button type="submit">Kirim</button>
      <button type="reset">Reset</button>
    </form>
  </body>
</html>
