<?php

$jml_angkot = 19;
$angkot_rusak = 4;
$no_angkot = 1;
while ($no_angkot <= $jml_angkot - $angkot_rusak) {
    echo "Angkot no.$no_angkot beroperasi dengan baik. <br>";
    $no_angkot++;
}

for ($no_angkot; $no_angkot <= $jml_angkot; $no_angkot++) {
    echo "Angkot no.$no_angkot sedang rusak. <br>";
}
