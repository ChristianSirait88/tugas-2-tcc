<?php
session_start(); 
if(!isset($_SESSION["login"])){
  header("Location:halamanlogin.php");
  exit;
}
require 'functions.php';
$link = mysqli_connect("localhost","root","","anime");
if(isset($_POST["submit"])){
    if(tambah($_POST) >= 0){
        echo "<script>
        alert('Data Berhasi ditambah');
        document.location.href='insert.php';
        </script>"
        ;
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
    <title>Tambah Data Review</title>
</head>
<style>
        body {
        background-image: url(bg4.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
</style>
<body>
    
    <div class="container-fluid">
        <br>
        <h1><center>Tambah Data Review</center></h1>
    <hr style="width:100%">
    
        <div class="row">
        <div class="col-3">

</div>
            <div class="col-5">
            <form action="" method="POST">
            <div class="mb-4">
                <label for="Judul" class="form-label">Judul</label>
               <input type="text" class="form-control" id="Judul" placeholder="" name="Judul">
            </div>
            <div class="mb-4">
                <label for="Studio" class="form-label">Studio</label>
               <input type="text" class="form-control" id="Studio" placeholder="" name="Studio">
            </div>
            <div class="mb-4">
                <label for="Genre" class="form-label">Genre</label>
               <input type="text" class="form-control" id="Genre" placeholder="" name="Genre" >
            </div>
            <div class="mb-4">
                <label for="Rating" class="form-label">Rating</label>
               <input type="number" class="form-control" id="Rating" placeholder="" name="Rating" min="0" max="100">
            </div>
            <div class="mb-4">
                    <label for="review" class="col-sm-2 col-form-label">Review</label>
                    <textarea name="review" class="form-control" id="review" cols="50" rows="3"></textarea>
                </div>
            <br>
        <button type="submit" class="btn btn-success" name="submit">Input Data</button>
        <a href="insert.php" class="btn btn-primary">Kembali</a>
            
    </form>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
</body>
</html>