<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Daftar Mahasiswa</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th> </tr>
            <?php if(!empty($mahasiswa)): ?>
                <?php foreach($mahasiswa as $m): ?>
                    <tr>
                        <td><?= esc($m['nim']) ?></td>
                        <td><?= esc($m['nama']) ?></td>
                        <td><?= esc($m['umur']) ?></td>
                        <td><a href="<?= base_url('tabel-mhs/detail/' . $m['nim']) ?>" class="detail-link">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Belum ada data mahasiswa</td> </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>