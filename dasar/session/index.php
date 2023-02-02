<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ./login.php");
    exit;
}
require './functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// jika tombol cari di submit
if(isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Database</title>
    <style>
        table, tr, th, td {
            border-collapse: collapse;
            padding: 15px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <button id="logout">Logout</button>
    <h1>Daftar Mahasiswa</h1>
    <a href="./tambah.php">Tambah Data</a>
    <br><br><br>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" placeholder="Cari disini..." autofocus autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>
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
                <a href="./ubah.php?id=<?= $row["id"]?>">ubah</a> |
                <a href="./hapus.php?id=<?= $row["id"]?>" onclick="return confirm('Yakin?');">hapus</a>
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

    <script>
        const logout = document.querySelector('#logout');
        logout.addEventListener('click', () => {
            location.href = './logout.php';
        });
    </script>
</body>
</html>