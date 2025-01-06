<?php
declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_creation_mouvement(): void
{
    try {
    [$agentcoord, $agentlivr] = model_creation_mouvement();
    view_creation_mouvement($agentcoord, $agentlivr);
    } catch (Exception $e) {
        error_log(message: $e->getMessage() . PHP_EOL, message_type: 3, destination: '../../utils/logs/errors.log');
        echo "Erreur interne";
    }
}