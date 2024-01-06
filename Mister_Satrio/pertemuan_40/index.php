<!DOCTYPE html>
<html>

<head>
    <title>Login Pendaftaran Siswa</title>
    <link rel="stylesheet" href="assets/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="teks">
        <h1>Register Here !!!</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo perferendis labore animi minima voluptate amet
            distinctio tempore ut aperiam corporis? Hic saepe, voluptatum fugiat cum libero asperiores qui temporibus
            optio?Illo perferendis labore animi minima voluptate amet distinctio tempore ut asperiores qui temporibus
            optio?
            voluptatum fugiat cum libero asperiores qui temporibus optio?Illo perferendis labore animi minima voluptate
            amet distinctio tempore ut asperiores qui temporibus optio?
            asperiores qui temporibus optio?Illo perferendis labore animi minima voluptate amet distinctio tempore ut
            asperiores qui temporibus optio?
        </p>

        <button>Register</button>
        <div class="icon">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-linkedin"></i></a>
        </div>
    </div>
    <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>

    <div class="kotak_login">
        <p class="tulisan_login">Login Here!</p>

        <form action="cek_login.php" method="post">
            <div class="form">
                <label>Username</label>
                <input type="text" name="username" class="form_login" placeholder="Username .." required="required">
            </div>
            <div class="form">
                <label>Password</label>
                <input type="password" name="password" class="form_login" placeholder="Password .." required="required">
            </div>
            <div class="check">
                <input type="checkbox">
                <label for="">Remember me</label>
            </div>

            <input type="submit" class="tombol_login" value="LOGIN">
        </form>

    </div>


</body>

</html>