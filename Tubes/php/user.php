<?php
session_start();
// Menghubungkan dengan file php lainya
require 'functions.php';
//melakukan query
$items = query("SELECT * FROM items");

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
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet' />

    <!-- script font awesome kit-->
    <script src="https://kit.fontawesome.com/e18581a144.js" crossorigin="anonymous"></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js'></script>



</head>

<body>
    <!-- navbar -->
    <?php include('../tambahanlain/navatasuser.php') ?>
    <style>
        <?php include('../assets/css/slider.css') ?>
    </style>

    <!-- navbar end -->


    <!-- jumbotron show item -->
    <section class="show1 " style="margin-top: 30px !important;">
        <div class="container mt-3 py-2">
            <div class="row">
                <div class="col-lg-6 px-4 py-5 d-flex mobile">
                    <div class="px-4 py-5 mobile tom">
                        <img style="width: 95%" src="../assets/img/2.png" alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="px-4 py-5">
                        <img src="../assets/img/hero1.jpeg" class="py-5 w-100 responsivewidthfull" />
                    </div>
                    <div class="px-4 py-1">

                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut
                            culpa, quisquam iure voluptatem rem sint, aspernatur quo non
                            cupiditate eos excepturi explicabo ipsam optio facere saepe
                            similique dolores aliquid reprehenderit?
                        </p>
                    </div>
                    <div class="px4 py-1 promo">
                        <img src="../assets/img/adidasMU.jpg" alt="" style="width: 50%" />
                        <button style="margin-left: 100px; width: 100px" type="button" class="btn btn-outline-danger loginhp">
                            BUY
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jumbotron end -->
    <section class="aboutPromo">
        <div class="container-fluid
    ">
            <div class="row">
                <div class="col-lg-12 py-3 my-3">
                    <h3 class="text-center">About</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique
                        voluptas dicta at corporis, dolores repellat accusantium rerum
                        fugiat eaque vero adipisci, repellendus iure molestiae
                        necessitatibus numquam a, praesentium fugit! Sed?
                    </p>
                    <!-- carousel slide tampil -->
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-inner mx-auto">
                            <div class="carousel-item active">
                                <img src="../assets/img/hero1.jpeg" alt="" class="d-block w-100 mx-auto" />
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/hero1.jpeg" alt="" class="d-block w-100 mx-auto" />
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/hero1.jpeg" alt="" class="d-block w-100 mx-auto" />
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/hero1.jpeg" alt="" class="d-block w-100 mx-auto" />
                            </div>
                        </div>

                        <!-- carousel tampil button -->

                        <div class="carousel-indicators py-5 turun">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active thumbnail" aria-current="true" aria-label="Slide 1">
                                <img src="../assets/img/hero1.jpeg" class="d-block w-100" alt="..." />
                            </button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="thumbnail" aria-label="Slide 2">
                                <img src="../assets/img/hero1.jpeg" class="d-block w-100" alt="..." />
                            </button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="thumbnail" aria-label="Slide 3">
                                <img src="../assets/img/hero1.jpeg" class="d-block w-100" alt="..." />
                            </button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class="thumbnail" aria-label="Slide 4">
                                <img src="../assets/img/hero1.jpeg" class="d-block w-100" alt="..." />
                            </button>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jumbotron show item end -->

    <!-- card promo item  start-->

    <form id="search-form">
        <input type="text" id="search" name="keywords" placeholder="Cari ">

    </form>
    <section id="cardkatalog" style="background-color:gainsboro ; padding-top:20px">
        <div class="container">
            <div class="row">
                <?php foreach ($items as $brg) : ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 gambarnaik">
                        <div class="card p-1" style="width: 20rem">
                            <a class="text-decoration-none" href="detailuser.php?id=<?= $brg["id"] ?>">
                                <img src="../assets/img/<?= $brg["gambar"]; ?>" alt="foto" style="width: 308px; height: 200px;"></td>
                                <div class="card-body">
                                    <h4>
                                        <?= $brg['nama'] ?> <br />
                                        <br />
                                        <span style="font-size: 13px; color:red;"><?= $brg['detail']; ?></span>
                                    </h4>
                                    <p>Produk Terbaru</p>
                                </div>
                            </a>
                            <div class="card-fasilitas">
                                <h4>Rp. <?= $brg['harga'] ?></h4>
                                <p>&nbsp; Diskon</p>
                                <form method="POST" action="keranjang.php">
                                    <input type="hidden" name="item_id" value="<?= $brg['id'] ?>">
                                    <?php if (isset($brg['kategori_id'])) : ?>
                                        <input type="hidden" name="kategori_id" value="<?= $brg['kategori_id'] ?>">
                                    <?php endif; ?>
                                    <button type="submit" name="tambah_keranjang" class="btn btn-primary">Tambahkan ke Keranjang</button>
                                </form>

                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- card promo item end -->



    <!-- card promo item end -->





    <section>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 text-dark">
                    <h1>lokasi kami</h1>
                    <p>Untuk lebih lanjut, bisa datang ke lokasi kami.</p>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div id="map" style="width: 600px; height:200px;
          "></div>
                </div>
            </div>
        </div>
    </section>




    <!-- nav hp -->
    <?php include('../tambahanlain/navbarhp.php') ?>
    <!-- nav hp end -->

    <!-- tawaran start -->
    <section class="bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-12 py-3 d-flex regis">
                    <h1>
                        REGISTER YOUR EMAIL FOR
                        <br />
                        NEWS AND SOCIAL OFFERS
                    </h1>
                    <form class="ms-auto me-3 d-flex">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input class="text-white-50 putinput" type="email" class="form-control" id="exampleInputEmail1" placeholder="Your Email" aria-describedby="emailHelp" />
                        </div>
                        <button type="submit" class="btn btn-dark w-100 h-50 mt-3 p-0 tombol12">
                            <i class="fa-solid fa-arrow-right panahkanan"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- tawaran end -->

    <!-- footer -->
    <?php include('../tambahanlain/futer.php') ?>
    <!-- footer end -->

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/scriptUserLive.js"></script>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoibGlzdmluZGFudSIsImEiOiJjbGkyOWhjc3UwMWFyM2NuejB1b3Z3ODd3In0.tihPfdMfJgp21xhCTku37Q';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v12', // style URL
        center: [107.592096, -6.867794], // starting position [lng, lat]
        zoom: 18, // starting zoom
    });
    // Tambahkan marker
    var marker = new mapboxgl.Marker()
        .setLngLat([107.592096, -6.867794])
        .setPopup(new mapboxgl.Popup().setHTML("<h5>24e HarakujuHues</h5>"))
        .addTo(map);

    var zoomControl = new mapboxgl.NavigationControl();
    map.addControl(zoomControl);

    // Atur tingkat zoom
    map.on('load', function() {
        map.resize(); // Perbarui ukuran peta setelah memuatnya sepenuhnya
        map.flyTo({
            center: [107.592096, -6.867794],
            zoom: 18
        });
    });
</script>
<!-- script bootstrap -->


<script src="https://kit.fontawesome.com/6dd84d01cb.js" crossorigin="anonymous"></script>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>