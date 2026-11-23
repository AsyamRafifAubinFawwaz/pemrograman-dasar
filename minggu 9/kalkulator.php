<?php
$hasil = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a  = (float) $_POST['angka1'];
    $b  = (float) $_POST['angka2'];
    $op = $_POST['operator'];

    switch ($op) {
        case '+':
            $hasil = $a + $b;
            break;
        case '-':
            $hasil = $a - $b;
            break;
        case '*':
            $hasil = $a * $b;
            break;
        case '/':
            $hasil = ($b != 0) ? $a / $b : "Tidak bisa dibagi nol";
            break;
    }
}
