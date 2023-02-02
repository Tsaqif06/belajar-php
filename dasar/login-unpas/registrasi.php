<?php 
require './functions.php';

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Register');
            </script>
        ";
        header("Location: ./index.php");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <form action="" method="post">
        <h1>Halaman Registrasi</h1>
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><label for="password2">Konfirmasi Password</label></td>
                <td><input type="password" name="password2" id="password2"></td>
            </tr>
        </table>
        <br>
        <button type="submit" name="register" id="register">Register</button>
        <p>Sudah Punya Akun? <a href="./login.php">Login</a></p>
    </form>
</body>
</html>