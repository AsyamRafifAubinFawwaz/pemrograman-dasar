<?php
require_once "koneksi.php";
 
$sql   = "SELECT COUNT(*) AS total FROM mahasiswa";
$hasil = mysqli_query($koneksi, $sql);
$baris = mysqli_fetch_assoc($hasil);
 
echo "Jumlah mahasiswa: " . $baris['total'];
