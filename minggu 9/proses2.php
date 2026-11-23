<?php
$nama   = $_POST['nama'];
$gender = $_POST['gender'] ?? "Tidak dipilih";
$prodi  = $_POST['prodi'];
$hobi   = $_POST['hobi'] ?? [];
$setuju = isset($_POST['setuju']);

echo "Hobi: ";
if (count($hobi) > 0) {
    echo implode(", ", $hobi);
} else {
    echo "-";
}

foreach ($hobi as $h) {
    echo "<li>$h</li>";
}
