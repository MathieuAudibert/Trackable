<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/bdd.php';

function model_detail($colisId, $userId): array
{
    try {
        $mvmts = [];
        $pdo = Database::getConnection();
        
        $query = 'SELECT c.*, u.nom AS user_nom, u.prenom, u.email, u.role_user, u.cle_entreprise FROM colis AS c JOIN mouvement AS m ON c.id_colis = m.colis_id JOIN users as u ON u.id_users = m.user_id WHERE m.user_id = :user_id AND c.id_colis = :colis_id';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $_SESSION['user']['id_users']);
        $stmt->bindParam(':colis_id', $colisId);
        $stmt->execute();
        $mvmts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['gather_mvmts'] = $mvmts ?: []; 
        return $mvmts;   
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '../../utils/logs/errors.log');
        echo "Erreur : " . htmlspecialchars($e->getMessage());
    }
}
