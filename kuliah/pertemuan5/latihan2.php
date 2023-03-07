<?php
$binatang = ['🐈‍⬛', '🐐', '🦖', '🐧', '🐬', '🐑'];
$warna = ['Hitam', 'Coklat', 'Hijau', 'Hitam putih', 'Biru', 'Putih'];

// Mengurutkan array
// sort(), rsort()
sort($warna)

// mencettak array untuk user
//  for, foreach
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hay day</title>
</head>

<body>
    <h2>Daftar binatang</h2>
    <ul>
        <?php for ($i = 0; $i < count($binatang); $i++) { ?>
            <li><?= $binatang[$i]; ?>, <?= $warna[$i] ?></li>
        <?php } ?>
    </ul>
    <h2>Daftar warna</h2>
    <ul>
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <li><?= $warna[$i]; ?></li>
        <?php } ?>
    </ul>


    <hr>
    <h2>Daftar binatang</h2>
    <ol>
        <?php foreach ($binatang as $b) { ?>
            <li><?= $b; ?></li>
        <?php } ?>
    </ol>

    <h2>Daftar warna</h2>
    <ol>
        <?php foreach ($warna as $w) { ?>
            <li><?= $w; ?></li>
        <?php } ?>
    </ol>

</body>

</html>