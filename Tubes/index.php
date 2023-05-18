<?php
session_start();
// Menghubungkan dengan file php lainya
require 'php/functions.php';
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
  <link rel="stylesheet" href="./assets/css/navbwah.css" />
  <link rel="stylesheet" href="./assets/css/slider.css" />

  <!-- script font awesome kit-->
  <script src="https://kit.fontawesome.com/e18581a144.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- navbar -->
  <?php include('./tambahanlain/navatas.php') ?>
  <style>
    <?php include('./assets/css/slider.css') ?>
  </style>

  <!-- navbar end -->


  <!-- jumbotron show item -->
  <section class="show1 " style="margin-top: 30px !important;">
    <div class="container mt-3 py-2">
      <div class="row">
        <div class="col-lg-6 px-4 py-5 d-flex mobile">
          <div class="px-4 py-5 mobile tom">
            <img style="width: 95%" src="./assets/img/2.png" alt="" />
          </div>
        </div>
        <div class="col-lg-6">
          <div class="px-4 py-5">
            <img src="./assets/img/hero1.jpeg" class="py-5 w-100 responsivewidthfull" />
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
            <img src="./assets/img/adidasMU.jpg" alt="" style="width: 50%" />
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
                <img src="./assets/img/hero1.jpeg" alt="" class="d-block w-100 mx-auto" />
              </div>
              <div class="carousel-item">
                <img src="./assets/img/hero1.jpeg" alt="" class="d-block w-100 mx-auto" />
              </div>
              <div class="carousel-item">
                <img src="./assets/img/hero1.jpeg" alt="" class="d-block w-100 mx-auto" />
              </div>
              <div class="carousel-item">
                <img src="./assets/img/hero1.jpeg" alt="" class="d-block w-100 mx-auto" />
              </div>
            </div>

            <!-- carousel tampil button -->

            <div class="carousel-indicators py-5 turun">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active thumbnail" aria-current="true" aria-label="Slide 1">
                <img src="./assets/img/hero1.jpeg" class="d-block w-100" alt="..." />
              </button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="thumbnail" aria-label="Slide 2">
                <img src="./assets/img/hero1.jpeg" class="d-block w-100" alt="..." />
              </button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="thumbnail" aria-label="Slide 3">
                <img src="./assets/img/hero1.jpeg" class="d-block w-100" alt="..." />
              </button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class="thumbnail" aria-label="Slide 4">
                <img src="./assets/img/hero1.jpeg" class="d-block w-100" alt="..." />
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
  <section id="cardkatalog" style="background-color:gainsboro ; padding-top:20px">
    <div class="container">
      <div class="row">
        <?php foreach ($items as $brg) : ?>
          <div class="col-lg-4 col-md-6 col-sm-12 mb-4 gambarnaik">
            <a class="text-decoration-none" style="padding:0px !important; width:0px !important;" href="./php/detailitem.php?id=<?= $brg["id"] ?>">
              <div class="card p-1" style="width: 20rem">

                <img src="./assets/img/<?= $brg['gambar'] ?>" alt="" style="width: 100; height: 200px;" />
                <div class="card-body">
                  <h4>
                    <?= $brg['nama'] ?> <br />
                    <br />
                    <span style="font-size: 13px; color:red;"><?= $brg['detail']; ?></span>
                  </h4>
                  <p>Produk Terbaru</p>
                  <div class="card-fasilitas">
                    <h4>Rp.<?= $brg['harga'] ?></h4>
                    <p>&nbsp; Diskon</p>
                  </div>
                </div>
              </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>


  <!-- nav hp -->
  <?php include('./tambahanlain/navbarhp.php') ?>
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
  <?php include('./tambahanlain/futer.php') ?>
  <!-- footer end -->
</body>
<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>