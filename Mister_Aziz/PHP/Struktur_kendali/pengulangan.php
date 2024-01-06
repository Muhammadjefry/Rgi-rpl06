<?php 
// for
for($i = 0; $i < 10; $i++){
    echo 'Ini for <br>';
}

// while 
$i = 0;
while( $i < 5){
    echo 'Ini while <br>';
    $i++;
}
// do
do{
    echo 'Ini do while <br>';
    $i++;
}while($i < 5);

echo '<br>'; 

$x = 10;
if($x < 20){
    echo "benar ini if kurang dari 20";
}else{
    echo "salah";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
   <?php 
   for($i = 1; $i <= 3;$i++){
        echo '<tr>';
        for($j = 1; $j <= 5;$j++){
            echo "<td>$i,$j</td>";
       }
       echo '</tr>';
   }
   
   ?>

    </table>
</body>
</html>