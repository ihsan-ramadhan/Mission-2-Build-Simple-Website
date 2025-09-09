<div class="detail_mhs">
    <h1>Detail Mahasiswa</h1>
    <div class="card">
        <p><strong>NIM:</strong> <?= esc($mahasiswa['nim']) ?></p>
        <p><strong>Nama:</strong> <?= esc($mahasiswa['nama']) ?></p>
        <p><strong>Umur:</strong> <?= esc($mahasiswa['umur']) ?></p>
    </div>
    <a href="<?= base_url('data_mahasiswa') ?>" class="back-link">Kembali ke Daftar Mahasiswa</a>
</div>