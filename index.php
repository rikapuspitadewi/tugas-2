<?php
// sebelum melakukan $_SESSION harus menjalankan session_start()
session_start();


// jika user belum melakukan login tidak di izinkan untuk kehalaman tampilan
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'function.php';

// ASC kecil ke besar
// DESC besar ke kecil
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari di tekan
if( isset($_POST["search"]) ) {
    $mahasiswa = search($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        .loader {
            width: 100px;
            position:absolute;
            top: 118px;
            left: 220px;
            z-index: -1;
            display: none;
        }
        @media print{
            .logout,.tambah,.form-cari,.aksi    {
                display: none;
            }
        }
    </style>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>

   <form action="" method="post" class="form-cari">

        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="search" id="tombol-search">Search</button>

        <img src="img/loader.gif" class="loader">

   </form>
   <br>
    <div id="container">
   <br>
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th class="aksi">Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach( $mahasiswa as $row ) : ?>

        <tr>
            <td><?= $i; ?></td>
            <td class="aksi">
                <a href="ubah.php?id=<?= $row["id"]; ?>">edit</a> |
                <a href="hapus.php?id= <?= $row["id"]; ?>" onclick="return confirm('are you sure?');"> hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"]; ?>" width="60"></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach;?>
    </table>
    </div>
    <br>
    <a href="tambah.php" class="tambah">Tambah data mahasiswa</a>
    <br><br>
    <a href="logout.php" class="logout">Logout</a>
</body>
</html>