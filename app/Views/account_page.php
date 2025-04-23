<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
</head>
<body>
<div id="header">
    <div class="container">
        <nav>
            <img src="<?= base_url('public/img/logo1.png') ?>" alt="Logo" class="logo">
            <ul>
                <li><a href="<?= base_url('/client') ?>">Accueil</a></li>
                <li><a href="<?= base_url('/register') ?>">Mes réservations</a></li>
                <li><a href="<?= base_url('/account') ?>">Mon compte</a></li>
                <li><a href="<?= base_url('/logout') ?>">Se Déconnecter</a></li>
            </ul>
        </nav>
    </div>

    <h2>Modifier mes informations</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (isset($validation)) : ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/account/updateData') ?>" method="post">
        <label>Nom :</label>
        <input type="text" name="name" value="<?= esc($user['name']) ?>" readonly><br>

        <label>Prénom :</label>
        <input type="text" name="firstname" value="<?= esc($user['firstname']) ?>" readonly><br>

        <label>Pseudonyme :</label>
        <input type="text" name="username" value="<?= esc($user['username']) ?>"><br>

        <label>Email :</label>
        <input type="email" name="email" value="<?= esc($user['email']) ?>" readonly><br>

        <label>Adresse :</label>
        <input type="text" name="address" value="<?= esc($user['address']) ?>"><br>

        <label>Téléphone :</label>
        <input type="text" name="number" value="<?= esc($user['number']) ?>"><br>

        <input type="submit" value="Mettre à jour">
    </form>

    <h2>Modifier mon mot de passe</h2>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/account/updatePassword') ?>" method="post">
        <label>Ancien mot de passe :</label>
        <input type="password" name="old_password" required><br>

        <label>Nouveau mot de passe :</label>
        <input type="password" name="new_password" required><br>

        <label>Confirmer le nouveau mot de passe :</label>
        <input type="password" name="confirm_password" required><br>

        <input type="submit" value="Mettre à jour mon mot de passe">
    </form>

</body>
</html>
