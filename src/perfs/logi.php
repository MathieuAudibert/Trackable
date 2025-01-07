<?php

declare(strict_types=1);

function logi(): void
{
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trackable | Logs</title>
        <link rel="stylesheet" href="public/logi.css">
        <link rel="stylesheet" href="public/header.css">
        <script src="public/scripts/ongletsReg.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/public/images/truck-svgrepo-com.svg">
        <hr>
    </head>

    <body>
        <?php 
        $pdo = Database::getConnection();
        $query = 'SELECT * FROM log_trackable';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $logos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php foreach($logos as $log) : ?>
            <p><?php echo $log['mouv_id'] ?></p>
            <p><?php echo $log['user_id'] ?></p>
            <p><?php echo $log['colis_id'] ?></p>
            <p><?php echo htmlspecialchars($log['action']) ?></p>
            <p><?php echo $log['datelog'] ?></p>
        <?php endforeach; ?>
    </body>

    </html>
<?php
}
?>