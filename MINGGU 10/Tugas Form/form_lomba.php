<?php require 'proses_lomba.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Lomba Coding</title>

    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
        }

        .card {
            background-color: #d0cfcf;
            padding: 20px;
            width: 500px;
            border-radius: 10px;
        }

        .error {
            color: red;
            font-size: 13px;
            display: block;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        input, select {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Registrasi Lomba Coding</h2>

        <?php if ($sukses): ?>

            <p class="success">Pendaftaran berhasil!</p>

            <ul>
                <li>Nama: <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?></li>
                <li>Email: <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></li>
                <li>No HP: <?= htmlspecialchars($hp, ENT_QUOTES, 'UTF-8') ?></li>
                <li>Umur: <?= htmlspecialchars($umur, ENT_QUOTES, 'UTF-8') ?> tahun</li>
                <li>GitHub: <?= htmlspecialchars($github ?: '-', ENT_QUOTES, 'UTF-8') ?></li>
                <li>Kategori: <?= htmlspecialchars($kategori, ENT_QUOTES, 'UTF-8') ?></li>
                <li>Peserta: <?= htmlspecialchars($peserta, ENT_QUOTES, 'UTF-8') ?></li>
            </ul>

        <?php else: ?>

            <form action="" method="post" novalidate>

                <label>Nama Peserta:</label><br>
                <input type="text" name="nama" value="<?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>">
                <?php if (isset($errors['nama'])) echo "<span class='error'>{$errors['nama']}</span>"; ?>
                <br>

                <label>Email:</label><br>
                <input type="email" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
                <?php if (isset($errors['email'])) echo "<span class='error'>{$errors['email']}</span>"; ?>
                <br>

                <label>Nomor HP:</label><br>
                <input type="text" name="hp" value="<?= htmlspecialchars($hp, ENT_QUOTES, 'UTF-8') ?>">
                <?php if (isset($errors['hp'])) echo "<span class='error'>{$errors['hp']}</span>"; ?>
                <br>

                <label>Umur:</label><br>
                <input type="number" name="umur" value="<?= htmlspecialchars($umur, ENT_QUOTES, 'UTF-8') ?>">
                <?php if (isset($errors['umur'])) echo "<span class='error'>{$errors['umur']}</span>"; ?>
                <br>

                <label>URL Repositori GitHub (Opsional):</label><br>
                <input type="text" name="github" value="<?= htmlspecialchars($github, ENT_QUOTES, 'UTF-8') ?>">
                <?php if (isset($errors['github'])) echo "<span class='error'>{$errors['github']}</span>"; ?>
                <br>

                <label>Kategori:</label><br>
                <select name="kategori">
                    <option value="">-- Pilih Kategori --</option>

                    <?php foreach ($daftarKategori as $k): ?>
                        <option value="<?= htmlspecialchars($k, ENT_QUOTES, 'UTF-8') ?>"
                            <?= $kategori === $k ? 'selected' : '' ?>>
                            <?= htmlspecialchars($k, ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php endforeach; ?>

                </select>

                <?php if (isset($errors['kategori'])) echo "<span class='error'>{$errors['kategori']}</span>"; ?>
                <br><br>

                <label>Jenis Peserta:</label><br>

                <?php foreach ($daftarPeserta as $p): ?>
                    <input type="radio" name="peserta"
                        value="<?= htmlspecialchars($p, ENT_QUOTES, 'UTF-8') ?>"
                        <?= $peserta === $p ? 'checked' : '' ?>>
                    <?= htmlspecialchars($p, ENT_QUOTES, 'UTF-8') ?>
                    <br>
                <?php endforeach; ?>

                <?php if (isset($errors['peserta'])) echo "<span class='error'>{$errors['peserta']}</span>"; ?>

                <br>

                <button type="submit">Daftar Sekarang</button>

            </form>

        <?php endif; ?>

    </div>
</body>
</html>