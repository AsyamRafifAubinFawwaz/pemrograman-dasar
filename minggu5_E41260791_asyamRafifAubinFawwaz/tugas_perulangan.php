<?php

$angka = 6;

for ($i = 1; $i <= 10; $i++) {
    $hasil = $angka * $i;
    echo "$angka x $i = $hasil <br>";
}

echo "<br>";

echo "Perulangan While angka 1 sampai 10<br>";

$a = 1;
while ($a <= 10) {
    if ($a % 2 == 0) {
        echo "$a = Genap <br>";
    } else {
        echo "$a = Ganjil <br>";
    }
    $a++;
}

echo "<br>";

echo "Perulangan Do While angka 10 sampai 1<br>";

$b = 10;
do {
    if ($b % 2 == 0) {
        echo "$b = Genap<br>";
    } else {
        echo "$b = Ganjil<br>";
    }

    $b--;
} while ($b >= 1);
