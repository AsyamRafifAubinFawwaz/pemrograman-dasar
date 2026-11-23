<?php
function uji($nama, $aktual, $harapan) {
    return [
        "nama"    => $nama,
        "aktual"  => var_export($aktual, true),
        "harapan" => var_export($harapan, true),
        "lulus"   => $aktual === $harapan,
    ];
}

$hasil = [
    uji("strlen",                strlen("Pemrograman"),        11),
    uji("strtoupper",            strtoupper("php dasar"),      "PHP DASAR"),
    uji("strtolower",            strtolower("PHP DASAR"),      "php dasar"),
    uji("substr (awal)",         substr("Pemrograman", 0, 4),  "Pemr"),
    uji("substr (tanpa panjang)", substr("Pemrograman", 4),     "ograman"),
    uji("substr (negatif)",       substr("Pemrograman", -3),    "man"),
    uji("substr (tengah)",        substr("Pemrograman", 2, 5),  "mrogr"),
    uji("substr (di luar teks)",  substr("Pemrograman", 20),    ""),
    uji("strlen teks UTF-8",     strlen("Café"),               4),
    uji("mb_strlen teks UTF-8",  mb_strlen("Café"),            4),
];

$totalPengujian = count($hasil);
$jumlahLulus = count(array_filter($hasil, fn($item) => $item['lulus']));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pengujian</title>
</head>
<body>

    <h2>Hasil Pengujian</h2>

    <p><strong><?= $jumlahLulus ?> dari <?= $totalPengujian ?> pengujian lulus</strong></p>

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>Status</th>
                <th>Pengujian</th>
                <th>Aktual</th>
                <th>Harapan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hasil as $u): ?>
                <tr>
                    <td>
                        <?php if ($u['lulus']): ?>
                            <strong style="color: green;">PASS</strong>
                        <?php else: ?>
                            <strong style="color: red;">FAIL</strong>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($u['nama']) ?></td>
                    <td><code><?= htmlspecialchars($u['aktual']) ?></code></td>
                    <td><code><?= htmlspecialchars($u['harapan']) ?></code></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p>
        <strong>FAIL disengaja:</strong> strlen("Café") menghitung 5 byte, bukan 4 karakter. Perbaikannya: mb_strlen().
    </p>

</body>
</html>
