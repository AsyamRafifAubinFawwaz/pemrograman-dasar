<?php
$f = fopen(__DIR__ . "/counter.txt", "c+");
flock($f, LOCK_EX);              // kunci
 
$jumlah = (int) fread($f, 20) + 1;
ftruncate($f, 0);                // kosongkan
rewind($f);                      // ke awal file
fwrite($f, (string) $jumlah);
fflush($f);
 
flock($f, LOCK_UN);              // lepas kunci
fclose($f);
