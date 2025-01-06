<?php

declare(strict_types=1);

function view_creation_mouvement(): void
{
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trackable | Creation de mouvement</title>
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
        <h1> Créer un mouvement </h1>
        <div id="formulaires-container">
            <div class="formulaire-colis">
                <input type="text" id="nom-colis" name="nom-colis" placeholder="Nom du colis">
                <label for="datedep">Date de départ</label>
                <input type="datetime-local" id="datedep" name="datedep">
                <label for="datearr">Date d'arrivée</label>
                <input type="datetime-local" id="datearr" name="datearr">
                <input type="text" id="adresse-dep" name="adresse-dep" placeholder="Adresse de départ">
                <input type="text" id="adresse-arr" name="adresse-arr" placeholder="Adresse d'arrivée">
                <input type="text" id="infos" name="infos" placeholder="Informations supplémentaires">
                <input type="text" id="problemes" name="problemes" hidden>
            </div>
        </div>
        <div id="formulaire-users">
            <input type="text" 
        </div>
    </html>
<?php
}
?>