<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? "");
    $pesan = trim($_POST['pesan'] ?? "");

    // ... validasi nama dan pesan (wajib, panjang dibatasi) ...

    if (empty($errors)) {
        // | dan baris baru dibuang agar format file tidak rusak
        $namaAman  = str_replace(["|", "\r", "\n"], " ", $nama);
        $pesanAman = str_replace(["|", "\r", "\n"], " ", $pesan);
        $baris = date("d/m/Y H:i")
            . "|" . $namaAman
            . "|" . $pesanAman . PHP_EOL;

        $f = fopen($file, "a");
        if ($f === false) {
            $errors[] = "Pesan gagal disimpan.";
        } else {
            fwrite($f, $baris);
            fclose($f);
            $nama = $pesan = "";
        }
    }
}
$entri = [];
if (file_exists($file)) {
    $f = fopen($file, "r");
    while (($baris = fgets($f)) !== false) {
        $bagian = explode("|", trim($baris), 3);
        if (count($bagian) === 3) {
            $entri[] = $bagian;
        }
    }
    fclose($f);
}
$entri = array_reverse($entri);   // terbaru di atas

// menampilkan (versi ringkas)
foreach ($entri as $e) {
    echo "<b>" . htmlspecialchars($e[1]) . "</b> ";
    echo htmlspecialchars($e[2]) . "<br>";
}
