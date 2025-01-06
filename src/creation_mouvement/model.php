<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/bdd.php';

function model_creation_mouvement(): array
{
  try {
    $agentcoord = [];
    $agentlivr = [];
    $pdo = Database::getConnection();
    
    $query = "SELECT u.nom, u.prenom, u.id_users FROM users AS u WHERE u.cle_entreprise = :cle_entreprise AND u.role_user = 'Agent de coordination'";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':cle_entreprise', $_SESSION['user']['cle_entreprise']);
    $stmt->execute();
    $agentcoord = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT u.nom, u.prenom, u.id_users FROM users AS u WHERE u.cle_entreprise = :cle_entreprise AND u.role_user = 'Agent de livraison'";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':cle_entreprise', $_SESSION['user']['cle_entreprise']);
    $stmt->execute();
    $agentlivr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return [$agentcoord, $agentlivr];

    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '../../utils/logs/errors.log');
        echo "Erreur :" . $e->getMessage();
    }

}