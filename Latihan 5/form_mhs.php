<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "akademik-db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $conn->real_escape_string($_POST['nim']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $umur = $conn->real_escape_string($_POST['umur']);

    $sql = "INSERT INTO mahasiswa (nim, nama, umur) VALUES ('$nim', '$nama', '$umur')
            ON DUPLICATE KEY UPDATE nama='$nama', umur='$umur'";
    if ($conn->query($sql) === TRUE) {
        header("Location: latihan5c.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['nim'])) {
    $nim = $conn->real_escape_string($_GET['nim']);
    $sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $result = $conn->query($sql);
    $mhs = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
</head>
<body>
    <h2><?= isset($_GET['nim']) ? 'Edit' : 'Tambah'; ?> Mahasiswa</h2>
    <form method="post" action="">
        <label>NIM: <input type="text" name="nim" value="<?= isset($mhs) ? $mhs['nim'] : ''; ?>" <?= isset($_GET['nim']) ? 'readonly' : ''; ?>></label><br>
        <label>Nama: <input type="text" name="nama" value="<?= isset($mhs) ? $mhs['nama'] : ''; ?>"></label><br>
        <label>Umur: <input type="number" name="umur" value="<?= isset($mhs) ? $mhs['umur'] : ''; ?>"></label><br>
        <button type="submit">Simpan</button>
    </form>
    <p><a href="latihan5c.php">Kembali ke Manajemen Mahasiswa</a></p>

    <?php $conn->close(); ?>
</body>
</html>