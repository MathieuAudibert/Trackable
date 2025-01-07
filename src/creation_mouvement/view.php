<?php

declare(strict_types=1);

function view_creation_mouvement(array $agentcoord, array $agentlivr): void
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
        <form id="creation_mouvement" action="/utils/formulaires/creer_mvmt.php" method="post">
            <h1> Créer un mouvement </h1>
            <div id="formulaires-container">
                <h2> Coté colis </h2>
                <div class="formulaire-colis">
                    <input type="text" id="nom-colis" name="nom-colis" placeholder="Nom du colis">
                    <label for="datedep">Date de départ</label>
                    <input type="datetime-local" id="datedep" name="datedep">
                    <label for="datearr">Date d'arrivée</label>
                    <input type="datetime-local" id="datearr" name="datearr">
                    <input type="text" id="adresse-dep" name="adresse-dep" placeholder="Adresse de départ">
                    <input type="text" id="adresse-arr" name="adresse-arr" placeholder="Adresse d'arrivée">
                    <input type="text" id="etape" name="etape" placeholder="etape">
                    <input type="text" id="infos" name="infos" placeholder="Informations supplémentaires">
                    <input type="text" id="problemes" name="problemes" value="Non" hidden>
                </div>
            </div>
            <div id="formulaire-users">
                <h2>Coté de l'entreprise</h2>
                <input type="text" id="cle-entreprise" name="cle-entreprise" placeholder="Clé de l'entreprise" value="<?php echo $_SESSION['user']['cle_entreprise'] ?>" readonly>
                <fieldset>
                    <legend>Agents de coordination</legend>
                    <select id="agentcoord-assigne">
                        <option value="<?php $_SESSION['user']['nom'] . ' '. $_SESSION['user']['prenom'] ?>;">--Me l'assigner--</option>
                        <?php foreach ($agentcoord as $agent): ?>
                            <option value="<?= htmlspecialchars($agent['nom'] . ' ' . $agent['prenom']) ?>">
                                <?= htmlspecialchars($agent['nom'] . ' ' . $agent['prenom']) ?>
                            </option>
                            <input type="text" id="agentcoord-assigne" name="agentcoord-assigne" hidden value="<?php echo $agent['id_users'] ?>">
                        <?php endforeach; ?>
                    </select>
                </fieldset>
                <fieldset>
                    <legend>Agents de livraison</legend>
                    <select id="agentlivr-assigne">
                        <option value="">--Sélectionner un agent--</option>
                        <?php foreach ($agentlivr as $agent): ?>
                            <option value="<?= htmlspecialchars($agent['nom'] . ' ' . $agent['prenom']) ?>">
                                <?= htmlspecialchars($agent['nom'] . ' ' . $agent['prenom']) ?>
                            </option>
                            <input type="text" id="agentlivr-assigne" name="agentlivr-assigne" hidden value="<?php echo $agent['id_users'] ?>">
                        <?php endforeach; ?>
                    </select>
                </fieldset>
                <input type="text" id="plaque" name="plaque" placeholder="Plaque du véhicule">
            </div>
            <input type="submit" value="Créer le mouvement">
        </form>
    </html>
<?php
}
?>