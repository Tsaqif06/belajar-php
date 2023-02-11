<?php 
if(isset($_POST["submit"])) {
    if($_POST["nama"] == "admin" && $_POST["password"] == "123") {
        header("Location: ./admin.php");
        exit();
    } else {
        $error = true;
    }
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
    <?php if(isset($error)) :?>
     <h1>Nama dan Password Salah!</h1>
    <?php endif?>
    <ul>
        <form action="" method="POST">
            <li><input type="text" placeholder="nama" name="nama"></li>
            <li><input type="password" placeholder="password" name="password"></li>
            <li><button type="submit" name="submit">Login</button></li>
        </form>
    </ul>
</body>
</html>