<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
    <h1>Data Siswa</h1>
    <?php foreach ($siswa as $ssw) :?>
    <ul>
        <li>Nama : <?= $ssw["nama"]?></li>
        <li>Kelas : <?= $ssw["kelas"]?></li>
        <li>Umur : <?= $ssw["umur"]?></li>
        <li>Alamat : <?= $ssw["alamat"]?></li>
    </ul>
    <?php endforeach;?>
</body>
</html>