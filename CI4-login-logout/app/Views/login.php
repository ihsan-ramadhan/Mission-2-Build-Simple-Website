<div class="container">
    <h1>Login</h1>
    <div class="login-form">
        <?php if (isset($error) && !empty($error)): ?>
            <p style="color: red; margin-bottom: 10px;"><?= esc($error) ?></p>
        <?php endif; ?>
        <form action="<?= base_url('login') ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</div>