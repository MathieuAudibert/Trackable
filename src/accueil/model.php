<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/bdd.php';

function model_accueil(): void
{
  try {
    $mvmts = [];
    $pdo = Database::getConnection();
    
    $query = 'SELECT c.* FROM colis AS c JOIN mouvement AS m ON c.id_colis = m.colis_id WHERE m.user_id = :user_id';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $_SESSION['user']['id_users']);
    $stmt->execute();
    $mvmts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['fetch_mvmts'] = $mvmts ?: [];
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '../../utils/logs/errors.log');
        echo "Erreur :" + $e->getMessage();
    }

}