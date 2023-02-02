<?php
$siswa = [
    [
        "nama" => "Ahmad Tsaqif Al Arifin",
        "kelas" => 10,
        "umur" => 16,
        "alamat" => "Wajak"
    ],
    [
        "nama" => "Ahmad Naufal Al Faiz",
        "kelas" => 5,
        "umur" => 11,
        "alamat" => "Wajak"
    ]
];
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
    <h1>Data Siswa</h1>
    <ul>
        <?php foreach ($siswa as $ssw) : ?>
            <li>
                <a href="./detail.php?nama=<?= $ssw["nama"] ?>&kelas=<?= $ssw["kelas"] ?>&umur=<?= $ssw["umur"] ?>&alamat=<?= $ssw["alamat"]?>"><?= $ssw["nama"]; ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</body>

</html>