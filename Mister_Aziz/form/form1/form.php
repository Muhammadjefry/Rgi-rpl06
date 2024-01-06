<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      th,
      td {
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
<form action="" method="POST">
         <!-- --------Nama lengkap----------- -->
            <label for="Nama">Nama :</label>
            <br>
            <input type="text" name="Nama" id ="Nama">
            <br>
            <br>
 
         <!-- ------Tanggal lahir-------- -->
            <label for="Tanggal_Lahir">Tanggal Lahir :</label>
            <br>
            <input type="date" name="Tanggal_Lahir" id="Tanggal_Lahir">
            <br>
            <br>

         <!-- ------Jenis_Kelamin-------- -->
            <label for="Jenis_Kelamin" >Jenis Kelamin :</label>
 <!-- ------Laki-Laki-------- -->
<br>
            <input type="radio" name="Jenis_Kelamin" id="Jenis_Kelamin" value="0"  checked>
            <label for="Jenis_Kelamin">Laki-Laki</label>
          <!-- ------Perempuan-------- -->
<br>
            <input type="radio" name="Jenis_Kelamin" id="Jenis" value="1" >
            <label for="Jenis">Perempuan</label>
            <br>
            <br>
    
         <!-- ------angkatan-------- -->

        <label for="Angkatan">Angkatan :</label>
        <br>
        <input type="number" id="Angkatan" name="Angkatan">
        <br>
        <br>

         <!-- ------Jurusan-------- -->

        <label for="">Jurusan :</label>
        <br>
       <select name="Jurusan" id="Jurusan">
        <option value="0">RPL</option>
        <option value="1">TABUS</option>
        <option value="2">TKJ</option>
       </select>

      <br>
      <br>
        <!-- ------Status------- -->
        <!-- <label for="">Status</label>
        <br>
            <input type="radio" name="status" id="status1" value="0"  >
            <label for="status1">Pending</label>
            <br> -->
            <!-- ------pending------ -->
            <!-- <input type="radio" name="status" id="status2" value="1" >
            <label for="status2">Active</label>
            <br> -->
            <!-- ------Banned------ -->
            <!-- <input type="radio" name="status" id="status3" value="2" >
            <label for="status3">Banned</label> -->
            <br>
            <br>
               <!--Email -->
               <label for="email">Email :</label>
            <br>
            <input type="email" name="email" id ="email" required>
            <br>
            <br>
              <!--Password -->
              <label for="password">Password :</label>
            <br>
            <input type="password" name="password" id ="password" required>
            <br>
            <br>
    <button>Submit</button> | <input type="reset" value="Reset" id="reset">
    </form>
    <br>
    <br>

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
                <!-- <th>Status</th> -->
                <!-- <th>Email</th>
                <th>Password</th> -->
              </tr>
            </thead>
            <tbody id="wadahList">
            </tbody>
          </table>
    <script>
        function reloadList(){
         fetch('List.php', {
                method: 'POST',
                credentials:'same-origin',
            })
            // .then((Response)=>Response.json())
            .then((response)=>response.text())
            .then((data)=>{ 
                document.querySelector('#wadahList').innerHTML = data;
            console.log(data)
        })
            .catch ((error) =>{
                console.log(error);
            })
        }
        reloadList();
        document.querySelector('form').addEventListener('submit', function(e){
            e.preventDefault();
            var aaa = new FormData(e.target);
            fetch('proses.php', {
                method: 'POST',
                credentials:'same-origin',
                body: aaa
            })
            // .then((Response)=>Response.json())
            .then((Response)=>Response.text())
            .then((data)=>{ 
                reloadList();

        document.querySelector('#reset').click();

          var notif = document.querySelector('#notif');
             notif.innerText = data;
          notif.style.display = 'block' ; 
          // setTimeout(() => {  notif.style.display = 'none'; }, 5000);
          //   console.log(data)
        })
            .catch ((error) =>{
                console.log(error);
            })
        })
    </script>
</body>
</html>