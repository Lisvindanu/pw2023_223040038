<?php
// ARRAY
// Array  adalah variabel yang bisa menampung  banyak hal


$hari = array('Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 'Minggu'); //cara lama
$bulan = ['Januari', 'February', 'Maret', 'April'];
$mhs = ['lisvin', 'danu']; //cara baru
$binatang = ['🐈‍⬛', '🐐', '🐕‍🦺', '🐧'];
$myArray = ['naruto', 10, true,];


//mencetak  Array
var_dump($binatang);
var_dump($bulan);
print_r($mhs);
var_dump($myArray);
echo $binatang[3];

echo "<hr>";

//Manipulasi array
// Menambah elemen di akhir array
$bulan[] = 'Mei';
$bulan[] = 'Juni';
print_r($bulan);

echo "<hr>";
array_push($bulan, 'Juli', 'Agustus');
print_r($bulan);

echo "<hr>";
// Menambah elemen di akhir array
array_unshift($binatang, '🦕');
print_r($binatang);
echo "<hr>";

//Mengghapus elemen di akhir array
array_pop($hari);
print_r($hari);
echo "<hr>";

//Mengghapus elemen di akhir array
array_shift($hari);
print_r($hari);
