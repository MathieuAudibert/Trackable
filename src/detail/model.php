<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/bdd.php';

function model_detail(int $colisId, int $userId): void
{
    try {
        $db = Database::getConnection();
        $db->beginTransaction();

        $stmt = $db->prepare("
            SELECT 
                u.nom, u.prenom, u.email, u.id_users,
                c.nom, c.date_dep, c.date_arr, 
                c.lieu_depart, c.lieu_arrivee, c.problemes, c.informations , c.id_colis
            FROM 
                trackable.colis AS c
            JOIN 
                trackable.mouvement AS m ON m.colis_id = c.id_colis
            JOIN 
                trackable.users AS u ON u.id_users = m.user_id
            WHERE 
                c.id_colis = :colisId AND u.id_users = :userId
        ");

        $stmt->bindParam(':colisId', $colisId, PDO::PARAM_INT);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $db->commit();

    } catch (Exception $e) {
        $db->rollBack();
        error_log($e->getMessage(), 3, dirname(__DIR__, 2) . '/utils/logs/errors.log');
        echo "Erreur : " . htmlspecialchars($e->getMessage());
    }
}
