<?php 
session_start(); 
if(!isset($_SESSION["login"])){
  header("Location:halamanlogin.php");
  exit;
}
require 'functions.php';
$link = mysqli_connect("localhost","root","","anime");

$judul=$_GET["Judul"];

$tampil = query("SELECT * FROM daftars WHERE Judul='$judul'")[0];   

$DataInOnePage=3;
$totaldata=count(query("SELECT * FROM daftars"));
$totalhal = ceil($totaldata/$DataInOnePage);
$aktif=(isset($_GET["halaman"])) ? $_GET["halaman"] :1;
$awal =rand(0,8);

$tabel=query("SELECT * FROM daftars LIMIT $awal,$DataInOnePage");
if(isset($_POST["cari"])){
    $tabel=cari($_POST["keyword"]);
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?php echo "Review ".$judul; ?></title>
</head>
<style>
    body {
        background-image: url(bg5.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
    .kotak{
        position: relative;
        border-radius: 5px;
    height: 190px;
    width: 230px;
    background-color: black;
    left: 45%;
    }
    p{
        color:whitesmoke;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    .isi{
        color:black;
    }
    .konten{
        position:relative;
        top:5%;
        right:0%
    }
    .garis {
        position: fixed;
  border-right: 4px solid lightblue;
  height: 650px;
  top: 10%;
  right:24%
}
</style>
<body>
  <br>
  <div class="container-fluid">
  <div class="row">
  <h1><center>Cek Postingan</center></h1>
  <hr>
  <br>
    <div class="col">
    <div class="review">
      <br><br>
      <div class="kotak">
        <br>
        <div class="container-fluid">
                <p>Judul : <?php echo $tampil["Judul"];?> </p>
                <p>Studio : <?php echo $tampil["Studio"];?> </p>
                <p>Genre : <?php echo $tampil["Genre"];?> </p>
                <p>Rating : <?php echo $tampil["Rating"];?> </p>
                   
            </div>
            <br>
            </div>
            <br>

        </div>
    </div>
    <div class="col-6">
    
        <div class="konten">
        <div class="container-fluid">
        <div class="row">
        <h3>Review : </h3>
         <p class="isi"><?php echo $tampil["review"];?></p>
         </div> 
        </div>
        </div>
    </div>
    <div class="garis"></div>
    <div class="col">
    <div class="container-fluid">
        Lihat Postingan Lain :
        <hr>
        <center>
                <?php $i=1;?>
                <?php foreach($tabel as $row):?>
                            <div class="row1">
                <div class="col-sm-6">
                    <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["Judul"];?></h5>
                        <p class="card-text">Rating : <?php echo $row["Rating"];?></p>
                        <a href="tampil.php?Judul=<?php echo $row["Judul"]; ?>" class="btn btn-primary">Lihat Postingan</a>
                    </div>
                    </div>
                </div>
            </div>
            <br>
            <?php $i++; ?>
                <?php endforeach?>
                <hr>
                <br>
                <a href="postingan.php" class="btn btn-primary">Pergi Ke Cek Postingan</a>
                <a href="update.php?Judul=<?php echo $tampil["Judul"]; ?>" class="btn btn-success">Edit Postingan</a>
        </center>
    
    </div>
  </div>
</div>
</div>
</body>
</html>

