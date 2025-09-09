<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Daftar Mahasiswa</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <a href="<?= base_url('tabel-mhs/add') ?>" class="add-link">Tambah Mahasiswa Baru</a>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
            <?php if (!empty($mahasiswa)): ?>
                <?php foreach ($mahasiswa as $m): ?>
                    <tr>
                        <td><?= esc($m['nim']) ?></td>
                        <td><?= esc($m['nama']) ?></td>
                        <td><?= esc($m['umur']) ?></td>
                        <td class="action-links">
                            <a href="<?= base_url('tabel-mhs/detail/' . $m['nim']) ?>" class="detail-link">Detail</a>
                            <a href="<?= base_url('tabel-mhs/edit/' . $m['nim']) ?>" class="edit-link">Edit</a>
                            <a href="<?= base_url('tabel-mhs/delete/' . $m['nim']) ?>" class="delete-link" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Belum ada data mahasiswa</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>