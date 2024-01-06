<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .succes{
            color: green;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>
     <form id="formulir" action="">
             <label for="">Label Buku</label>
            <input type="text" value="" name="judul">
            <br>
            <button type="submit">Kirim</button>
    </form>
    <br>
    <div id="cetak-jawaban"></div>
    <script>
        document.querySelector('#formulir').addEventListener('submit', function(e){
            e.preventDefault();
            var aaa = new FormData(e.target);
            // aaa.delete('judul');
            // aaa.append('volume', '300m')

            fetch('proses2.php', {
                method: 'POST',
                credentials:'same-origin',
                body: aaa
            })
            .then((Response)=>Response.json())
            .then((data)=>{
                var fff =document.querySelector('#cetak-jawaban');
            if(data.status == 1){
                fff.classList.add('succes');
                fff.classList.remove('error');
            }else{
                fff.classList.add('error');
                fff.classList.remove('succes');
            }
            fff.innerHTML = data.pesan;
                // console.log(data.status);
            })
            .catch((error)=>{
                console.log(error);
               } )
        });
    </script>
</body>
</html>