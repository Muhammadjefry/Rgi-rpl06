<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form login</title>
    <style>
        *{
            box-sizing: border-box;
        }
body{
    margin: 0;
    padding: 0;
}
form{
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url(pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg);
    background-size: cover;
    padding: 130px ;
}
label{
    text-align: left;
    color: red;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
input{
    height: 30px;
    margin-bottom: 40px;
    color: white;
   outline: none;
   border-inline: none;
   background: none;
   border-top: 4px white;
}
label, input{
    display: block;

}
.kotak{
    background-color: aqua;
    padding: 10px 40px;
    border-radius: 7px;
    text-align: center;
    background: transparent;
    backdrop-filter: blur(10);
    box-shadow: 0 0 7px 7px rgba(0, 0, 0, 0.6);
}
h2{
    font-family: sans-serif;
    color: white;
}
button{
    margin-bottom: 40px;
    width: 90%;
    height: 30px;
    outline: none;
    background: none;
}
button:hover{
    background: white;
    color: #000;
}
button:focus{
    background-color: red;
    color: black;
}
    </style>
</head>
<body>
 <form action="proses.php" method="POST">
    <div class="kotak">
        <h2>Login</h2>
       <div class="email">
         <!-- --------Email----------- -->
            <label for="email">Email</label>
            <input type="text" name="email" id ="email">
       </div>
       <div class="password">
         <!-- -------password-------- -->
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

         <button>Kirim</button>
    </div>
    </form>
</body>
</html>