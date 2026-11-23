<?php
require_once "koneksi.php";

// Hapus hanya lewat POST demi keamanan, bukan lewat tautan langsung (GET)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$id = filter_var($_POST['id'] ?? "", FILTER_VALIDATE_INT);

if ($id !== false && $id > 0) {
    try {
        $stmt = mysqli_prepare($koneksi, "DELETE FROM mahasiswa WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } catch (mysqli_sql_exception $e) {
        error_log($e->getMessage());
    }
}

header("Location: index.php?pesan=hapus");
exit;
