<?php
$errors = [];
$sukses = false;

$nama = $email = $hp = $umur = $github = "";
$kategori = $peserta = "";

$daftarKategori = [
    "Web Development",
    "Mobile App",
    "Artificial Intelligence"
];

$daftarPeserta = [
    "Individu",
    "Tim"
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim(is_string($_POST['nama'] ?? null) ? $_POST['nama'] : "");
    $email = trim(is_string($_POST['email'] ?? null) ? $_POST['email'] : "");
    $hp = trim(is_string($_POST['hp'] ?? null) ? $_POST['hp'] : "");
    $umur = trim(is_string($_POST['umur'] ?? null) ? $_POST['umur'] : "");
    $github = trim(is_string($_POST['github'] ?? null) ? $_POST['github'] : "");
    $kategori = is_string($_POST['kategori'] ?? null) ? $_POST['kategori'] : "";
    $peserta = is_string($_POST['peserta'] ?? null) ? $_POST['peserta'] : "";

    if ($nama === "") {
        $errors['nama'] = "Nama wajib diisi.";
    } elseif (strlen($nama) < 3 || strlen($nama) > 50) {
        $errors['nama'] = "Nama harus 3-50 karakter.";
    }

    if ($email === "") {
        $errors['email'] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    }

    $opsi_hp = [
        "options" => [
            "regexp" => "/^08[0-9]{8,11}$/"
        ]
    ];

    if ($hp === "") {
        $errors['hp'] = "Nomor HP wajib diisi.";
    } elseif (!filter_var($hp, FILTER_VALIDATE_REGEXP, $opsi_hp)) {
        $errors['hp'] = "Nomor HP tidak valid (harus diawali 08, 10-13 digit).";
    }

    $opsi_umur = [
        "options" => [
            "min_range" => 17,
            "max_range" => 19
        ]
    ];

    if ($umur === "") {
        $errors['umur'] = "Umur wajib diisi.";
    } elseif (filter_var($umur, FILTER_VALIDATE_INT, $opsi_umur) === false) {
        $errors['umur'] = "Umur harus berupa angka dalam rentang 17-19 tahun.";
    }

    if ($github !== "" && !filter_var($github, FILTER_VALIDATE_URL)) {
        $errors['github'] = "URL GitHub tidak valid.";
    }

    if (!in_array($kategori, $daftarKategori, true)) {
        $errors['kategori'] = "Kategori tidak valid.";
    }

    if (!in_array($peserta, $daftarPeserta, true)) {
        $errors['peserta'] = "Jenis peserta tidak valid.";
    }

    $sukses = empty($errors);
}
?>