<?php

function err($errors, $k) {
    if (isset($errors[$k])) {
        return "<small style='color:red'>{$errors[$k]}</small>";
    }
    return "";
}

$daftarGender = ["Laki-laki", "Perempuan"];
$daftarSesi   = ["Pagi", "Siang", "Sore"];

$errors = [];
$sukses = false;
$nama = $email = $umur = $web = $gender = $sesi = "";
$setuju = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = trim($_POST['nama'] ?? "");
    $email  = trim($_POST['email'] ?? "");
    $umur   = trim($_POST['umur'] ?? "");
    $web    = trim($_POST['web'] ?? "");
    $gender = $_POST['gender'] ?? "";
    $sesi   = $_POST['sesi'] ?? "";
    $setuju = isset($_POST['setuju']);

    // Nama: wajib, 3-50 karakter
    if ($nama === "") {
        $errors['nama'] = "Nama wajib diisi.";
    } elseif (strlen($nama) < 3 || strlen($nama) > 50) {
        $errors['nama'] = "Nama harus 3-50 karakter.";
    }

    // Email: wajib, format valid
    if ($email === "") {
        $errors['email'] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    }

    // Umur: bilangan bulat 17-60
    $opsi = ["options" => ["min_range" => 17, "max_range" => 60]];
    if (filter_var($umur, FILTER_VALIDATE_INT, $opsi) === false) {
        $errors['umur'] = "Umur harus angka 17-60.";
    }

    // Situs: opsional, bila diisi harus URL valid
    if ($web !== "" && !filter_var($web, FILTER_VALIDATE_URL)) {
        $errors['web'] = "URL tidak valid (contoh: https://situs.com).";
    }

    // Radio dan select: harus ada di daftar yang diizinkan
    if (!in_array($gender, $daftarGender, true)) {
        $errors['gender'] = "Pilih jenis kelamin.";
    }
    if (!in_array($sesi, $daftarSesi, true)) {
        $errors['sesi'] = "Pilih sesi yang tersedia.";
    }

    // Checkbox tunggal
    if (!$setuju) {
        $errors['setuju'] = "Anda harus menyetujui ketentuan.";
    }

    $sukses = empty($errors);
}
?>

<?php if ($sukses): ?>
  <p style="color:green">Berhasil, <?= htmlspecialchars($nama) ?>!</p>
<?php endif; ?>

<form method="post" action="" novalidate>
  Nama:<br>
  <input name="nama" value="<?= htmlspecialchars($nama) ?>">
  <?= err($errors, 'nama') ?><br><br>

  Email:<br>
  <input name="email" value="<?= htmlspecialchars($email) ?>">
  <?= err($errors, 'email') ?><br><br>

  Umur:<br>
  <input name="umur" value="<?= htmlspecialchars($umur) ?>">
  <?= err($errors, 'umur') ?><br><br>

  Situs:<br>
  <input name="web" value="<?= htmlspecialchars($web) ?>">
  <?= err($errors, 'web') ?><br><br>

  Jenis Kelamin:<br>
  <?php foreach ($daftarGender as $g): ?>
    <label>
      <input type="radio" name="gender" value="<?= htmlspecialchars($g) ?>" <?= $gender === $g ? "checked" : "" ?>>
      <?= htmlspecialchars($g) ?>
    </label>
  <?php endforeach; ?>
  <?= err($errors, 'gender') ?><br><br>

  Sesi:<br>
  <select name="sesi">
    <option value="">-- Pilih --</option>
    <?php foreach ($daftarSesi as $s): ?>
      <option value="<?= htmlspecialchars($s) ?>" <?= $sesi === $s ? "selected" : "" ?>><?= htmlspecialchars($s) ?></option>
    <?php endforeach; ?>
  </select>
  <?= err($errors, 'sesi') ?><br><br>

  <label>
    <input type="checkbox" name="setuju" <?= $setuju ? "checked" : "" ?>>
    Saya menyetujui ketentuan
  </label>
  <?= err($errors, 'setuju') ?><br><br>

  <button type="submit">Kirim</button>
</form>