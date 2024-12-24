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
        <script src="public/scripts/ongletsReg.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/public/images/truck-svgrepo-com.svg">
        <div id="header">
            <a href="/index.php"><img src="public/images/truck-svgrepo-com.svg" alt="logo" class="logo"></a>
            <a href="/login"><button class="button">Se connecter</button></a>
        </div>
        <hr>
    </head>

    <body>
        <div class="form-wrapper">
            <form action="/utils/formulaires/register.php" method="POST" class="register-container">
                <h1>Inscription</h1>

                <div class="form-page">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom *</label>
                        <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom *</label>
                        <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
                    </div>
                </div>

                <div class="form-page" style="display: none;">
                    <div class="form-group">
                        <label for="role">Rôle *</label>
                        <div>
                            <input type="radio" id="role-agentlivr" name="role" value="agentlivr">
                            <label for="role-agentlivr">Agent de livraison</label>
                            <input type="radio" id="role-agentcoord" name="role" value="agentcoord">
                            <label for="role-agentcoord">Agent de coordination</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cle_entreprise">Clé (fournie par votre entreprise) *</label>
                        <input type="text" id="cle_entreprise" name="cle_entreprise" placeholder="Entrez votre clé" required>
                    </div>
                </div>

                    <div class="form-page" style="display: none;">
                    <div class="form-group">
                        <label for="password">Mot de passe *</label>
                        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirmer le mot de passe *</label>
                        <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
                    </div>
                </div>

                <button type="button" id="prev-btn" onclick="showPage(currentPage - 1)" style="display: none;">Précédent</button>
                <button type="button" id="next-btn" onclick="showPage(currentPage + 1)">Suivant</button>
                <button type="submit" id="submit-btn" style="display: none;">S'inscrire</button>
            </form>
        </div>
    </body>

    </html>
<?php
}
?>