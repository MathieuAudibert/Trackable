<?php

declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_login(): void
{
    try {
        $loginSuccess = model_login();
        if ($loginSuccess) {
            view_login();
        } else {
            echo "<p>Erreur : Identifiants invalides.</p>";
            view_login();
        }
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '../../utils/logs/errors.log');
        echo "Erreur interne";
    }
}
?>
