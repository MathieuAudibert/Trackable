<?php

declare(strict_types=1);

function perf(): void
{
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trackable | Performances</title>
        <link rel="stylesheet" href="public/register/style.css">
        <link rel="stylesheet" href="public/header.css">
        <script src="public/scripts/ongletsReg.js" defer></script>
        <script src="public/scripts/passwdValidation.js" defer></script>
        <script src="public/scripts/passwdVisibility.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/public/images/truck-svgrepo-com.svg">
        <hr>
    </head>

    <body>
        <?php var_dump($_SESSION['user']) ?>
        <br>
        <hr>
        <br>
        <?php var_dump($_SESSION['fetch_mvmts']) ?>
        <br>
        <hr>
        <br>
        <?php var_dump($_SESSION['connecte']) ?>
        <br>
        <hr>
        <br>
        <p>gather mvmts</p>
        <?php var_dump($_SESSION['gather_mvmts']) ?>
        <br>
        <hr>
        <br>
        <?php var_dump($_SESSION['gather_agents']) ?>
    </body>

    </html>
<?php
}
?>