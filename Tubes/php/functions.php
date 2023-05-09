<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tugas_besar");

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
    // ambil data dari tiap elemen dalam form
    $gambar = htmlspecialchars($data["gambar"]);
    $nama = htmlspecialchars($data["nama"]);
    $brand = htmlspecialchars($data["brand"]);
    $harga = htmlspecialchars($data["harga"]);
    $detail = htmlspecialchars($data["detail"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO items
                VALUES
            (null, '$gambar', '$nama', '$brand', '$harga', '$detail')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
        alert('Pilih gambar terlebih dahulu')
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensigambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar')
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar 
    if ($ukuranfile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar')
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap di upload
    // generate nama gambar baru
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
     gambar = '$gambar',
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
