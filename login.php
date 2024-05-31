<?php
session_start();

include "service/database.php";

if(isset($_POST["login"])){
  $nama_pengirim = $_POST["nama_pengirim"];

  $password = $_POST["password"];

  $sql = "SELECT * FROM pengirim WHERE nama_pengirim ='$nama_pengirim' AND password = '$password'";

  $result = mysqli_query($db, $sql);

  if($result->num_rows > 0){
    $_SESSION['Login']=array();
    $_SESSION['Login']['nama_pengirim']=$nama_pengirim;
    $_SESSION['Login']['password']=$password;

    header("location: dashboard.php");

  }else{
    echo "<p style='color:red;'>Username atau Password anda salah.</p>";
  }

}

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="Lstyle.css">
  <title>Log in</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Log in</p>
    <form class="form1" action="login.php" method="POST">
      <input class="un " type="text" align="center" placeholder="Username" name="nama_pengirim">
      <input class="pass" type="password" align="center" placeholder="Password" name="password">
      <button class="submit" align="center" name="login">Log in</button>
      <p class="forgot" align="center"><a href="register.php">Don't have account? Sign up</p>


  </div>

</body>

</html>