<?php
session_start(); 
if(!isset($_SESSION["login"])){
  header("Location:halamanlogin.php");
  exit;
}
require 'functions.php';
$link = mysqli_connect("localhost","root","","anime");

$judul=$_GET["Judul"];

$anim = query("SELECT * FROM daftars WHERE Judul='$judul'")[0];

if(isset($_POST["submit"])){
    
    if(ubah($_POST)>0){
        echo "<script>
        alert('Data Berhasi Diupdate');
        document.location.href='insert.php';
        </script>"
        ;
    }

    else {
        echo "<script>
        alert('Data tidak Berhasil Diupdate');
        document.location.href='insert.php';
        </script>" ;
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
    <title>Document</title>
</head>
<style>
    body {
        background-image: url(bgupdate.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
    h1{
        text-align: center;
        background-color: black;
    }

</style>
<body>
    
    <div class="container-fluid">
        <br>
    <h1 style="color:whitesmoke">Update Data Review</h1>
    <hr style="width:100%">
    
        <div class="row">
        <div class="col-3">

</div>
            <div class="col-5">
            <form action="" method="POST">
            <div class="mb-4">
                <label for="Judul" class="form-label">Judul</label>
               <input type="text" class="form-control" id="Judul" placeholder="" name="Judul" required value="<?php echo $anim["Judul"];?>">
            </div>
            <div class="mb-4">
                <label for="Studio" class="form-label">Studio</label>
               <input type="text" class="form-control" id="Studio" placeholder="" name="Studio" required value="<?php echo $anim["Studio"];?>">
            </div>
            <div class="mb-4">
                <label for="Genre" class="form-label">Genre</label>
               <input type="text" class="form-control" id="Genre" placeholder="" name="Genre" required value="<?php echo $anim["Genre"];?>">
            </div>
            <div class="mb-4">
                <label for="Rating" class="form-label">Rating</label>
               <input type="number" class="form-control" id="Rating" placeholder="" name="Rating" min="0" max="100" required value="<?php echo $anim["Rating"];?>">
            </div>
            <div class="mb-4">
                <label for="review" class="form-label">Review</label>
                <textarea type="text" class="form-control" id="review" placeholder="" name="review" min="0" max="100" rows="3" required value="<?php echo $anim["review"];?>"><?php echo $anim["review"];?></textarea>
            </div>
            <br>
        <button type="submit" class="btn btn-success" name="submit">Ubah Data</button>
        <a href="insert.php" class="btn btn-primary">Kembali</a>   
    </form>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
    
</body>
</html>