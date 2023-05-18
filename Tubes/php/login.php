<?php
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id= $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['submit'] = true;
    }
}


if (isset($_SESSION["submit"])) {
    header("Location: admin.php");
    exit;
}


if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username 
    if (mysqli_num_rows($result) === 1) {

        // cek password

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            //set session
            $_SESSION["submit"] = true;

            //setcookie untuk kalimat selamat datang di halaman admin 
            setcookie("username", $username, time() + 3600);

            // cek remember me
            if (isset($_POST['remember'])) {
                //buat cookie

                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: admin.php");
            exit;
        }
    }

    $error = true;
}







?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body style="background-color: #7871AA">
    <section class="container ">
        <div class="row content d-flex justify-content-center tengah ">
            <div class="col-md-5">

                <div class="turun box shadow bg-white p-4 borius ">
                    <div class="btn-cancel kanan21 " style="margin-left: auto !important;
  font-size: 28px !important;
  margin-right: 10px !important;">
                        <a href="../index.php" onclick="return confirm('Apakah anda yakin ingin kembali?')"><i class="fas fa-times"></i></a>
                    </div>
                    <h3 class="mb-4 text-center fs-1">Login</h3>
                    <form class="mb-3 " action="" method="post">
                        <?php if (isset($error)) : ?>
                            <p style="color: red; font-style:italic;">Username atau Password salah</p>
                        <?php endif; ?>
                        <div class="form-floating mb-3">
                            <Input class="form-control rounded-0 px-5" type="text" name="username" id="username" placeholder="password" autocomplete="off" required autofocus>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <Input class="form-control rounded-0 px-5" type="password" name="password" id="password" placeholder="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="true" name="remember">
                            <label for="" class="form-check-label">Ingat Saya</label>
                        </div>
                        <div class="d-grid gap-2 mb3">
                            <button type="submit" name="submit" class="btn btn-dark btn-lg border-0 rounder-0">Login</button>
                        </div>
                        <div class="Registrasi mb-3 mt-2">
                            <p>Belum memiliki akun? <a href="registrasi.php" class="text-decoration-none">Daftar</a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>






    <!-- Script  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/6dd84d01cb.js" crossorigin="anonymous"></script>

</html>