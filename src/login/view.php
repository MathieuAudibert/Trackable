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
        <link rel="stylesheet" href="/public/login/style.css">
        <link rel="stylesheet" href="/public/header.css">
        <link rel="icon" type="image/x-icon" href="/public/images/truck-svgrepo-com.svg">
        <div id="header">
            <a href="/index.php"><img src="public/images/truck-svgrepo-com.svg" alt="logo" class="logo"></a>
            <a href="/register"><button class="button">S'inscrire</button></a>
        </div>
        <hr>
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
                    <label for="mdp">Mot de passe</label>
                    <input type="password" id="mdp" name="mdp" placeholder="Entrez votre mot de passe" required>
                </div>

                <div class="form-group">
                    <label for="cle_entreprise">Clé (fournie par votre entreprise) *</label>
                    <input type="text" id="cle_entreprise" name="cle_entreprise" placeholder="Entrez votre clé" required>
                </div>

                <button type="submit" class= "login-button">Se connecter</button>
            </form>

        </div>
    </body>

    </html>
<?php
}
?>