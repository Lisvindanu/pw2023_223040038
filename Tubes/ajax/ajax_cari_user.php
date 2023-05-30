<?php
require '../php/functions.php';

if (isset($_GET['keywords'])) {
    $keywords = $_GET['keywords'];
    $query = "SELECT * FROM items WHERE ";
    foreach ($keywords as $key => $keyword) {
        if ($key > 0) {
            $query .= " OR ";
        }
        $query .= "nama LIKE '%$keyword%' OR
                   detail LIKE '%$keyword%' OR
                   brand LIKE '%$keyword%' OR                   
                   harga LIKE '%$keyword%'";
    }

    $items = query($query);
?>
    <section id="cardkatalog" style="background-color:gainsboro; padding-top:20px">
        <div class="container">
            <div class="row">
                <?php foreach ($items as $brg) : ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 gambarnaik">
                        <div class="card p-1" style="width: 20rem">
                            <a class="text-decoration-none" href="detailuser.php?id=<?= $brg["id"] ?>">
                                <img style="width: 308px; height: 200px;;" src="../assets/img/<?= $brg["gambar"]; ?>" alt="foto">
                                <div class="card-body">
                                    <h4>
                                        <?= $brg['nama'] ?> <br /><br />
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
<?php
} else {
    echo "Kata kunci tidak ditemukan.";
}
?>