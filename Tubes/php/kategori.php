<?php
require 'functions.php';

// Ambil kategori yang dipilih dari parameter URL
$kategoriValue = $_GET['kategori'];

// Query untuk mendapatkan data berdasarkan kategori
$query = "SELECT * FROM items WHERE kategori = '$kategoriValue'";
$kategori = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="assets/icon/—Pngtree—samurai mask japanese general warrior_6570760.png">
    <title>wibu</title>
    <!-- css bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100" rel="stylesheet" />
    <!-- cssku -->
    <link rel="stylesheet" href="../assets/css/navbwah.css" />
    <link rel="stylesheet" href="../assets/css/slider.css" />

    <!-- script font awesome kit-->
    <script src="https://kit.fontawesome.com/e18581a144.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('../tambahanlain/navkategori.php') ?>
    <!-- Navbar -->

    <style>
        <?php include('../assets/css/slider.css') ?>
    </style>
    <!-- Navbar end -->
    <h1>Kategori <?php echo $kategoriValue; ?></h1>
    <section id="cardkatalog" style="background-color:gainsboro ; padding-top:100px">
        <div class="container">
            <div class="row">
                <?php foreach ($kategori as $kategori) : ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-5 gambarnaik">
                        <a class="text-decoration-none" style="padding:0px !important; width:0px !important;" href="detailitem.php?id=<?= $kategori["id"] ?>">
                            <div class="card p-1" style="width: 20rem">

                                <img src="../assets/img/<?= $kategori['gambar'] ?>" alt="" style="width: 100; height: 200px;" />
                                <div class="card-body">
                                    <h4>
                                        <?= $kategori['nama'] ?> <br />
                                        <br />
                                        <span style="font-size: 13px; color:red;"><?= $kategori['detail']; ?></span>
                                    </h4>
                                    <p>Produk Terbaru</p>
                                    <div class="card-fasilitas">
                                        <h4>Rp.<?= $kategori['harga'] ?></h4>
                                        <p>&nbsp; Diskon</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($kategori)) : ?>
                    <p>Tidak ada data yang ditemukan.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <?php include('../tambahanlain/endfooteronly.php') ?>
    <?php include('../tambahanlain/navbarhp.php') ?>
</body>

</html>