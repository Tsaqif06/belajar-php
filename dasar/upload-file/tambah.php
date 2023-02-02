<?php
require './functions.php';

// cek tombol submit ditekan atau tidak
$submitted = false;
if(isset($_POST["submit"])) {

    // cek apakah data berhasil atau tidak
    if(tambah($_POST) > 0) {
        $submitted = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <style>
        input[type='file'] {
            color: transparent;
        }
    </style>
</head>
<body>
    <h1>Tambah Data</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama" required></td>
            </tr>
            <tr>
                <td><label for="nrp">NRP</label></td>
                <td><input type="text" id="nrp" name="nrp" required></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan</label></td>
                <td><input type="text" id="jurusan" name="jurusan" required></td>
            </tr>
            <tr>
                <td><label for="gambar">Gambar</label></td>
                <td><input type="file" id="gambar" name="gambar" accept="image/*" required></td>
            </tr>
        </table>
        <br>
        <button type="submit" id="submit" name="submit">Kirim</button>
        <p>
        <?php
        if($submitted == true) {
            echo "Submitted✅";
        } else if ($submitted == false && isset($_POST['submit'])){
            echo "Error❌";
        }
        ?>
        </p>
        <a href="./index.php">Kembali</a>
    </form>

    <script>
        const inputGambar = document.getElementById('gambar');

        inputGambar.addEventListener('click', () => {
            setTimeout(() => {
                inputGambar.style.color = 'black';
            }, 2000)
        })
    </script>
</body>
</html>