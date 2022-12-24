<?php 
if ( !isset($_GET["nama"]) ||
     !isset($_GET["kelas"]) ||
     !isset($_GET["umur"]) ||
     !isset($_GET["alamat"])
    ) {
    header("Location: ./index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Detail Siswa</h1>
    <ul>
        <li>Nama : <?= $_GET["nama"] ?></li>
        <li>Kelas : <?= $_GET["kelas"] ?></li>
        <li>Umur : <?= $_GET["umur"] ?></li>
        <li>Alamat : <?= $_GET["alamat"] ?></li>
    </ul>
    <br/>
    <a href="./index.php">Kembali</a>
</body>
</html>