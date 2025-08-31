<!DOCTYPE html>
<html>
<body>
    <h2>Daftar Mahasiswa</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>NIM</td>
            <td>Nama</td>
            <td>Umur</td>
        </tr>
        <?php
        $i = 0;
        while (isset($mahasiswa[$i]))
        {
            ?>
            <tr>
                <td><?= esc($mahasiswa[$i]['nim']); ?></td>
                <td><?= esc($mahasiswa[$i]['nama']); ?></td>
                <td><?= esc($mahasiswa[$i]['umur']); ?></td>
            </tr>
            <?php
            $i++;
        }
        if ($i == 0) 
        {
            echo "<tr><td colspan='3'>Tidak ada data mahasiswa.</td></tr>";
        }
        ?>
    </table>
</body>
</html>