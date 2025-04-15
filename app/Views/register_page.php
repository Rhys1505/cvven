<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/register.css') ?>">
</head>
<body>
<div id="header">
    <div class="container">
        <nav>
            <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="">Espace personnel</a></li>
                <li><a href="<?= base_url('/login') ?>">Se connecter</a></li>
            </ul>
        </nav>
        <div class="form-box">
            <h1>Créez votre compte</h1>
            <form>
                <input type="text" id="name" name="name" placeholder="Nom" class="input" required>
                <br>
                <input type="text" id="firstname" name="firstname" placeholder="Prénom" class="input" required>
                <br>
                <input type="text" id="username" name="username" placeholder="Pseudonyme" class="input"class="input" required>
                <br>
                <input type="text" id="address" name="address" placeholder="Adresse" class="input" required>
                <br>
                <input type="email" id="email" name="email" placeholder="Email" class="input" required>
                <br>
                <input type="tel" id="number" name="number" pattern="[0-9]{10}" placeholder="Téléphone" class="input" required>
                <br>
                <input type="password" id="password" name="password" placeholder="Mot de passe" class="input" required>
                <br>
                <input type="submit" value="M'inscrire" name="ok" class="submit">
            </form>
        </div>

    </div>
</div>

</body>

