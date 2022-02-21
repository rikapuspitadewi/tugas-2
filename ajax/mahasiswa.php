<?php

require '../function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa
                 WHERE
        nama LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%'
        ";  
$mahasiswa = query($query);
?>

<table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach( $mahasiswa as $row ) : ?>

        <tr>
            <td><?= $i; ?></td>
            <td>
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