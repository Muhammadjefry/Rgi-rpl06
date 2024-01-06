<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap"
      rel="stylesheet"
    />
    <style>

    </style>
  </head>
  <body>
    <h1>Chat Me Here...!!!</h1>
    <div class="d"></div>
    <br />
    <div id="wadah"></div>
    <form action="">
      <textarea name="pesan" id="" cols="" rows="2"></textarea>
      <button>Submit</button>
    </form>
    <script>
      function reloadList() {
        fetch("pesan.php", {
          method: "POST",
          credentials: "same-origin",
        })
          // .then((Response)=>Response.json())
          .then((response) => response.text())
          .then((data) => {
            document.querySelector("#wadah").innerHTML = data;
            console.log(data);
          })
          .catch((error) => {
            console.log(error);
          });
      }
      reloadList();

      setInterval(function () {
        reloadList();
      }, 2000);

      document.querySelector("form").addEventListener("submit", function (e) {
        e.preventDefault();
        var aaa = new FormData(e.target);
        fetch("proses.php", {
          method: "POST",
          credentials: "same-origin",
          body: aaa,
        })
          // .then((Response)=>Response.json())
          .then((Response) => Response.text())
          .then((data) => {
            reloadList();

            // document.querySelector('#reset').click();

            //   var notif = document.querySelector('#notif');
            //      notif.innerText = data;
            //   notif.style.display = 'block' ;
            //   setTimeout(() => {  notif.style.display = 'none'; }, 5000);
            console.log(data);
          })
          .catch((error) => {
            console.log(error);
          });
      });
    </script>
  </body>
</html>
