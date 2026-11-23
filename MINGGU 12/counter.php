<?php
$file   = __DIR__ . "/counter.txt";
$jumlah = 0;
 
if (file_exists($file)) {
    $f = fopen($file, "r");
    $jumlah = (int) fread($f, 20);
    fclose($f);
}
 
$jumlah++;
 
$f = fopen($file, "w");
fwrite($f, (string) $jumlah);
fclose($f);
 
echo "Anda pengunjung ke-" . $jumlah;
