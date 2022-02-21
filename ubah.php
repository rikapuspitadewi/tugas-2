<?php
require 'function.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah dtekan apa belum
if (isset($_POST["submit"])) {


    // cek apakah data berhasil di ubah atau tidak
    if ( ubah($_POST) > 0) {
        echo "
                <script>
                    alert('update success!');
                     document.location.href = 'index.php';
                </script>

            ";
    } else {
        echo "
                <script>
                    alert('failed to update!');
                    document.location.href = 'index.php';
                </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data mahasiswa</title>
</head>

<body>
    <h1>Update data mahasiswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <ul>
            <li>
                <label for="nama"> Nama Siswa : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar"required value="<?= $mhs["gambar"]?>">
            </li>
            <li>
                <button type="submit" name="submit">Update Data</button>
            </li>
        </ul>
    </form>

</body>

</html>