<!DOCTYPE html>
<html>
<body>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>NIM</td>
            <td>Nama</td>
            <td>Umur</td>
        </tr>
        <?php if(!empty($mahasiswa)): ?>
            <?php foreach($mahasiswa as $m): ?>
                <tr>
                    <td><?= esc($m['nim']) ?></td>
                    <td><?= esc($m['nama']) ?></td>
                    <td><?= esc($m['umur']) ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Belum ada data mahasiswa</td>
                </tr>
            <?php endif; ?>
    </table>
</body>
</html>