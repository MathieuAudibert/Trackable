<?php
declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_register(): void
{
    try {
        model_register();
        view_register();
    } catch (Exception $e) {
        error_log(message: $e->getMessage(), message_type: 3, destination: '../../utils/logs/errors.log');
        echo "Erreur interne";
    }
}