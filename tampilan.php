<?php
// sebelum melakukan $_SESSION harus menjalankan session_start()
session_start();

// jika user belum melakukan login tidak di izinkan untuk kehalaman tampilan
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMPILAN</title>
    <style>
        h1 {
        border: 3px solid powderblue ;
        }
    </style>
</head>
<body>
    <center><h1 style="color:red"> WELCOME, FRIEND! </h1></center>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>