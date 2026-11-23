<?php
require_once "koneksi.php";

$errors = [];
$nim = "";
$nama = "";
$jurusan = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim     = trim($_POST['nim'] ?? "");
    $nama    = trim($_POST['nama'] ?? "");
    $jurusan = trim($_POST['jurusan'] ?? "");

    // Validasi input
    if ($nim === "") {
        $errors[] = "NIM wajib diisi.";
    }
    if ($nama === "") {
        $errors[] = "Nama wajib diisi.";
    }
    if ($jurusan === "") {
        $errors[] = "Jurusan wajib diisi.";
    }

    if (empty($errors)) {
        try {
            $sql  = "INSERT INTO mahasiswa (nim, nama, jurusan) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($koneksi, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $nim, $nama, $jurusan);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("Location: index.php?pesan=tambah");
            exit;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) {
                $errors[] = "NIM sudah terdaftar.";
            } else {
                error_log($e->getMessage());
                $errors[] = "Data gagal disimpan.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
</head>
<body>

    <h2>Tambah Data Mahasiswa</h2>

    <!-- Tampilkan error jika ada -->
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <p>
            <label>NIM:</label><br>
            <input type="text" name="nim" value="<?= htmlspecialchars($nim) ?>" size="20">
        </p>
        <p>
            <label>Nama:</label><br>
            <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>" size="35">
        </p>
        <p>
            <label>Jurusan:</label><br>
            <input type="text" name="jurusan" value="<?= htmlspecialchars($jurusan) ?>" size="30">
        </p>
        <p>
            <button type="submit">Simpan</button>
            <a href="index.php">Batal</a>
        </p>
    </form>

</body>
</html>
