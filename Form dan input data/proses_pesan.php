<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nama = htmlspecialchars(trim($_POST['nama']));
    $menu = htmlspecialchars(trim($_POST['menu']));

    $pedas = $_POST['pedas'] ?? 'Tidak di pilih';
    $pedas = htmlspecialchars(trim($pedas));

    $topping = $_POST['topping'] ?? [];

    echo "<h2>Data Pesanan</h2>";
    echo "<p>Nama: $nama</p>";
    echo "<p>Menu: $menu</p>";
    echo "<p>Level Pedas: $pedas</p>";

    echo "<b>Toping Tambahan: </b>";
    if(count($topping) > 0 ){
        $toppingAman = array_map('htmlspecialchars', $topping);
        echo implode(", ", $toppingAman);
    } else {
        echo "- (tidak ada topping tambahan)";
    }

}


?>