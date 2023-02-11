<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ./login.php");
    exit;
}
require './functions.php';

// pagination
// konfigurasi pagination
$jumlahDataPerHalaman = 4;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["hal"])) ?  $_GET["hal"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

// jika tombol cari di submit
if (isset($_POST["cari"])) {
    $cari = $_POST["keyword"];
    $_SESSION["cari"] = $cari;
    $mahasiswa = cari($cari);
} else {
    @$cari = $_SESSION["cari"];
    $mahasiswa = cari($cari);
}

if (isset($_POST["reset"])) {
    session_unset();
    // session_destroy();
    header("Refresh: 0");
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

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pagination > table tr td {
            padding: 10px;
        }

        .pagination a {
            text-decoration: none;
            color: black;
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
        <button type="submit" name="reset">Reset!</button>
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
            <td><?= $i + $awalData?></td>
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
    <br>
    <div class="pagination">
        <table>
            <tr>
                <?php if ($halamanAktif > 1) : ?>
                    <td><a href="?hal=<?= $halamanAktif - 1 ?>">&laquo</a></td>
                <?php endif;?>
                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                    <?php if ($i == $halamanAktif) : ?>
                        <td style="background-color: black;">
                            <a href="?hal=<?= $i?>"
                               style="color: white; font-weight: bolder; text-decoration: underline;">
                                <?= $i?>
                            </a>
                        </td>
                    <?php else : ?>
                        <td><a href="?hal=<?= $i?>""><?= $i?></a></td>
                    <?php endif;?>
                <?php endfor;?>
                <?php if ($halamanAktif < $jumlahHalaman) : ?>
                    <td><a href="?hal=<?= $halamanAktif + 1 ?>">&raquo</a></td>
                <?php endif;?>
            </tr>
        </table>
    </div>

    <script>
        const logout = document.querySelector('#logout');
        logout.addEventListener('click', () => {
            location.href = './logout.php';
        });
    </script>
</body>
</html>