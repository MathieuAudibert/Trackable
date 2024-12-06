<?php

declare(strict_types=1);

function view_login(): void
{
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trackable | Connexion</title>
        <link rel="stylesheet" href="public/login/style.css">
        <link rel="stylesheet" href="public/header.css">
        <div id="header">
            <a href="/index.php"><img src="public\images\truck-svgrepo-com.svg" alt="logo" class="logo"></a>
            <a href="/register"><button class="button">S'inscrire</button></a>
        </div>
    </head>

    <body>


        <div class="form-wrapper">
            <form action="/login" method="POST"class="login-container">
                <h1>Connexion</h1>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                </div>

                <button type="submit" class="login-button">Se connecter</button>
            </form>

        </div>
    </body>

    </html>
<?php
}
?>