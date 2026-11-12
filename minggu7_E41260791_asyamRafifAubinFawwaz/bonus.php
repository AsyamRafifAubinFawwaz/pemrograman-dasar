<?php


function hitungNilaiAkhir($tugas, $uts, $uas)
{
    return ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
}
function tentukanGrade($nilaiAkhir)
{
    if ($nilaiAkhir > 100 || $nilaiAkhir < 0) {
        return "Nilai tidak valid";
    } elseif ($nilaiAkhir >= 90) {
        return "A";
    } elseif ($nilaiAkhir >= 80) {
        return "B";
    } elseif ($nilaiAkhir >= 70) {
        return "C";
    } elseif ($nilaiAkhir >= 60) {
        return "D";
    } else {
        return "E";
    }
}

function tentukanStatus($nilaiAkhir)
{

    if ($nilaiAkhir >= 75) {
        return "Lulus";
    } else {
        return "Tidak Lulus";
    }
}

function tampilkanHasil($nama, $tugas, $uts, $uas)
{
    $nilaiAkhir = hitungNilaiAkhir($tugas, $uts, $uas);
    echo "Nama : " . $nama . "<br>";
    echo "Nilai Tugas : " . $tugas . "<br>";
    echo "Nilai UTS : " . $uts . "<br>";
    echo "Nilai UAS : " . $uas . "<br>";
    echo "Nilai Akhir : " . $nilaiAkhir . "<br>";
    echo "Grade : " . tentukanGrade($nilaiAkhir) . "<br>";
    echo "Status : " . tentukanStatus($nilaiAkhir) . "<br>";
}

$dataMahasiswa = [
    [
        "Nama" => "Asyam",
        "Tugas" => 75,
        "UTS" => 80,
        "UAS" => 80
    ],
    [
        "Nama" => "Rafif",
        "Tugas" => 80,
        "UTS" => 88,
        "UAS" => 85
    ],
    [
        "Nama" => "Aubin",
        "Tugas" => 85,
        "UTS" => 70,
        "UAS" => 70
    ],
    [
        "Nama" => "Fawwaz",
        "Tugas" => 85,
        "UTS" => 90,
        "UAS" => 95
    ]
];


foreach ($dataMahasiswa as $mahasiswa) {
    tampilkanHasil($mahasiswa['Nama'], $mahasiswa['Tugas'], $mahasiswa['UTS'], $mahasiswa['UAS']);
}