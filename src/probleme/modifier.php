<?php
declare(strict_types=1);

function modifier_mouvement(): void
{
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trackable | Modifier un mouvement</title>
        <link rel="stylesheet" href="/public/login/style.css">
        <link rel="stylesheet" href="/public/header.css">
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
        <form action="../../utils/formulaires/update_mvmt.php" method="POST">
            <h1>Modifier un mouvement</h1>
            
            
            <label for="nom_colis">Nom du colis :</label>
            <input type="text" id="nom_colis" name="nom_colis" value="CACA" readonly>
            
            <label for="livreur">Nom et prénom de l'agent de livraison :</label>
            <input type="text" id="livreur" name="livreur" value="Inconnu Inconnu" required>
            
            <label for="coordination">Nom et prénom de l'agent de coordination responsable :</label>
            <input type="text" id="coordination" name="coordination" value="" required>
            
            <label for="infos_sup">Informations supplémentaires :</label>
            <textarea id="infos_sup" name="infos_sup" readonly required></textarea>
            
            <label for="problemes">Problèmes rencontrés :</label>
            <textarea id="problemes" name="problemes" readonly required>lucas se crame une doréee</textarea>
            
            <label for="adresse_depart">Adresse de départ :</label>
            <input type="text" id="adresse_depart" name="adresse_depart" value="38 allée de la marche 92380" readonly required>
            
            <label for="etape">Étape :</label>
            <input type="text" id="etape" name="etape" value="10 Rue adolphe petrement 93600" readonly required>
            
            <label for="adresse_arrivee">Adresse d'arrivée :</label>
            <input type="text" id="adresse_arrivee" name="adresse_arrivee" value="Melun" readonly required>
            
            <label for="plaque">Plaque du véhicule :</label>
            <input type="text" id="plaque" name="plaque" value="AB-412-BP" readonly required>
            
            <button type="submit">Signaler</button>
        </form>
    </body>

    </html>
<?php
}
?>
