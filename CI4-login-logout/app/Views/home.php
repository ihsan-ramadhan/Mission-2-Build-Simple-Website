<div class="container">
    <h1>Ini adalah Home</h1>
    <p>Selamat datang, <?= esc(session()->get('username')) ?>!</p>
    <a href="<?= base_url('logout') ?>" class="logout-link">Logout</a>
    <div style="min-height: 200px; padding-bottom: 20px;"></div>
</div>