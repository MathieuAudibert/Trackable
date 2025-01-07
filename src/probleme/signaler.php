<?php
declare(strict_types=1);

function signaler_probleme(): void
{
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trackable | Signaler un probleme</title>
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
        <form action="../../utils/formulaires/signaler_probleme.php" method="POST">
            <h1>Signaler un problème</h1>
            <input type="text" name="probleme" placeholder="Problème rencontré" required>
            <textarea name="informations" placeholder="Informations supplémentaires" required></textarea>
            <input type="hidden" name="id_colis" value="<?php echo $_POST['id_colis'] ?>">
            <button type="submit">Signaler</button>
        </form>
    </body>

    </html>
<?php
}
?>