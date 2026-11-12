<?php
$mahasiswa = [
    [
        "nama"  => "Asyam Rafif Aubin Fawwaz",
        "nim"   => "E41260791",
        "tugas" => 85,
        "uts"   => 90,
        "uas"   => 95
    ],
    [
        "nama"  => "Budi Santoso",
        "nim"   => "E41260792",
        "tugas" => 80,
        "uts"   => 75,
        "uas"   => 85
    ],
    [
        "nama"  => "Siti Aminah",
        "nim"   => "E41260793",
        "tugas" => 90,
        "uts"   => 88,
        "uas"   => 92
    ],
    [
        "nama"  => "Dedi Kurniawan",
        "nim"   => "E41260794",
        "tugas" => 70,
        "uts"   => 65,
        "uas"   => 75
    ],
    [
        "nama"  => "Eka Putri",
        "nim"   => "E41260795",
        "tugas" => 88,
        "uts"   => 92,
        "uas"   => 90
    ]
];

echo "DAFTAR NILAI MAHASISWA<br />";
echo "Total Mahasiswa: " . count($mahasiswa) . "<br /><br />";

$nilaiTertinggi = 0;
$mhsTertinggi = "";

foreach ($mahasiswa as $data) {
    $nilaiAkhir = ($data["tugas"] * 0.30) + ($data["uts"] * 0.30) + ($data["uas"] * 0.40);

    if ($nilaiAkhir > $nilaiTertinggi) {
        $nilaiTertinggi = $nilaiAkhir;
        $mhsTertinggi = $data["nama"];
    }

    echo "Nama: " . $data["nama"] . "<br />";
    echo "NIM: " . $data["nim"] . "<br />";
    echo "Nilai Akhir: " . $nilaiAkhir . "<br /><br />";
}

echo "Nilai Tertinggi: " . $mhsTertinggi . " (" . $nilaiTertinggi . ")<br />";

?>