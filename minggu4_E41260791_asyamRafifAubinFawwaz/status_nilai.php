<?php

$nilai = 90;

if ($nilai > 100 || $nilai < 0) {
    echo "Nilai tidak valid";
} elseif ($nilai >= 90) {
    $grade = "A";
} elseif ($nilai >= 80) {
    $grade = "B";
} elseif ($nilai >= 70) {
    $grade = "C";
} elseif ($nilai >= 60) {
    $grade = "D";
} else {
    $grade = "E";
}

if ($nilai >= 75) {
    $status = "Lulus";
} else {
    $status = "Tidak Lulus";
}

echo "<h2>Penilaian mahasiswa</h2>";
echo "Nilai Akhir : " . $nilai . "<br>";
echo "Grade       : " . $grade . "<br>";
echo "Status      : " . $status . "<br>";
