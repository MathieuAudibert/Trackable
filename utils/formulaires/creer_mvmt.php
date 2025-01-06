<?php
declare(strict_types=1);

require_once dirname(__DIR__, 1) . '/bdd.php';

function creer_mouvement(): void
{
    try {
        
    } catch (Exception $e) {
        error_log(message: $e->getMessage() . PHP_EOL, message_type: 3, destination: '../../utils/logs/errors.log');
        echo "Erreur interne";
    }
}