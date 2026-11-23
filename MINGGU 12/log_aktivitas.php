<?php
function catatLog($pesan) {
    $waktu = date("Y-m-d H:i:s");
    $pesan = str_replace(["\r", "\n"], " ", $pesan);
 
    $f = fopen(__DIR__ . "/log.txt", "a");
    if ($f === false) {
        return false;
    }
    fwrite($f, "[$waktu] $pesan" . PHP_EOL);
    fclose($f);
    return true;
}
 
catatLog("Login berhasil: budi");
catatLog("Login gagal: andi");
