<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Tambah Mahasiswa Baru</h1>
        <form action="<?= base_url('tabel-mhs/store') ?>" method="post">
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" value="<?= old('nim') ?>">
                <?php if (session('errors.nim')): ?>
                    <p style="color:red; font-size:14px; margin-top:5px;"><?= esc(session('errors.nim')) ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?= old('nama') ?>">
                <?php if (session('errors.nama')): ?>
                    <p style="color:red; font-size:14px; margin-top:5px;"><?= esc(session('errors.nama')) ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="umur">Umur:</label>
                <input type="number" id="umur" name="umur" value="<?= old('umur') ?>">
                <?php if (session('errors.umur')): ?>
                    <p style="color:red; font-size:14px; margin-top:5px;"><?= esc(session('errors.umur')) ?></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn-submit">Simpan</button>
        </form>
        <a href="<?= base_url('/tabel-mhs') ?>" class="back-link">Kembali</a>
    </div>
</body>
</html>