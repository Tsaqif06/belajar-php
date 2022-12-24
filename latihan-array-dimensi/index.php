<?php $arr = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
]; 
?>
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
            float: left;
            margin: 2px;
            display: inline-block;
            text-align: center;
            line-height: 100px;
            transition: .75s;
        }
        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <?php foreach ($arr as $a) : ?>
        <?php foreach ($a as $b) : ?>
            <div class="kotak"><?= $b; ?></div>
        <?php endforeach?>
            <div class="clear"></div>
    <?php endforeach ?>
    <!-- <?php 
    echo $arr[1][1];
    ?> -->
</body>

</html>