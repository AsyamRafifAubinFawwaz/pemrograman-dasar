<?php
$file = __DIR__ . "/peserta.csv";
 
// simpan satu baris (mode a)
$f = fopen($file, "a");
fputcsv($f, ["Budi Santoso", "budi@kampus.ac.id", "081234567890", date("Y-m-d")]);
fclose($f);
 
// baca semua baris (mode r)
$f = fopen($file, "r");
while (($data = fgetcsv($f)) !== false) {
    echo htmlspecialchars($data[0]) . " - " . htmlspecialchars($data[1]) . "<br>";
}
fclose($f);
