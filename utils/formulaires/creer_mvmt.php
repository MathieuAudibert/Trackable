<?php
declare(strict_types=1);

require_once dirname(__DIR__, 1) . '/bdd.php';

function creer_mouvement(): void
{
    try {
        if (!empty($_POST)) {
            $nomColis = $_POST['nom-colis'] ?? null;
            $dateDep = $_POST['datedep'] ?? null;
            $dateArr = $_POST['datearr'] ?? null;
            $adresseDep = $_POST['adresse-dep'] ?? null;
            $adresseArr = $_POST['adresse-arr'] ?? null;
            $infos = $_POST['infos'] ?? null;
            $problemes = $_POST['problemes'] ?? null;
            $plaque = $_POST['plaque'] ?? null;
            $cleEntreprise = $_POST['cle-entreprise'] ?? null;

            $id_users_livr = $_POST['agentlivr-assigne'] ?? null;
            $id_users_coord = $_POST['agentcoord-assigne'] ?? null;

            if (!$nomColis || !$dateDep || !$dateArr || !$adresseDep || !$adresseArr || !$id_users_livr || !$id_users_coord) {
                throw new Exception("Les champs obligatoires ne sont pas remplis.");
            }

            $pdo = Database::getConnection();

            $queryColis = "
                INSERT INTO colis 
                (nom, date_dep, date_arr, informations, problemes, lieu_arrivee, lieu_depart, plaque) 
                VALUES 
                (:nom, :date_dep, :date_arr, :informations, :problemes, :lieu_arrivee, :lieu_depart, :plaque)
            ";
            $stmtColis = $pdo->prepare($queryColis);
            $stmtColis->bindParam(':nom', $nomColis);
            $stmtColis->bindParam(':date_dep', $dateDep);
            $stmtColis->bindParam(':date_arr', $dateArr);
            $stmtColis->bindParam(':informations', $infos);
            $stmtColis->bindParam(':problemes', $problemes);
            $stmtColis->bindParam(':lieu_arrivee', $adresseArr);
            $stmtColis->bindParam(':lieu_depart', $adresseDep);
            $stmtColis->bindParam(':plaque', $plaque);
            $stmtColis->execute();

            $colisId = $pdo->lastInsertId();

            $queryMouvement = "
                INSERT INTO mouvement 
                (colis_id, user_id) 
                VALUES 
                (:colis_id, :user_id)
            ";
            $stmtMouvement = $pdo->prepare($queryMouvement);
            $stmtMouvement->bindParam(':colis_id', $colisId);
            $stmtMouvement->bindParam(':user_id', $id_users_coord);
            $stmtMouvement->execute();

            $mouvId = $pdo->lastInsertId();

            $queryLog = "
                INSERT INTO log_trackable 
                (mouv_id, user_id, colis_id, action, datelog) 
                VALUES 
                (:mouv_id, :user_id, :colis_id, :action, NOW())
            ";
            $stmtLog = $pdo->prepare($queryLog);
            $stmtLog->bindParam(':mouv_id', $mouvId);
            $stmtLog->bindParam(':user_id', $id_users_coord);
            $stmtLog->bindParam(':colis_id', $colisId);
            $stmtLog->bindValue(':action', 'Création du mouvement');
            $stmtLog->execute();

            echo "Mouvement créé avec succès.";
        }
    } catch (Exception $e) {
        error_log($e->getMessage() . PHP_EOL, 3, '../../utils/logs/errors.log');
        echo "Erreur interne lors de la création du mouvement.";
    }
}
