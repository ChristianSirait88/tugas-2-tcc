<?php 
session_start();
if (isset($_SESSION["login"])) {
    header('Location:insert.php');
    exit;
}
require 'functions.php';
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cek=mysqli_query($link,"SELECT * FROM admin WHERE username = '$username'");
    //var_dump(mysqli_num_rows($cek));
    if(mysqli_num_rows($cek) === 1){
        $cekpass=mysqli_fetch_assoc($cek);
        // var_dump($cekpass["password"]);
        // var_dump($password);
        // var_dump(md5($password)==$cekpass["password"]);
        // var_dump(password_verify($password,$cekpass['password']));
        if(md5($password)==$cekpass["password"]){
            $_SESSION["login"]=true;
            $_SESSION["nama"]=$username;
            header("Location:home.php");
            exit;
        }
        else {
            echo "<script>
            alert('Password Salah');
            </script>";
        }
    }
    else {
        echo "<script>
            alert('Username Salah');
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
</head>
<style>
    .login {
  position: fixed;
  top: 25%;
  left: 30%;
  margin-top: -50px;
  margin-left: -100px;
  background-color: rgba(255, 255, 255, 0.7);
}
body{
    background-image:url(carousel2.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
</style>
<body>
    <div class="login">
    <div class="container-fluid">
    <div class="jumbotron">
        <h1 class="display-4">Login</h1>
        <p class="lead"><strong> Halo Admin, Selamat datang di website review silahkan login sesuai dengan username dan password</strong></p>
        <hr class="my-4">
        <p>Jika anda admin baru silahkan registrasi dengan mengklik tombol dibawah</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="registrasi.php" role="button">Registrasi</a>
        </p>
        </div>
        <hr>
        <form action="" method="post">
        <div class="row">
        <div class="mb-4">
                <label for="username" class="form-label">Username</label>
               <input type="text" class="form-control" id="username" placeholder="" name="username">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
               <input type="password" class="form-control" id="password" placeholder="" name="password">
               <input type="checkbox" onclick="lihatpassword()">Show Password
            </div>
            <div class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>
                </div>
        </form>
    </div>
    </div>
</body>
<script>
    function lihatpassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</html>