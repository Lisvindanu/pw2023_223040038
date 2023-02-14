<?php
$nama = "Lisvindanu";
$mata_kuliah = "Pemrograman web"; //snake_case
// $mataKuliahUmum // camelCase
// $MataKuliahUmum //PascalCase
// -Mata-Kuliah-Umum // Kebab-case
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 2</title>
</head>
<body>
   <h1>
    <?php echo "Hello, $nama "; ?>
   </h1> 
   <p> <?php echo $mata_kuliah; ?> </p>
   <p> <?php echo "Halo, nama saya $nama, saya sedang kuliah ''$mata_kuliah''   " ?></p>
   <p>Halo, nama saya <?php echo $nama ?>, saya sedang kuliah "<?php echo $mata_kuliah  ?>" </p>
   <p><? echo 'halo, nama saya da\'nu, saya sedang kuliah "pemrograman web"'?></p>
</body>
</html>