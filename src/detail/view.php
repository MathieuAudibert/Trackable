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
            <form action="/signaler-un-probleme" method="POST">
                <button type="submit" name="id_colis" id="signaler-probleme" value="<?php echo $colismvm['id_colis']; ?>">Signaler un problème 🚩</button>
            </form>
            <p>Adresse de départ : <?php echo htmlspecialchars($colismvm['lieu_depart']); ?></p>
            <p>Etape : <?php echo htmlspecialchars($colismvm['etape']); ?></p>
            <p>Adresse d'arrivée : <?php echo htmlspecialchars($colismvm['lieu_arrivee']); ?></p>
            <p>Plaque du véhicule : <?php echo htmlspecialchars($colismvm['plaque']); ?></p>
            <?php $blase=$colismvm['user_nom']. ' ' .$colismvm['prenom'] ; ?>
            <?php if ($_SESSION['user']['role_user'] === 'Agent de coordination') : ?>
                <form id="update" action="/modifier-mouvement" method="POST">
                    <input type="hidden" name="id_mouv" value="<?php echo $colismvm['id_mouv']; ?>" hidden>
                    <input type="hidden" name="id_colis" value="<?php echo $colismvm['id_colis']; ?>" hidden>
                    <input type="hidden" name="nom" value="<?php echo $colismvm['nom']; ?>" hidden>
                    <input type="hidden" name="nomlivr" value="<?php echo $nomlivre; ?>" hidden>
                    <input type="hidden" name="nomcoor" value="<?php echo $blase; ?>" hidden>
                    <input type="hidden" name="infos" value="<?php echo $colismvm['informations']; ?>" hidden>
                    <input type="hidden" name="problemes" value="<?php echo $colismvm['problemes']; ?>" hidden>
                    <input type="hidden" name="lieu_depart" value="<?php echo $colismvm['lieu_depart']; ?>" hidden>
                    <input type="hidden" name="etape" value="<?php echo $colismvm['etape']; ?>" hidden>
                    <input type="hidden" name="lieu_arr" value="<?php echo $colismvm['lieu_arrivee']; ?>" hidden>
                    <input type="hidden" name="plaque" value="<?php echo $colismvm['plaque']; ?>" hidden>
                    <input type="hidden" name="date_dep" value="<?php echo $colismvm['date_dep']; ?>" hidden>
                    <input type="hidden" name="date_arr" value="<?php echo $colismvm['date_arr']; ?>" hidden>
                    <button type="submit">Modifier</button>
                </form>
                <form id="modify" action="../../utils/formulaires/delete_mvmt.php" method="POST">
                    <input type="hidden" name="id_mouv" value="<?php echo $colismvm['id_mouv']; ?>" hidden>
                    <input type="hidden" name="id_colis" value="<?php echo $colismvm['id_colis']; ?>" hidden>
                    <button type="submit" name="id_colis" value="<?php echo $colismvm['id_colis']; ?>">Supprimer</button>
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
        let map = L.map('map').setView([48.8566, 2.3522], 6);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        let coordonnes = [];

        function afficherVille(ville, label) {
            return fetch(`../../utils/detail/get_coordinates.php?ville=${ville}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                        return null;
                    }

                    const coords = [parseFloat(data.lat), parseFloat(data.lon)];
                    L.marker(coords).addTo(map).bindPopup(`${label}: ${ville}`).openPopup();
                    return coords;
                })
                .catch(error => console.error('Erreur:', error));
        }

        const depart = "<?php echo htmlspecialchars($colismvm['lieu_depart']); ?>";
        const etape = "<?php echo htmlspecialchars($colismvm['etape']); ?>";
        const arrivee = "<?php echo htmlspecialchars($colismvm['lieu_arrivee']); ?>";

        Promise.all([
            afficherVille(depart, 'Départ'),
            afficherVille(etape, 'Etape'),
            afficherVille(arrivee, 'Arrivée')
        ]).then(coords => {
            const validCoords = coords.filter(coord => coord !== null);
            
            if (validCoords.length >= 2) {
                const polyline = L.polyline(validCoords, {
                    color: 'blue',
                    weight: 3,
                    opacity: 0.7
                }).addTo(map);
                
                map.fitBounds(polyline.getBounds());
            }
        });

    </script>



    </html>
<?php
}
?>