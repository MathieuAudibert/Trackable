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
        <script src="public/scripts/passwdValidation.js" defer></script>
        <script src="public/scripts/passwdVisibility.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/public/images/truck-svgrepo-com.svg">
        <div id="header">
            <a href="/index.php"><img src="public/images/truck-svgrepo-com.svg" alt="logo" class="logo"></a>
            <a href="/login"><button class="button">Se connecter</button></a>
        </div>
        <hr>
    </head>

    <body>
        <div class="form-wrapper">
            <form action="../../utils/formulaires/register.php" method="POST" class="register-container">
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
                        <label for="role_user">Rôle *</label>
                        <div>
                            <input type="radio" id="role-agentlivr" name="role_user" value="agentlivr">
                            <label for="role-agentlivr">Agent de livraison</label>
                            <input type="radio" id="role-agentcoord" name="role_user" value="agentcoord">
                            <label for="role-agentcoord">Agent de coordination</label>
                        </div>
                    </div>
                </div>

                <div class="form-page" style="display: none;">
                    <div class="form-group">
                        <label for="mdp">Mot de passe *</label>
                        <input type="password" id="mdp" name="mdp" placeholder="Entrez votre mot de passe" required>
                        <img src="../../public/images/eye-close.png" alt="eye" id="eye-mdp">
                    </div>
                    <div class="form-group">
                        <label for="confirm-mdp">Confirmer le mot de passe *</label>
                        <input type="password" id="confirm-mdp" name="confirm_mdp" placeholder="Confirmez votre mot de passe" required>
                        <img src="../../public/images/eye-close.png" alt="eye" id="eye-cmdp">
                    </div>
                </div>
                <span id="password-error" style="color: red; font-size: 12px; display: none;">Les mots de passe ne correspondent pas</span>

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