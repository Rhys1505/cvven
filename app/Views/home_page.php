<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">

</head>
<body>
<header id="header">
<div id="header">
    <div class="container">
        <nav>
            <a href="<?= base_url('/') ?>">
            <img src="<?= base_url('img/favicon.ico') ?>" alt="Logo" class="logo">
            <ul>
                <li><a href="<?= base_url('/') ?>">Accueil</a></li>
                <li><a href="">Mon compte</a></li>
                <li><a href="<?= base_url('/login') ?>">Se connecter</a></li>
                <li><a href="<?= base_url('/register') ?>">S'inscrire</a></li>
            </ul>
        </nav>
</header>
<main>
        <section>
            <h1>CCVEN - Vos hôtels à bas prix</h1>
        </section>

    <section>
        <div class="search-wrapper">
            <input type="text" id="searchInput" placeholder="Cherchez votre ville de vacances" oninput="searchCity()" />
            <ul id="suggestionsList" class="suggestions-list"></ul> <!-- Liste pour les suggestions -->
        </div>
        <button>Rechercher</button>
    </section>
    <!-- Inclure le fichier JS -->
    <script src="<?= base_url('script.js') ?>"></script>


    <section class="bubbles-container">
        <a href="<?= base_url('/villes/paris') ?>">
        <div class="bubble">
                    <img src="<?= base_url('img/Paris.jpg'); ?>" alt="Paris" />
                    <span>Paris</span>
                </div>
            </a>
        <a href="<?= base_url('/villes/lille') ?>">
                <div class="bubble">
                    <img src="<?= base_url('img/lille.JPG'); ?>" alt="Paris" />
                    <span>Lille</span>
                </div>
            </a>
        <a href="<?= base_url('/villes/marseille') ?>">
        <div class="bubble">
                    <img src="<?= base_url('img/marseille.png'); ?>" alt="Paris" />
                    <span>Marseille</span>
                </div>
            </a>
        <a href="<?= base_url('/villes/lyon') ?>">
        <div class="bubble">
                    <img src="<?= base_url('img/Lyon.jpeg'); ?>" alt="Paris" />
                    <span>Lyon</span>
                </div>
            </a>
        <a href="<?= base_url('/villes/rennes') ?>">
                <div class="bubble">
                    <img src="<?= base_url('img/rennes.jpg'); ?>" alt="Paris" />
                    <span>Rennes</span>
                </div>
            </a>
        </section>
</main>
        <footer>
            <p>&copy; 2025 CCVEN. Tous droits réservés. <a href="#">Mentions légales</a></p>
        </footer>
</body>
</html>