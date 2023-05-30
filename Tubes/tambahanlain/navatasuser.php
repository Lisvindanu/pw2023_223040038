<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top atas" style="background-color: #4A22BF !important;">
    <div class="container-fluid">
        <a class="navbar-brand py-1" href="#">
            <img src="../assets/icon/Cute Minimalist Beige Ghost Game Center Logo (2).png" alt="logo" width="300px" height="100px" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto py-3 test">
                <a style="color: gold;" class="nav-link hoverdisini px-3" aria-current="page" href="index.php">Home</a>
                <a style="color: gold;" class="nav-link hoverdisini px-3" href="#">Product</a>
                <a style="color: gold;" class="nav-link hoverdisini px-3" href="#">Pricing</a>
                <li class="nav-item dropdown">
                    <a style="color: gold !important" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hover me</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        // Query untuk mendapatkan daftar kategori
                        $query = "SELECT nama FROM kategori";
                        $result = mysqli_query($conn, $query);

                        // Menampilkan kategori dalam loop
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li><a class="dropdown-item" href="kategori.php?kategori=' . $row['nama'] . '">' . $row['nama'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>

                <?php if (isset($_SESSION['submit']) && $_SESSION['submit'] === true) {
                    echo '<a class="btn btn-outline-danger px-3 logingp" role="button" href="admin.php">admin</a>';
                } else {
                    echo '<a class="btn btn-outline-danger px-3 logingp" role="button" href="login.php">Login</a>';;
                } ?>

            </div>
        </div>

    </div>
</nav>