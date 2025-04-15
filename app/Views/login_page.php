<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/login.css') ?>">
</head>
<body>
<div id="header">_
    <div class="container">
        <nav>
            <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="">Mon compte</a></li>
                <li><a href="login_page.php">Se connecter</a></li>
            </ul>
        </nav>
        <div class="form-box">
            <h1>Connnectez vous </h1>
            <form>
                <input type="email" id="pseudo" name="email" placeholder="Email" class="input" required>
                <br>
                <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" class="input" required>
                <br>
                <input type="submit" value="Se connecter" name="ok" class="submit">
            </form>
        </div>

    </div>
</div>

</body>