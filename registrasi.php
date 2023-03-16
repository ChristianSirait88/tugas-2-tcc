<?php 
require 'functions.php';
if(isset($_POST["register"])){
    if (registrasi($_POST)>0){
        echo "<script>
        alert('Admin Berhasil Ditambahkan');
        </script>";
    }
    else {
        echo mysqli_error($link);
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
    <title>Regristasi</title>
</head>
<style>
    body{
    background-image:url(carousel3.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
.registrasi {
  position: fixed;
  top: 25%;
  left: 30%;
  margin-top: -50px;
  margin-left: -100px;
  background-color: rgba(255, 255, 255, 0.8);
}
</style>
<body>
<div class="registrasi">
<div class="container-fluid">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Regristasi</h1>
    <p class="lead">Silahkan Mengisi Data Dibawah ini</p>
  </div>
</div>
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
                <label for="KonfirmasiPassword" class="form-label">Konfirmasi Password</label>
               <input type="password" class="form-control" id="KonfirmasiPassword" placeholder="" name="KonfirmasiPassword">
            </div>
            <div class="mb-4">
            <button class="btn btn-light"type="submit" name="register">Submit</button>
            <a class="btn btn-dark" href="halamanlogin.php">Kembali</a>
            </div>
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