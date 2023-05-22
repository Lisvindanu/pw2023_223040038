<?php

// koneksi ke database
$conn = mysqli_connect("localhost:3306", "root", "", "tubes");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    // Ambil data dari tiap elemen dalam form
    $gambar = htmlspecialchars($data["gambar"]);
    $nama = htmlspecialchars($data["nama"]);
    $brand = htmlspecialchars($data["brand"]);
    $harga = htmlspecialchars($data["harga"]);
    $detail = htmlspecialchars($data["detail"]);
    $kategori = htmlspecialchars($data["kategori"]);

    // Upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Cek apakah kategori sudah ada di tabel kategori
    $query = "SELECT id FROM kategori WHERE nama = '$kategori'";
    $result = mysqli_query($conn, $query);

    // Jika kategori belum ada, tambahkan ke tabel kategori
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO kategori (nama) VALUES ('$kategori')";
        mysqli_query($conn, $query);
    }

    // Dapatkan id dari tabel kategori berdasarkan nama kategori
    $query = "SELECT id FROM kategori WHERE nama = '$kategori'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $kategori_id = $row['id'];

    // Query insert data
    $query = "INSERT INTO items (gambar, nama, brand, harga, detail, kategori, kategori_id)
              VALUES ('$gambar', '$nama', '$brand', '$harga', '$detail', '$kategori', '$kategori_id')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}




function upload()
{
    // Cek apakah input file 'gambar' ada
    if (!isset($_FILES['gambar'])) {
        var_dump($_FILES['gambar']);
        return "Gambar tidak ditemukan";
    }

    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        return "Pilih gambar terlebih dahulu";
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensigambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarValid)) {
        return "Yang Anda upload bukan gambar";
    }

    // Cek jika ukurannya terlalu besar
    if ($ukuranfile > 1000000) {
        return "Ukuran gambar terlalu besar";
    }

    // Lolos pengecekan, gambar siap diupload
    // Generate nama gambar baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpName, '../assets/img/' . $namafilebaru);

    return $namafilebaru;
}



function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM items WHERE id = $id");
    return mysqli_affected_rows($conn);
}


// regis
function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));

    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username sudah terdaftar!')
        </script>";
        return false;
    }


    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO users VALUES (null, '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = ($data["id"]);
    $nama = htmlspecialchars($data["nama"]);
    $brand = htmlspecialchars($data["brand"]);
    $harga = htmlspecialchars($data["harga"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $detail = htmlspecialchars($data["detail"]);
    $gambarlama = htmlspecialchars($data["gambarlama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }
    // query insert data

    $query = "UPDATE items SET

   
     nama = '$nama', 
     brand = '$brand',
     harga = '$harga', 
     gambar = CASE
                            WHEN '$gambar' = '$gambarlama' THEN gambar
                            ELSE '$gambar'
                         END ,
     kategori = '$kategori',
     detail = '$detail'
     WHERE id = $id
     
     ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM items
                WHERE 
            nama LIKE '%$keyword%' OR
            brand LIkE '%$keyword%' OR
            harga LIKE '%$keyword%' OR
            detail LIKE  '%$keyword%'
        ";
    return query($query);
}
