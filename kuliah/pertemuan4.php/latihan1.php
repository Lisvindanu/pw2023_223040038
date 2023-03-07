<?php

$angka = 10;

function cek_ganjil_genap($angka) //$angka disini sbg parameter
{
    // jika $angka dibagi 2, sisanya 1 maka ganjil
    if ($angka % 2 == 1) {
        return "$angka adalah bilangan ganjil!";
    } else { //selain itu
        return "$angka adalah bilangan genap!";
    }
}

echo cek_ganjil_genap(8); //argument
echo "<br>";
echo cek_ganjil_genap(999987767654432);
