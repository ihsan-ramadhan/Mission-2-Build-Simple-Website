<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="header">
        <h2>Ihsan's Website</h2>
    </div>

    <div class="menu">
        <a href="<?= base_url('home') ?>">Home</a>
        <a href="<?= base_url('data_mahasiswa') ?>">Data Mahasiswa</a>
    </div>

    <div class="content">
        <?= $content ?>
    </div>

    <div class="footer">
        <p>&copy; <?= date('Y') ?> Ihsan Ramadhan</p>
    </div>
</body>
</html>