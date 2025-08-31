<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "akademik-db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['delete'])) {
    $nim = $conn->real_escape_string($_GET['delete']);
    $sql = "DELETE FROM mahasiswa WHERE nim='$nim'";
    if ($conn->query($sql) === TRUE) {
        header("Location: latihan5c.php");
        exit();
    }
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

// Logika Pencarian
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
if ($search) {
    $sql = "SELECT nim, nama, umur FROM mahasiswa WHERE nim LIKE '%$search%' OR nama LIKE '%$search%' ORDER BY nim ASC";
} else {
    $sql = "SELECT nim, nama, umur FROM mahasiswa ORDER BY nim ASC";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Mahasiswa</title>
</head>
<body>
    <h2>Manajemen Mahasiswa</h2>

    <!-- Form Pencarian -->
    <form method="get" action="">
        <input type="text" name="search" placeholder="Cari NIM atau Nama" value="<?= htmlspecialchars($search); ?>">
        <button type="submit">Cari</button>
    </form>

    <!-- Daftar Mahasiswa -->
    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 0;
            while ($i < $result->num_rows) {
                $row = $result->fetch_assoc();
                ?>
                <tr>
                    <td><?= $row['nim']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['umur']; ?></td>
                    <td>
                        <a href="detail_mhs.php?nim=<?= urlencode($row['nim']); ?>">View Detail</a> |
                        <a href="form_mhs.php?nim=<?= urlencode($row['nim']); ?>">Edit</a> |
                        <a href="latihan5c.php?delete=<?= urlencode($row['nim']); ?>" onclick="return confirm('Yakin hapus?');">Delete</a>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
    <?php else: ?>
        <p>Tidak ada data mahasiswa.</p>
    <?php endif; ?>

    <!-- Tombol Tambah -->
    <p><a href="form_mhs.php">Tambah Mahasiswa Baru</a></p>
    <p><a href="latihan5b.php">ke Daftar Mahasiswa</a></p>
    <?php $conn->close(); ?>
</body>
</html>