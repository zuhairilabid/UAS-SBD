<?php
session_start();
include "Service/database.php";

if(!isset($_SESSION['Login'])){
    header("location: login.php");
}

$nama_pengirims = $_SESSION['Login']['nama_pengirim'];
$passwords = $_SESSION['Login']['password'];

include "service/database.php";

if(isset($_POST["register"])){
  $nama_pengirim = $_POST['nama_pengirim'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['no_telepon'];

  $sql = "UPDATE Pengirim SET password = '$password', nama_pengirim = '$nama_pengirim', alamat_pengirim = '$alamat', telp_pengirim = '$telepon' WHERE nama_pengirim = '$nama_pengirims' AND password = '$passwords'";

  $db->begin_transaction();
  
  if(!$nama_pengirim==null){
    if($db->query($sql)===TRUE){
        header("location: login.php");
        $db->commit();
    }
    else{
        echo "<p style='color:red;'>Input data ke database gagal.</p>";
        $db->rollback();
    }
  }
  else {
    header("location: edit.php");
  }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="Box.css">
  <title>Edit Profil</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Edit Profil</p>
    <form class="form1" action="edit.php" method="POST">
      <input class="un " type="text" align="center" placeholder="Username" name="nama_pengirim">
      <input class="pass" type="password" align="center" placeholder="Password" name="password">
      <input class="un " type="text" align="center" placeholder="Alamat" name="alamat">
      <input class="un " type="text" align="center" placeholder="No Telp." name="no_telepon">
      <button class="submit2" align="left" name="register">Konfirmasi</button>


  </div>

</body>

</html>