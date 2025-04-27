<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site de réservation d'hôtel">
    <title>Réservation Hôtel</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/villes.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('img/favicon.ico'); ?>">
</head>
<body>

<header id="header">
    <div class="container">
        <nav>
            <a href="<?= base_url('/') ?>">
                <img src="<?= base_url('img/favicon.ico') ?>" alt="Logo" class="logo">
            </a>
            <ul>
                <li><a href="<?= base_url('/') ?>">Accueil</a></li>
                <li><a href="<?= base_url('/mon-compte') ?>">Mon compte</a></li>
                <li><a href="<?= base_url('/login') ?>">Se connecter</a></li>
                <li><a href="<?= base_url('/register') ?>">S'inscrire</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <?= $this->renderSection('content') ?>
</main>

<footer>
    <div class="container">
        <p>&copy; <?= date('Y'); ?> Hôtel de Paris. Tous droits réservés.</p>
        <a href="<?= base_url('/mentions-legales') ?>">Mentions légales</a>
    </div>
</footer>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = (i === index) ? 'block' : 'none';
        });
    }

    function moveSlide(step) {
        currentSlide = (currentSlide + step + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    document.addEventListener('DOMContentLoaded', () => {
        showSlide(currentSlide);
    });
</script>

</body>
</html>
