<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: ./index.php");
    exit;
}
require './functions.php';
if (isset($_POST["login"]))  {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            header("Location: ./index.php");
            exit;
        } else {
            $errorPw = true;
        }
    } else {
        $errorNm = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <?php if (isset($errorPw)) :?>
        <p style="color: red;">Password Salah!</p>
    <?php endif ?>
    <?php if (isset($errorNm)) :?>
        <p style="color: red;">Akun Tidak Ditemukan!</p>
    <?php endif ?>
    <form action="" method="post">
    <table>
        <tr>
            <td><label for="username">Username</label></td>
            <td><input type="text" name="username" id="username"></td>
        </tr>
        <tr>
            <td><label for="password">Password</label></td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
    </table>
    <br>
    <button type="submit" name="login" id="login">Login</button>
    <p>Belum Punya Akun? <a href="./registrasi.php">Registrasi</a></p>
    </form>
</body>
</html>