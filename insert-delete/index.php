<?php
require './functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        table, tr, th, td {
            border-collapse: collapse;
            padding: 15px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="./tambah.php">Tambah Data</a>
    <br><br>
    <table>
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1;?>
        <?php foreach($mahasiswa as $row) :?>
        <tr>
            <td><?= $i?></td>
            <td>
                <a href="">ubah</a> |
                <a href="./hapus.php?id=<?=$row["id"]?>" onclick="return confirm('Yakin?');">hapus</a>
            </td>
            <td><img src="./img/<?= $row["gambar"]?>" width="65"></td>
            <td><?= $row["nrp"]?></td>
            <td><?= $row["nama"]?></td>
            <td><?= $row["email"]?></td>
            <td><?= $row["jurusan"]?></td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
    </table>
</body>
</html>