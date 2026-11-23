<?php
$kalimat = "  Belajar PHP Itu Seru  ";
 
echo strlen($kalimat), "<br>";            // 24
echo strlen(trim($kalimat)), "<br>";      // 20
echo strtoupper($kalimat), "<br>";        // BELAJAR PHP ITU SERU
echo strtolower(trim($kalimat)), "<br>";  // belajar php itu seru

$kode = "INF-2026-0042";
 
echo substr($kode, 0, 3), "<br>";   // INF
echo substr($kode, 4, 4), "<br>";   // 2026
echo substr($kode, -4), "<br>";     // 0042
echo substr($kode, 4), "<br>";      // 2026-0042
