<?php
declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_login(): void
{
    try {
        model_login();
        view_login();
    } catch (Exception $e) {
        error_log(message: $e->getMessage(), message_type: 3, destination: '../../utils/logs/errors.log');
        echo "Erreur interne";
    }
}