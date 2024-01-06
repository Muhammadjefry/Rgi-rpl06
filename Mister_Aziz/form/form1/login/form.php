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
    <?php 
    echo $_COOKIE['data_nis'];
    ?>
  
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
