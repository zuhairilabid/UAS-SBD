<?php
    session_start();
    include "Service/database.php";
    
    if(!isset($_SESSION['Login'])){
        header("location: login.php");
    }
    
    $nama_pengirims = $_SESSION['Login']['nama_pengirim'];
    $passwords = $_SESSION['Login']['password'];

    $sqli = "SELECT id_pengirim FROM pengirim WHERE nama_pengirim ='$nama_pengirims' AND password = '$passwords'";

    $res = mysqli_query($db, $sqli);

    if ($res->num_rows > 0) {
         // Fetch the row
        $row = $res->fetch_assoc();
  
         // Step 4: Store the Result in a PHP Variable
         $id_pengirim = (int)$row['id_pengirim']-1; // Cast to integer if necessary
    } 
    
    include "service/database.php";
    

    $sql = "DELETE FROM Pengirim WHERE nama_pengirim = '$nama_pengirims' AND password = '$passwords'";

    $sqlc = "ALTER TABLE Pengirim AUTO_INCREMENT $id_pengirim";
    
    if($db->query($sql)===TRUE){
        $db->query($sqlc);
        header("location: index.php");
    }
    else{
        echo "<p style='color:red;'>Penghapusan gagal.</p>";
    }
    
?>