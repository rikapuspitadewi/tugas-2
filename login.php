<?php
session_start();
require 'function.php';

// cek cookie jika ada berarti masih login
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    // jika ada cek nama cookie = id, value = key
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // mengambil username berdasarkan id.
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek apakah cookie dan username sama
    if(  $key === hash('sha256', $row['username']) ) {
        // jika benar buat session
        $_SESSION['login'] = true;
    }

    }



// jika session ada pindahkan ke tampilan
if( isset ($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}




// cek tombol login sudah ditekan
// isset(mengembalikan false jika variabel pengujian berisi null)

if( isset ($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    // mysqli_num_rows() [menghitung ada berapa baris yang dikembalikan dari fungsi SELECT]
    if( mysqli_num_rows($cek) === 1 ) {

        // cek password
        // mysqli_fetch_assoc [mengembalikan nilai berupa associative]
        // password_verify [cek sebuah string sama tidak dengan hash nya]

        // row menyimpan data user login
        $row = mysqli_fetch_assoc($cek);
        if( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if( isset($_POST['remember']) ) {
                // buat cookie
                // exp. 1 menit
                // mengambil data user (id dan username)
                // username => enkripsi menggunakan hash
                // cookie cek username

                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);

            }

            header("Location: index.php");
            exit;
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>

<h1>Halaman Login</h1>
<form action="" method="post">


    <ul>
        <li>
            <label for="username"> Username : </label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password"> Password : </label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember" id="remember">
        </li>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>


</form>

</body>
</html>