<?php

declare(strict_types=1);

function view_register(): void
{
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trackable | Inscription</title>
        <link rel="stylesheet" href="public/register/style.css">
        <link rel="stylesheet" href="public/header.css">
        <div id="header">
            <a href="/index.php"><img src="public\images\truck-svgrepo-com.svg" alt="logo" class="logo"></a>
            <a href="/login"><button class="button">Se connecter</button></a>
        </div>

        <hr>
    </head>

    <body>
        <div class="form-wrapper">

            <form action="/register" method="POST" class="register-container">
                <h1>Inscription</h1>
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
                </div>

                <div class="form-group">
                    <label for="Nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Entrez votre nom">
                </div>

                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prenom">
                </div>

                <div class="form-group">
                    <input type="radio" id="livraison" name="role">
                    <label for="livraison">Agent de livraison</label>
                    <input type="radio" id="coordination" name="role" >
                    <label for="coordination">Agent de coordination</label>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe *</label>
                    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirmer le mot de passe</label>
                    <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
                </div>

                <button type="submit">S'inscrire</button>
            </form>

        </div>
    </body>

    </html>
<?php
}
?>