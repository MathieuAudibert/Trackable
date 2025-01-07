<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/bdd.php';

function model_logout(): void
{
  try {
      session_destroy();
      header('Location: /');
      
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '../../utils/logs/errors.log');
        echo "Erreur :" + $e->getMessage();
    }

}