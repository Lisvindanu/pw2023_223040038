<?php 
$a = 38;
$b = 5;
$c = 2;
$d = 75;
$e = 20;
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
    <p> Aku adalah angka <b><?php echo $a?></b></p>
    <p> Jika aku dikali <?php echo $b ?>, maka aku sekarang menjadi <b><?php echo $a*$b ?></b></p>
    <p> Jika aku dibagi <?php echo $c ?>, maka aku sekarang menjadi <b><?php echo $a/$c ?></b></p>
    <p> Jika aku ditambah <?php echo $d ?>, maka aku sekarang menjadi <b><?php echo $a+$d ?></b></p>
    <p> Jika aku dikurang <?php echo $e ?>, maka aku sekarang menjadi <b><?php echo $a-$e ?></b></p>
</body>
</html>