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

$nilaiTertinggi = 0;
$mhsTertinggi = "";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Daftar Nilai Mahasiswa</title>
</head>

<body>

    <h2>DAFTAR NILAI MAHASISWA</h2>
    <b>Total Mahasiswa:</b> <?php echo count($mahasiswa); ?> <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Tugas (30%)</th>
            <th>UTS (30%)</th>
            <th>UAS (40%)</th>
            <th>Nilai Akhir</th>
        </tr>

        <?php
        $nomor = 1;
        foreach ($mahasiswa as $data) {

            $nilaiAkhir = ($data["tugas"] * 0.30) + ($data["uts"] * 0.30) + ($data["uas"] * 0.40);

            if ($nilaiAkhir > $nilaiTertinggi) {
                $nilaiTertinggi = $nilaiAkhir;
                $mhsTertinggi = $data["nama"];
            }
        ?>

            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["nim"]; ?></td>
                <td><?php echo $data["tugas"]; ?></td>
                <td><?php echo $data["uts"]; ?></td>
                <td><?php echo $data["uas"]; ?></td>
                <td><b><?php echo $nilaiAkhir; ?></b></td>
            </tr>

        <?php
        }
        ?>

    </table>
    <br>

    <b>Mahasiswa dengan Nilai Tertinggi:</b> <?php echo $mhsTertinggi; ?> (Nilai: <?php echo $nilaiTertinggi; ?>)

</body>

</html>