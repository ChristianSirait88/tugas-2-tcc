<?php
$link = mysqli_connect("localhost","root","","anime");
function query($query){
    global $link;
    $result = mysqli_query($link, $query);
    $rows=[];
    while($row=mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
 }

 function tambah($data){
    global $link;
    $Judul=htmlspecialchars($data["Judul"]);
    $Studio=htmlspecialchars($data["Studio"]);
    $Genre=htmlspecialchars($data["Genre"]);
    $Rating=htmlspecialchars($data["Rating"]);
    $review=$data["review"];
    $reviews=trim($review);

    $query="INSERT INTO daftars VALUES ('$Judul','$Studio','$Genre','$Rating','$reviews')";
    mysqli_query($link,$query);
 }

 function hapus($hapus){
    global $link;
    mysqli_query($link, "DELETE FROM daftars WHERE Judul = '$hapus'");
    return mysqli_affected_rows($link);
}

function ubah($data){
    global $link;
    $judul=$_GET["Judul"];
    $Judul=htmlspecialchars($data["Judul"]);
    $Studio=htmlspecialchars($data["Studio"]);
    $Genre=htmlspecialchars($data["Genre"]);
    $Rating=htmlspecialchars($data["Rating"]);
    $review=htmlspecialchars($data["review"]);

    $query = "UPDATE daftars SET Judul='$Judul' , Studio='$Studio',Genre='$Genre',Rating='$Rating',review='$review'  WHERE Judul= '$judul' ";
    mysqli_query($link,$query);
    return mysqli_affected_rows($link);
}

function cari($keyword){
    $query = "SELECT * FROM daftars WHERE Judul LIKE '%$keyword%'";
    return query($query);
}

function registrasi($data){
    global $link;
    $username =$data["username"];
    $password = $data["password"];
    $KonfirmasiPass = $data["KonfirmasiPassword"];
    $cek=mysqli_query($link,"SELECT username FROM admin WHERE username = '$username' ");
    if (mysqli_fetch_assoc($cek)) {
        echo "<script>
        alert('Username Telah Terdaftar');
        </script>";
        return false;
    }
    if (strlen($password)<8){
        echo "<script>
        alert('Password Terlalu Lemah, Tambahkan Beberapa Variabel');
        </script>";
        return false;
    }
    if ($password !== $KonfirmasiPass) {
        echo "<script>
        alert('Konfirmasi Password Gagal Harap Mengecek Ulang');
        </script>";
        return false;
    }
    else {
        
    }
    $password=md5($password);
    
    mysqli_query($link,"INSERT INTO admin VALUES('','$username','$password')");
    return mysqli_affected_rows($link);
}
?>
