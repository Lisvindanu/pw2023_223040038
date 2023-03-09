<?php
$hari = ["senin", "selasa", "rabu"];
$angka = ["2", "4", "5", "9", "0"];
echo "array awal : ";
echo "<hr";

echo "Array setelah di Pop : ";
$hasil = array_pop($hari);
print_r($hari);
echo "<br>Elemen yang di pop : $hasil <hr>";

echo "array setelah di push : ";
$hasil = array_push($hari, "rabu", "kamis", "jum'at");
print_r($hari);
echo "<hr>";
