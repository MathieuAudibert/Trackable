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
        <link rel="stylesheet" href="public/header.css">
        <link rel="stylesheet" href="public/accueil/style.css">
        <div id="header">
            <a href="/index.php"><img src="public\images\truck-svgrepo-com.svg" alt="logo" class="logo"></a>
            <a href="/register"><button class="button">S'inscrire</button></a>
        </div>
        <hr>
    </head>

    </html>
<?php
}
?>