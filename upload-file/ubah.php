<?php
require './functions.php';

// ambil data URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek tombol submit ditekan atau tidak
$submitted = false;
if(isset($_POST["submit"])) {

    // cek apakah data berhasil atau tidak
    if(ubah($_POST) > 0) {
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
    <title>Ubah Data</title>
    <style>
        input[type='file'] {
            color: transparent;
        }
    </style>
</head>
<body>
    <h1>Ubah Data</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?= $mhs["id"]?>">
        <table>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama" value="<?= $mhs["nama"]?>" required></td>
            </tr>
            <tr>
                <td><label for="nrp">NRP</label></td>
                <td><input type="text" id="nrp" name="nrp" value="<?= $mhs["nrp"]?>" required></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" id="email" name="email" value="<?= $mhs["email"]?>" required></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan</label></td>
                <td><input type="text" id="jurusan" name="jurusan" value="<?= $mhs["jurusan"]?>" required></td>
            </tr>
            <tr>
                <td colspan="2"><img src="./img/<?= $mhs["gambar"]?>" alt="<?= $mhs["gambar"]?>" width="50"></td>
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
            echo "Updated✅";
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