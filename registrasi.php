<?php
require 'function.php';


// cek tombol registrasi sudah ditekan
// isset(mengembalikan false jika variabel pengujian berisi null)

if( isset ($_POST["register"])) {

    if( register($_POST) > 0 ) {
        echo "<script>
                    alert('berhasil registrasi!');
                    document.location.href = 'login.php';
                </script>";
    } else {
        echo mysqli_error($conn);
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

<h1>Registrasi</h1>
<form action="" method="post">


    <ul>
        <li>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" required>
        </li>
        <li>
            <label for="username"> Username : </label>
            <input type="text" name="username" id="username" required>
        </li>
        <li>
            <label for="password"> Password : </label>
            <input type="password" name="password" id="password" required>
        </li>
        <li>
            <button type="submit" name="register">Registrasi</button>
        </li>
    </ul>


</form>

</body>
</html>