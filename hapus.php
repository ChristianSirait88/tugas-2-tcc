<?php 
session_start(); 
if(!isset($_SESSION["login"])){
  header("Location:halamanlogin.php");
  exit;
}
require 'functions.php';
$hapus = $_GET["Judul"];

if (hapus($hapus)>0){
    echo "<script>
    alert('data Berhasil di hapus');
    document.location.href='insert.php';
    </script>
    ";
}
else{
echo "<script>
    alert('data Gagal di hapus');
    document.location.href='insert.php';
    </script>
    ";
}

?>