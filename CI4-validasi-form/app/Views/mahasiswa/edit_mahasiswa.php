<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Edit Mahasiswa</h1>
        <form action="<?= base_url('tabel-mhs/update/' . $mahasiswa['nim']) ?>" method="post">
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" value="<?= esc($mahasiswa['nim']) ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?= old('nama') ?: esc($mahasiswa['nama']) ?>" required>
                <?php if (session('errors.nama')): ?>
                    <p style="color:red; font-size:14px; margin-top:5px;"><?= esc(session('errors.nama')) ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="umur">Umur:</label>
                <input type="number" id="umur" name="umur" value="<?= old('umur') ?: esc($mahasiswa['umur']) ?>" required>
                <?php if (session('errors.umur')): ?>
                    <p style="color:red; font-size:14px; margin-top:5px;"><?= esc(session('errors.umur')) ?></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn-submit">Update</button>
        </form>
        <a href="<?= base_url('/tabel-mhs') ?>" class="back-link">Kembali</a>
    </div>
</body>
</html>