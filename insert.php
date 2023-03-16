<?php
session_start(); 
if(!isset($_SESSION["login"])){
  header("Location:halamanlogin.php");
  exit;
}
require 'functions.php';
$DataInOnePage=5;
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
    <title>Halaman Edit</title>
    <link rel="stylesheet" href="tugashias.css">
</head>
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
        <a class="nav-link active" href="insert.php">Edit Review</a>
        <a class="nav-link" href="postingan.php">Cek Postingan</a>
      </div>
    </div>
    <a class="btn btn-danger" href="logout.php">Logout</a>
  </div>
</nav>
<br>
    <h1>Daftar Post Review</h1>
    
        <br>
            <form action="" method="post">
                <input type="text" name="keyword" size="20" autofocus placeholder="Cari Judul" autocomplete="off">
                <button class="btn btn-dark" type="submit" name="cari">Cari</button>
            </form>
            <br>
            
            <table class="table table-light" border="0" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No.</th>
                    <th>Aksi</th>
                    <th>Judul</th>
                    <th>Studio</th>
                    <th>Genre</th>
                    <th>Rating</th>
                    <th>Review</th>
                </tr>
                <?php $i=1;?>
                <?php foreach($tabel as $row):?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td>
                        <a href="update.php?Judul=<?php echo $row["Judul"]; ?>" class="btn btn-success">Edit</a> |
                        <a href="hapus.php?Judul=<?php echo $row["Judul"];?>" class="btn btn-danger" onclick="return confirm('Judul Akan Dihapus Apakah Anda Yakin?');">Hapus</a>
                    </td>
                    <td><?php echo $row["Judul"];?> </td>
                    <td><?php echo $row["Studio"];?></td>
                    <td><?php echo $row["Genre"];?></td>
                    <td><?php echo $row["Rating"];?></td>
                    <?php $review=substr($row["review"], 0, 20);?>
                    <td><?php echo $review . " ...";?></td>
                </tr>
                    <?php $i++; ?>
                <?php endforeach?>
                
            </table>
    <div class="col-1">
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
    <a href="tambah.php"class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Tambah Review</a></div>
  </div>
            
    </div>
    <br>
</body>
</html>