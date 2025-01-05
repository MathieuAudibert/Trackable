<?php
declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_detail($colisId): void
{
    try {
        if (!isset($_SESSION['user']['id_users'])) {
            throw new Exception('Veuillez vous connecter pour acceder a ce colis.');
        }
        $userId = (int) $_SESSION['user']['id_users'];
        $result = model_detail($colisId, $userId);

        if (!$result) {
            throw new Exception('Colis inexistan ou non accesible.');
        }

        view_detail($result);
        
    } catch (Exception $e) {
        error_log(message: $e->getMessage() . PHP_EOL, message_type: 3, destination: '../../utils/logs/errors.log');
        echo "Erreur interne";
    }
}