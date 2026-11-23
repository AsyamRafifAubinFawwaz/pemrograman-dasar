<?php
// Inisialisasi variabel awal
$teks = "";
$mulai = "0";
$panjang = "5";
$errors = [];
$hasil = [];

// Proses form saat disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mulai = $_POST['mulai'] ?? "";
    $panjang = $_POST['panjang'] ?? "";

    $opsiMulai = [];
    $opsiPanjang = [
        "options" => [
            "min_range" => 1
        ]
    ];

    // 1. rapikan dan validasi
    $teks = trim($_POST['teks'] ?? "");
    if ($teks === "") {
        $errors[] = "Teks wajib diisi.";
    } elseif (mb_strlen($teks) > 200) {
        $errors[] = "Teks maksimal 200 karakter.";
    }
    $m = filter_var($mulai, FILTER_VALIDATE_INT, $opsiMulai);
    $p = filter_var($panjang, FILTER_VALIDATE_INT, $opsiPanjang);

    if ($mulai === "" || $m === false) {
        $errors[] = "Posisi awal (mulai) harus berupa angka bulat.";
    }
    if ($panjang === "" || $p === false) {
        $errors[] = "Panjang harus berupa angka bulat positif.";
    }

    // 2. bila tidak ada error, olah teks
    if (empty($errors)) {
        $hasil = [
            "Jumlah byte (strlen)"        => strlen($teks),
            "Jumlah karakter (mb_strlen)" => mb_strlen($teks),
            "Huruf besar (strtoupper)"    => strtoupper($teks),
            "Huruf kecil (strtolower)"    => strtolower($teks),
            "Potongan (substr)"           => substr($teks, $m, $p),
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Code 3: Analisis Teks</title>
</head>
<body>

    <h2>Code 3: Analisis Teks</h2>

    <!-- Tampilkan error jika ada -->
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <strong>Terjadi Kesalahan:</strong>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Form Input Sederhana -->
    <form method="POST" action="">
        <p>
            <label>Teks:</label><br>
            <input type="text" name="teks" value="<?= htmlspecialchars($teks) ?>" size="40">
        </p>
        <p>
            <label>Awal (Posisi Mulai):</label><br>
            <input type="text" name="mulai" value="<?= htmlspecialchars((string)$mulai) ?>" size="10">
        </p>
        <p>
            <label>Panjang:</label><br>
            <input type="text" name="panjang" value="<?= htmlspecialchars((string)$panjang) ?>" size="10">
        </p>
        <p>
            <button type="submit">Analisis Teks</button>
        </p>
    </form>

    <!-- Hasil Analisis Sesuai Format Slide -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)): ?>
        <hr>
        <h3>Contoh hasil</h3>
        <p>
            Teks: <?= htmlspecialchars($teks) ?><br>
            Awal <?= htmlspecialchars((string)$m) ?>, panjang <?= htmlspecialchars((string)$p) ?>
        </p>
        <ul>
            <?php foreach ($hasil as $key => $val): ?>
                <li><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars((string)$val) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</body>
</html>
