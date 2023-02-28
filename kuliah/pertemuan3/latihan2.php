<!-- Rumus pengulangan -->
<!-- 1.Inisialisasi / Nilai awal-->
<!-- 2.Kondisi terminasi / kapan pengulangannya berhenti-->
<!-- 3.increment / decrement-->

<?php
echo "Mulai. <br>";

$nilai_awal = 1; //inisialisasi
while ($nilai_awal <= 10) { // kondisi terminasi
    echo "Hello World $nilai_awal x<br>";
    $nilai_awal = $nilai_awal + 1; //increment
}
echo "Selesai. <br>";


echo "<hr>";

echo "Mulai. <br>";
for ($nilai_awal = 1; $nilai_awal <= 5; $nilai_awal++) {
    echo "Hello World $nilai_awal x. <br>";
}
echo "Selesai <br>";
