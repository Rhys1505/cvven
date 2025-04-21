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
                <li><a href="<?= base_url('/register') ?>">Gérer</a></li>
                <li><a href="<?= base_url('/logout') ?>">Se Déconnecter</a></li>
            </ul>
        </nav>
    </div>
    <h1>Accueil</h1>
</body>
</html>
