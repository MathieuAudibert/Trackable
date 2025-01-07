<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/bdd.php';

function model_detail($colisId, $userId): array
{
    try {
        $mvmts = [];
        $agents = [];
        $pdo = Database::getConnection();
        
        $query = 'SELECT c.*, u.nom AS user_nom, u.prenom, u.email, u.role_user, u.cle_entreprise FROM colis AS c JOIN mouvement AS m ON c.id_colis = m.colis_id JOIN users as u ON u.id_users = m.user_id WHERE m.user_id = :user_id AND c.id_colis = :colis_id';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $_SESSION['user']['id_users']);
        $stmt->bindParam(':colis_id', $colisId);
        $stmt->execute();

        $query2 = 'SELECT m.*, u.nom, u.prenom, u.role_user FROM mouvement AS m JOIN users AS u ON m.user_id = u.id_users WHERE m.colis_id = :colis_id';
        $stmt2 = $pdo->prepare($query2);
        $stmt2->bindParam(':colis_id', $colisId);
        $stmt2->execute();

        $mvmts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $agents = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['gather_mvmts'] = $mvmts ?: []; 
        $_SESSION['gather_agents'] = $agents ?: [];
        return $mvmts;   
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '../../utils/logs/errors.log');
        echo "Erreur : " . htmlspecialchars($e->getMessage());
    }
}
