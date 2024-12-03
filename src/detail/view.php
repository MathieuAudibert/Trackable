<?php

declare(strict_types=1);

function view_detail(): void
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
        <div id="header">
            <a href="/index.php"><img src="public\images\truck-svgrepo-com.svg" alt="logo" class="logo"></a>
            <a href="/register"><button class="button">S'inscrire</button></a>
        </div>
        <hr>
    </head>
    <body>

    <div class="gros-rec">
    <div class="rectangle-infos">
            <h1>Detail du colis n° : <?php echo htmlspecialchars('a'); ?></h1>
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
        </div>
        <div class="rectangle-container">
            <div class="rectangle-heures">
                <h1 id="gauche">Heure de départ</h1><h1 id="droite">Heure d'arrivée</h1>
                <!--- AFFICHER date_dep etc... --->
            </div>
        
            <div class="rectangle-map">
                <h1>Map</h1>
                <!--- AFFICHER MAP GOOGLE API --->
            </div>
        </div>
    </div>
    </body>

    </html>
<?php
}
?>