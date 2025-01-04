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
        <h1> Trackable. </h1>
        <div id="mouvements-container">
            <div class="carte">
                <p>Mouvement 1</p>
            </div>
        </div>
    </body>

    </html>
    <script>
    window.onbeforeunload = function() {
        <?php session_destroy(); ?>
    }
    </script>
<?php
}
?>