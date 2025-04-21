<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/login.css') ?>">
</head>
<body>
<div id="header">
    <div class="container">
        <nav>
            <img src="<?= base_url('public/img/logo1.png') ?>" alt="Logo" class="logo">
            <ul>
                <li><a href="<?= base_url('/') ?>">Accueil</a></li>
                <li><a href="">Mon compte</a></li>
                <li><a href="<?= base_url('/login') ?>">Se connecter</a></li>
                <li><a href="<?= base_url('/register') ?>">S'inscrire</a></li>
            </ul>
        </nav>
        <div class="form-box">
            <?php if (!empty($error_msg)): ?>
                <p style="color:red;"><?= esc($error_msg) ?></p>
            <?php endif; ?>
            <h1>Connnectez vous </h1>
            <form action="<?= base_url('/login/auth') ?>" method="post">
                <input type="text" id="username" name="username" placeholder="Pseudonyme" class="input" required>
                <br>
                <input type="password" id="password" name="password" placeholder="Mot de passe" class="input" required>
                <br>
                <input type="submit" value="Se connecter" name="ok" class="submit">
            </form>
        </div>

    </div>
</div>

</body>