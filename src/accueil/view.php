<?php

declare(strict_types=1);


function view_accueil(): void
{
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trackable | Accueil</title>
        <link rel="stylesheet" href="public\header.css">
        <link rel="stylesheet" href="public\accueil\style.css">
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
        <hr>
    </head>
    <body>
        <div id="titre">
            <h1> Trackable. </h1>
        </div>
        <hr id="trait-titre">
        <?php if ($_SESSION['connecte'] === 'false') : ?>
            <div id="connexion">
                <h2>Connectez-vous pour accéder à vos mouvements</h2>
            </div>
        <?php else : ?>
            <div class="recherche">
                <input type="text" id="recherche" name="recherche" placeholder="Nom du colis">
                <input type="text" id="ville-dep" name="villedep" placeholder="Ville de départ">
                <input type="text" id="ville-arr" name="villearr" placeholder="Ville d'arrivée">
                <label for="date-dep">Date de départ</label>
                <input type="date" id="date-dep">
                <label for="date-arr">Date d'arrivée</label>
                <input type="date" id="date-arr">
                <button id="recherche-btn">Rechercher</button>
            </div>
            <div id="mouvements-container">
                <?php foreach($_SESSION['fetch_mvmts'] as $mvmt) : ?>
                    <div class="carte">
                        <div class="titre-carte">
                            <h2>Colis n°<?php echo $mvmt['id_colis'] ?></h2>
                            <h3><?php echo $mvmt['nom'] ?></h3>
                        </div>
                        <div class="infos-carte">
                            <p>Adresse de départ : <?php echo $mvmt['lieu_depart'] ?></p>
                            <p>Adresse d'arrivée : <?php echo $mvmt['lieu_arrivee'] ?></p>
                            <p>Date de départ : <?php echo $mvmt['date_dep'] ?></p>
                            <p>Date d'arrivée : <?php echo $mvmt['date_arr'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="carte">
                    <button onclick="window.location.href='/creation_carte';">+</button>
                </div>
            </div>
        <?php endif; ?>
    </body>

    </html>
<?php
}
?>