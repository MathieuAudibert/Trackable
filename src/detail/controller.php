<?php
declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_detail(): void
{
    try {
        model_detail();
        view_detail();
    } catch (Exception $e) {
        error_log(message: $e->getMessage(), message_type: 3, destination: '../../utils/logs/errors.log');
        echo "Erreur interne";
    }
}