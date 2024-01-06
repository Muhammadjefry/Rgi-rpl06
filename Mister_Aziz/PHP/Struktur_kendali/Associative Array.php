<?php 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <style>
    .kotak{
        width: 30px;
        height: 30px;
        background-color: aqua;
        text-align: center;
        line-height: 30px;
        margin: 3px;
        float: left;
        transition: 1s;
    }
    .kotak:hover{
        transform: rotate(180deg);
        border-radius: 50%;
    }
    .clear{
        clear: both;
    }
 </style>
</head>
<body>
<?php 
$nomor = [[1,2,3],[4,5,6],[7,8,9]];
?>
<?php foreach($nomor as $x) : ?>
        <?php foreach( $x as $b ) : ?>
            <div class="kotak"><?= $b; ?></div>
        <?php endforeach; ?>
        <div class="clear"></div>
<?php endforeach; ?>
    <?php 
    echo '<br>';
    $angka = [1,2,3,4,5,6,7,8,9];
    ?>
    <?php foreach($angka as $x) : ?>
    <div class="kotak"><?= $x ?></div>
    <div class="clear"></div>
    <?php endforeach; ?>
</body>
</html>