<?php $arr = [3, 16, 38, 3, 23, 12, 10, "test"] ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .kotak {
            width: 100px;
            height: 100px;
            background-color: salmon;
            display: inline-block;
            text-align: center;
            line-height: 100px;
        }
    </style>
</head>

<body>
    <?php foreach ($arr as $a) : ?>
        <div class="kotak"><?= $a; ?></div>
    <?php endforeach ?>
</body>

</html>