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
        <?php if ($_SESSION['connecte'] === 'false') : ?>
            <div id="header">
                <a href="/index.php"><img src="\public\images\truck-svgrepo-com.svg" alt="logo" class="logo"></a>
                <a href="/register"><button class="button">S'inscrire</button></a>
                <a href="/login"><button id="secon" class="button">Se connecter</button></a>
            </div>
        <?php else : ?>
            <div id="header">
                <a href="/index.php"><img src="\public\images\truck-svgrepo-com.svg" alt="logo" class="logo"></a>
                <p><?php echo $_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom'] ?></p>
                <a href="/logout"><button class="button">Se déconnecter</button></a>
            </div>
        <?php endif; ?>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <hr>
    </head>
    <body>
    <button id="back" onclick="window.history.back()">↰ Retour</button>
    <div class="gros-rec">
    <div class="rectangle-infos">
        <?php foreach ($data as $colismvm) : ?>
            <?php   
            $nomlivre = $colismvm['nom'] . ' ' . $colismvm['prenom']; 
            foreach ($_SESSION['gather_agents'] as $agent) {
                if ($agent['role_user'] === 'Agent de livraison') {
                    $nomlivre = $agent['nom'] . ' ' . $agent['prenom'];
                }
            }
            ?>
            <h1>Detail du colis n° : <?php echo ($colismvm['id_colis']); ?></h1>
            <p>Nom du colis : <?php echo htmlspecialchars($colismvm['nom']); ?></p>
            <p>Nom Prenom de l'agent de livraison : <?php echo htmlspecialchars($nomlivre); ?></p>
            <p>Nom Prenom de l'agent de coordination responsable : <?php echo htmlspecialchars($colismvm['user_nom']. ' ' .$colismvm['prenom'] ); ?></p>
            <p>Informations supplémentaires : <?php echo htmlspecialchars($colismvm['informations']); ?></p>
            <p>Problèmes encontrées : <?php echo htmlspecialchars($colismvm['problemes']); ?></p>
            <p>Adresse de départ : <?php echo htmlspecialchars($colismvm['lieu_depart']); ?></p>
            <p>Etape : <?php echo htmlspecialchars($colismvm['etape']); ?></p>
            <p>Adresse d'arrivée : <?php echo htmlspecialchars($colismvm['lieu_arrivee']); ?></p>
            <p>Plaque du véhicule : <?php echo htmlspecialchars($colismvm['plaque']); ?></p>
            <?php if ($_SESSION['user']['role_user'] === 'Agent de coordination') : ?>
                <form id="update" action="../../utils/formulaires/update_mvmt.php" method="post">
                    <button id="modify">Modifier</button>
                </form>
                <form id="modify" action="../../utils/formulaires/delete_mvmt.php" method="post">
                    <button id="delete">Supprimer</button>
                </form>
            <?php endif; ?>
        </div>
        <div class="rectangle-container">
            <div class="rectangle-heures">
                <h2 id="gauche">Jour/Heure de départ : <?php echo htmlspecialchars($colismvm['date_dep'])?></h2><h2 id="droite">Jour/Heure d'arrivée : <?php echo htmlspecialchars($colismvm['date_arr'])?></h2>
            </div>
        
            <div class="rectangle-map">
                <h1>Carte</h1>
                <div id="map"></div>
            </div>
        </div>
        <?php endforeach; ?>   
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