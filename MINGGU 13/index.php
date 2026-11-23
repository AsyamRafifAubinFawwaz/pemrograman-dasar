<?php
require_once "koneksi.php";

$sql    = "SELECT id, nim, nama, jurusan FROM mahasiswa ORDER BY nama";
$hasil  = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);

// Tangkap pesan notifikasi
$pesan = $_GET['pesan'] ?? "";
$teksPesan = "";
if ($pesan === "tambah") {
    $teksPesan = "Data mahasiswa berhasil ditambahkan.";
} elseif ($pesan === "ubah") {
    $teksPesan = "Data mahasiswa berhasil diubah.";
} elseif ($pesan === "hapus") {
    $teksPesan = "Data mahasiswa berhasil dihapus.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>
<body>

    <h2>Data Mahasiswa</h2>

    <!-- Pesan sukses berwarna hijau -->
    <?php if ($teksPesan !== ""): ?>
        <p style="color: green; font-weight: bold;">
            <?= htmlspecialchars($teksPesan) ?>
        </p>
    <?php endif; ?>

    <p>
        <a href="tambah.php">+ Tambah Mahasiswa</a>
    </p>

    <?php if ($jumlah === 0): ?>
        <p>Belum ada data.</p>
    <?php else: ?>
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while ($m = mysqli_fetch_assoc($hasil)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($m['nim']) ?></td>
                        <td><?= htmlspecialchars($m['nama']) ?></td>
                        <td><?= htmlspecialchars($m['jurusan']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $m['id'] ?>">Edit</a>
                            |
                            <form method="POST" action="hapus.php" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                <input type="hidden" name="id" value="<?= $m['id'] ?>">
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>
