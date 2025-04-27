<?= $this->extend('main') ?>

<?= $this->section('content') ?>

<h1 class="city-title">Bienvenue au grand Hôtel de Paris</h1>

<!-- Carrousel d'images de l'hôtel -->
<div class="carousel">
    <button class="prev" onclick="moveHotelSlide(-1)">❮</button>
    <div class="slides">
        <img src="<?= base_url('img/hotel_paris_1.jpg') ?>" class="slide" />
        <img src="<?= base_url('img/hotel_paris_2.jpg') ?>" class="slide" />
    </div>
    <button class="next" onclick="moveHotelSlide(1)">❯</button>
</div>

<!-- Présentation des chambres -->
<div class="bubbles-container">
    <?php
    $rooms = [
        [
            'type' => 'Chambre Double',
            'images' => ['chambre_paris_1_1.jpg', 'chambre_paris_1_2.jpg', 'chambre_paris_1_3.jpg'],
            'description' => [
                'Lit double',
                'Climatisation',
                'Wi-Fi gratuit',
                'Sèche-cheveux'
            ]
        ],
        [
            'type' => 'Chambre Triple',
            'images' => ['chambre_paris_2_1.jpg', 'chambre_paris_2_2.jpg', 'chambre_paris_2_3.jpg'],
            'description' => [
                'Lit double avec un lit simple',
                'Climatisation',
                'Wi-Fi gratuit',
                'Sèche-cheveux'
            ]
        ],
        [
            'type' => 'Chambre Quadruple',
            'images' => ['chambre_paris_3_1.jpg', 'chambre_paris_3_2.jpg', 'chambre_paris_3_3.jpg'],
            'description' => [
                '4 lits simples',
                'Climatisation',
                'Wi-Fi gratuit',
                'Sèche-cheveux'
            ]
        ],
        [
            'type' => 'Suite',
            'images' => ['chambre_paris_4_1.webp', 'chambre_paris_4_2.webp', 'chambre_paris_4_3.avif'],
            'description' => [
                '2 chambres avec lits doubles',
                'Vue sur la Tour Eiffel',
                'Climatisation',
                'Wi-Fi gratuit',
                'Sèche-cheveux'
            ]
        ],
        [
            'type' => 'Suite Présidentielle',
            'images' => ['chambre_paris_5_1.jpg', 'chambre_paris_5_2.webp', 'chambre_paris_5_3.jpg'],
            'description' => [
                '3 chambres avec lits doubles',
                'Vue sur la Tour Eiffel',
                'Jacuzzi',
                'Climatisation',
                'Wi-Fi gratuit',
                'Sèche-cheveux'
            ]
        ]
    ];

    // On initialise un compteur pour l'index
    $roomIndex = 0;

    foreach ($rooms as $room) {
        ?>
        <!-- Bulle de chambre -->
        <div class="bubble">
            <h3><?= $room['type'] ?></h3>
            <div class="room-carousel">
                <button class="prev" onclick="moveRoomSlide(-1, <?= $roomIndex ?>)">❮</button>
                <div class="room-slides">
                    <?php foreach ($room['images'] as $image): ?>
                        <img src="<?= base_url('img/' . $image) ?>" class="room-slide" />
                    <?php endforeach; ?>
                </div>
                <button class="next" onclick="moveRoomSlide(1, <?= $roomIndex ?>)">❯</button>
            </div>

            <ul>
                <?php foreach ($room['description'] as $item): ?>
                    <li><?= $item ?></li>
                <?php endforeach; ?>
            </ul>

            <?php if (!session()->get('isLoggedIn')): ?>
                <a href="<?= base_url('/connexion') ?>" class="reserve-button">Se connecter pour réserver</a>
            <?php else: ?>
                <a href="<?= base_url('/reservation/choisir-dates') ?>" class="reserve-button">Réserver</a>
            <?php endif; ?>
        </div>
        <?php
        $roomIndex++;  // Incrémenter l'index pour chaque chambre
    }
    ?>
</div>
<!-- Modale pour afficher l'image en grand -->
<div id="modal" class="modal">
    <span class="close" id="closeModal">&times;</span>
    <img class="modal-content" id="modalImage" />
    <div id="caption"></div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialiser l'affichage pour l'hôtel
        showHotelSlide(currentSlideHotel);

        // Initialiser l'affichage pour chaque chambre
        const bubbles = document.querySelectorAll('.bubble');
        bubbles.forEach(bubble => {
            const roomSlides = bubble.querySelectorAll('.room-slide');
            roomSlides.forEach((slide, i) => {
                slide.style.display = (i === 0) ? 'block' : 'none'; // Affiche seulement la 1ère image de chaque chambre
            });
        });

        // Ajouter l'événement de clic sur les images des chambres pour ouvrir la modale
        const roomImages = document.querySelectorAll('.bubble .room-slide');
        roomImages.forEach(image => {
            image.addEventListener('click', function() {
                modal.style.display = 'block'; // Afficher la modale
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            });
        });
    });


    // Fonction qui gère les images du carrousel de l'hôtel
    let currentSlideHotel = 0;
    const hotelSlides = document.querySelectorAll('.carousel .slide');

    function showHotelSlide(index) {
        hotelSlides.forEach((slide, i) => {
            slide.style.display = (i === index) ? 'block' : 'none';
        });
    }

    function moveHotelSlide(step) {
        currentSlideHotel = (currentSlideHotel + step + hotelSlides.length) % hotelSlides.length;
        showHotelSlide(currentSlideHotel);
    }

    // Fonction qui gère les images du carrousel des chambres
    function moveRoomSlide(step, roomIndex) {
        const roomSlides = document.querySelectorAll(`.bubble:nth-child(${roomIndex + 1}) .room-slide`);
        let roomCurrentSlide = 0;

        // Trouver l'index de l'image actuellement visible
        roomSlides.forEach((slide, i) => {
            if (slide.style.display === 'block') {
                roomCurrentSlide = i;
            }
        });

        // Calculer l'index de l'image suivante ou précédente
        roomCurrentSlide = (roomCurrentSlide + step + roomSlides.length) % roomSlides.length;
        showRoomSlide(roomCurrentSlide, roomIndex);
    }

    function showRoomSlide(index, roomIndex) {
        const roomSlides = document.querySelectorAll(`.bubble:nth-child(${roomIndex + 1}) .room-slide`);
        roomSlides.forEach((slide, i) => {
            slide.style.display = (i === index) ? 'block' : 'none';
        });
    }

    // Modale pour afficher l'image en grand
    const modal = document.getElementById('modal');
    const modalImg = document.getElementById('modalImage');
    const captionText = document.getElementById('caption');
    const closeModal = document.getElementById('closeModal');

    // Fermeture de la modale
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Fermer la modale lorsqu'on clique en dehors de l'image
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>

<?= $this->endSection() ?>
