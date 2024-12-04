<?php
declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_detail(): void
{
    try {
        /*if (!isset($_GET['colisId'])) {
            throw new Exception('Identifiant du colis manquant ou invalide.');
        }
        $colisId = $_GET['colisId'];*/
        $colisId = 1;
        $userId = 1;
        
        $result = model_detail($colisId, $userId);
        view_detail($result);
    } catch (Exception $e) {
        error_log(message: $e->getMessage() . PHP_EOL, message_type: 3, destination: '../../utils/logs/errors.log');
        echo "Erreur interne";
    }
}