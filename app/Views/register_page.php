<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/register.css') ?>">
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
        <?php if (!empty($error_msg)) : ?>
            <div class="alert alert-danger">
                <?= esc($error_msg) ?>
            </div>
        <?php endif; ?>
        <div class="form-box">
            <h1>Créez votre compte</h1>
            <form action="<?= base_url('/register/create') ?>"  method="post">
                <?= csrf_field() ?>
                <input type="text" id="name" name="name" placeholder="Nom" class="input" required>
                <br>
                <input type="text" id="firstname" name="firstname" placeholder="Prénom" class="input" required>
                <br>
                <input type="text" id="username" name="username" placeholder="Pseudonyme" class="input" required>
                <?= isset($validation) ? $validation->getError('username') : '' ?>
                <br>
                <input type="text" id="address" name="address" placeholder="Adresse" class="input" required>
                <br>
                <input type="email" id="email" name="email" placeholder="Email" class="input" required>
                <?= isset($validation) ? $validation->getError('email') : '' ?>
                <br>
                <input type="tel" id="number" name="number" pattern="[0-9]{10}" placeholder="Téléphone" class="input" required>
                <br>
                <input type="password" id="password" name="password" placeholder="Mot de passe" class="input" required>
                <?= isset($validation) ? $validation->getError('password') : '' ?>
                <br>
                <input type="submit" value="M'inscrire" name="ok" class="submit">
            </form>
        </div>

    </div>
</div>

</body>

