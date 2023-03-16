<?php 
session_start(); 
if(!isset($_SESSION["login"])){
  header("Location:halamanlogin.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="tugashias.css">
</head>
<style>
  body { background-image: url(bg3.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;}
  
</style>
<body>
  <br>
  <div class="row">
  <div class="col-1"></div>
    <div class="col-10">
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">RiNime</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        <a class="nav-link" href="insert.php">Edit Review</a>
        <a class="nav-link" href="postingan.php">Cek Postingan</a>
      </div>
    </div>
    <a class="btn btn-danger" href="logout.php">Logout</a>
  </div>
</nav>
<br>
    <h1>Selamat Datang <?php echo$_SESSION["nama"];?></h1>
    <hr>
  <br>
  <h2>Silahkan Memilih Menu Pekerjaan Anda</h2>
  <br>
  <div class="card">
  <div class="card-header">
    Menu Edit Review
  </div>
  <div class="card-body">
    <h5 class="card-title">Review</h5>
    <p class="card-text">Silahkan Melakukan Edit disini</p>
    <a href="insert.php" class="btn btn-primary">Pergi Ke Menu Edit</a>
  </div>
</div>
<br>
<div class="card">
  <div class="card-header">
    Menu Cek Postingan
  </div>
  <div class="card-body">
    <h5 class="card-title">Cek Postingan</h5>
    <p class="card-text">Menuju Laman Postingan Yang telah diinput</p>
    <a href="postingan.php" class="btn btn-primary">Pergi Ke Cek Postingan</a>
  </div>
</div>
  </div>
  
<div class="col-1"></div>
    </div>
</body>
</html>