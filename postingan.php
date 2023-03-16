<?php
session_start(); 
if(!isset($_SESSION["login"])){
  header("Location:halamanlogin.php");
  exit;
}
require 'functions.php';
$DataInOnePage=4;
$totaldata=count(query("SELECT * FROM daftars"));
$totalhal = ceil($totaldata/$DataInOnePage);
$aktif=(isset($_GET["halaman"])) ? $_GET["halaman"] :1;
$awal =($DataInOnePage *$aktif)-$DataInOnePage;

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
    <title>Home</title>
</head>
<style>
        .row1 {
  position: relative;
  top: 30%;
}
.col2-1{
    position: relative;
  left: 25%;
} 
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
        <a class="nav-link" aria-current="page" href="home.php">Home</a>
        <a class="nav-link" href="insert.php">Edit Review</a>
        <a class="nav-link active" href="postingan.php">Cek Postingan</a>
      </div>
    </div>
    <a class="btn btn-danger" href="logout.php">Logout</a>
  </div>
</nav>

<br>
    <h1><center>Daftar Post Review</center></h1>
    <hr>
    <br>
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
        </center>

    <div class="col2-1">
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="?halaman=<?php if($aktif==1){echo $aktif;} else{echo $aktif-1;}?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($i=1;$i<=$totalhal;$i++) : ?>
      <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i;?>"><?php echo $i;?></a></li>
            <?php endfor; ?>
    <li class="page-item">
      <a class="page-link" href="?halaman=<?php if($aktif==$totalhal){echo $aktif;} else{echo $aktif+1;}?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
            <br>
            

    </div>
    </div>
  </div>
            
    </div>
    <br>
</body>
</html>