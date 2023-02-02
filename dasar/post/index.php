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
    if (isset($_POST["submit"])) : ?>
        <h1>Selamat Datang, <?= $_POST["nama"] ?></h1>
    <?php endif?>
    <form action="" method="POST">
        <label for="nama">Masukkan Nama : </label>
        <input type="text" id="nama" name="nama">
        <br/>
        <input type="submit" name="submit">
    </form>
</body>
</html>