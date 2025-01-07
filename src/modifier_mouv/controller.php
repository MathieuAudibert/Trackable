<?php
declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_modifier_mouv(): void
{
    try {
        model_modifier_mouv();
        view_modifier_mouv();
    } catch (Exception $e) {
        error_log(message: $e->getMessage() . PHP_EOL, message_type: 3, destination: '../../utils/logs/errors.log');
        echo "Erreur interne";
    }
}