<!DOCTYPE html>
<html>
<head>
    <title>Detail Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Detail Mahasiswa</h1>
        <div class="card">
            <p><strong>NIM:</strong> <?= esc($mahasiswa['nim']) ?></p>
            <p><strong>Nama:</strong> <?= esc($mahasiswa['nama']) ?></p>
            <p><strong>Umur:</strong> <?= esc($mahasiswa['umur']) ?></p>
        </div>
        <a href="<?= base_url('/tabel-mhs') ?>" class="back-link">Kembali ke Daftar Mahasiswa</a>
    </div>
</body>
</html>