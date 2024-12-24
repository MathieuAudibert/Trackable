<?php

declare(strict_types=1);

function view_detail($data): void
{
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trackable | Detail du colis</title>
        <link rel="stylesheet" href="public/header.css">
        <link rel="stylesheet" href="public/detail/style.css">
        <link rel="icon" type="image/x-icon" href="/public/images/truck-svgrepo-com.svg">
        <div id="header">
            <a href="/index.php"><img src="public\images\truck-svgrepo-com.svg" alt="logo" class="logo"></a>
            <a href="/register"><button class="button">S'inscrire</button></a>
        </div>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <hr>
    </head>
    <body>

    <div class="gros-rec">
    <div class="rectangle-infos">
        <?php foreach ($data as $row) : ?>
            <h1>Detail du colis n° : <?php echo htmlspecialchars(($row['colisId'])); ?></h1>
            <p>Nom du colis : <?php echo htmlspecialchars('a'); ?></p>
            <p>Prenom de l'agent de livraison : <?php echo htmlspecialchars('a'); ?></p>
            <p>Nom de l'agent de livraison : <?php echo htmlspecialchars('a'); ?></p>
            <p>Prenom de l'agent de coordination responsable : <?php echo htmlspecialchars('a'); ?></p>
            <p>Nom de l'agent de coordination responsable : <?php echo htmlspecialchars('a'); ?></p>
            <p>Adresse de départ : <?php echo htmlspecialchars('a'); ?></p>
            <p>Adresse de départ : <?php echo htmlspecialchars('a'); ?></p>
            <p>Informations supplémentaires : <?php echo htmlspecialchars('a'); ?></p>
            <p>Problèmes encontrées : <?php echo htmlspecialchars('a'); ?></p>
            <p>Adresse de départ : <?php echo htmlspecialchars('a'); ?></p>
            <p>Adresse d'arrivée : <?php echo htmlspecialchars('a'); ?></p>
        <?php endforeach; ?>
        </div>
        <div class="rectangle-container">
            <div class="rectangle-heures">
                <h1 id="gauche">Heure de départ : <?php echo htmlspecialchars('a')?></h1><h1 id="droite">Heure d'arrivée : <?php echo htmlspecialchars('b')?></h1>
            </div>
        
            <div class="rectangle-map">
                <h1>Carte</h1>
                <div id="map"></div>
            </div>
        </div>
    </div>
    </body>
    <script>
        let map = L.map('map').setView([48.8566, 2.3522], 6); // = paname

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        
        function afficherVille(ville, label) {
            fetch(`../../utils/get_coordinates.php?ville=${ville}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                console.error(data.error);
                return;
                }

                const coords = [parseFloat(data.lat), parseFloat(data.lon)];
                L.marker(coords).addTo(map).bindPopup(`${label}: ${ville}`).openPopup();
                map.setView(coords, 8);
            })
            .catch(error => console.error('Erreur:', error));
        }
        afficherVille(villes.depart, 'Depart');
        afficherVille(villes.arrivee, 'Arrivee');
    </script>


    </html>
<?php
}
?>