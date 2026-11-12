<?php

$nilaiTugas = 80;
$nilaiUTS = 90;
$nilaiUAS = 85;

$nilaiAkhir  = ($nilaiTugas * 0.30) + ($nilaiUTS * 0.30) + ($nilaiUAS * 0.40);

echo "<br>";
echo "<h2> KALKULATOR MATA KULIAH </h2>";
echo "Nilai Akhir : " . $nilaiAkhir . "<br>";
echo "<br>";

$lulus = $nilaiAkhir >= 75;

var_dump($lulus);


