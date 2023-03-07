<?php
//Array multidimensi
$binatang = [['🐈‍⬛', 'hitam'], ['🐬', 'biru'], ['🐣', 'kuning']]
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hayday 2.0</title>
</head>

<body>
    <h2>Daftar binatang</h2>
    <ul>
        <?php for ($i = 0; $i < count($binatang); $i++) { ?>
            <li><?= $binatang[$i][0]; ?> - <?= $binatang[$i][1]; ?></li>
        <?php } ?>
    </ul>
</body>

</html>