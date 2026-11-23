<?php
require_once "koneksi.php";

$id = filter_var($_GET['id'] ?? $_POST['id'] ?? "", FILTER_VALIDATE_INT);
if ($id === false || $id <= 0) {
    exit("ID tidak valid.");
}

$errors = [];

// Ambil data lama untuk mengisi form
$sql  = "SELECT nim, nama, jurusan FROM mahasiswa WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
mysqli_stmt_close($stmt);

if ($data === null) {
    exit("Data tidak ditemukan.");
}

$nim     = $data['nim'];
$nama    = $data['nama'];
$jurusan = $data['jurusan'];

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
            $sql  = "UPDATE mahasiswa SET nim = ?, nama = ?, jurusan = ? WHERE id = ?";
            $stmt = mysqli_prepare($koneksi, $sql);
            mysqli_stmt_bind_param($stmt, "sssi", $nim, $nama, $jurusan, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("Location: index.php?pesan=ubah");
            exit;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) {
                $errors[] = "NIM sudah digunakan oleh mahasiswa lain.";
            } else {
                error_log($e->getMessage());
                $errors[] = "Data gagal diperbarui.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>
<body>

    <h2>Edit Data Mahasiswa</h2>

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
        <input type="hidden" name="id" value="<?= htmlspecialchars((string)$id) ?>">

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
            <button type="submit">Update</button>
            <a href="index.php">Batal</a>
        </p>
    </form>

</body>
</html>
