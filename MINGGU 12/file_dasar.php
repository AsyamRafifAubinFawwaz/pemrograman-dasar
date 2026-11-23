<?php
$file = __DIR__ . "/catatan.txt";
 
// 1. Tulis ke file (mode w)
$f = fopen($file, "w");
if ($f === false) {
    exit("Gagal membuka file untuk ditulis.");
}
$jumlah = fwrite($f, "Belajar PHP itu seru." . PHP_EOL);
fwrite($f, "File handling dimulai hari ini." . PHP_EOL);
fclose($f);
echo "Baris pertama tertulis: $jumlah byte<br>";
 
// 2. Baca seluruh isi (mode r)
$f = fopen($file, "r");
$isi = fread($f, filesize($file));
fclose($f);
echo "<pre>" . htmlspecialchars($isi) . "</pre>";
// 3. Tambah di akhir file (mode a)
$f = fopen($file, "a");
fwrite($f, "Baris tambahan." . PHP_EOL);
fclose($f);
 
// 4. Baca baris demi baris
$f = fopen($file, "r");
$no = 0;
while (($baris = fgets($f)) !== false) {
    $no++;
    echo $no . ". " . htmlspecialchars(trim($baris)) . "<br>";
}
fclose($f);
