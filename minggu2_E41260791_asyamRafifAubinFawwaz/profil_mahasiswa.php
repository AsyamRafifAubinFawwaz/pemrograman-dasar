<?php

$nama = "Asyam Rafif Aubin Fawwaz";
$nim  = "E41260791";
$programStudi = "Teknik Informatika";
$umur = 18;
$ipk = 3.89;
$isActive = true;
$status = $isActive ? "Aktif" : "Tidak Aktif";

echo "<b>Profile Mahasiswa</b><br>";
echo "<b>Nama      :</b> " . $nama . "<br>";
echo "<b>NIM       :</b> " . $nim . "<br>";
echo "<b>Program Studi:</b> " . $programStudi . "<br>";
echo "<b>Umur      :</b> " . $umur . "<br>";
echo "<b>IPK       :</b> " . $ipk . "<br>";
echo "<b>Status aktif :</b> " . $status . "<br>";
echo "<br>";


echo "<br><b>Detail Tipe Data :</b><br>";
var_dump($nama, $nim, $programStudi, $umur, $ipk, $status);

