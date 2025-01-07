<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__, 1) . '/bdd.php';

if (empty($_POST)){
    header('Location: /detail?id=' . $_POST['colis_id']);
    exit();
} else {
    $pdo = Database::getConnection();

    $id_mouv = $_POST['id_colis'];
    $probleme = $_POST['probleme'];
    $infos = $_POST['informations'];

    $query = "UPDATE colis SET problemes = :probleme WHERE id_colis = :id_colis";
    $query2 = "UPDATE colis SET informations = :infos WHERE id_colis = :id_colis";
    $query3 = "INSERT INTO log_trackable (mouv_id, user_id, colis_id, action, datelog) VALUES (:mouv_id, :user_id, :colis_id, :action, NOW())";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'probleme' => $probleme,
        'id_colis' => $id_mouv
    ]);

    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute([
        'infos' => $infos,
        'id_colis' => $id_mouv
    ]);

    $stmt3 = $pdo->prepare($query3);
    $stmt3->execute([
        'mouv_id' => $id_mouv,
        'user_id' => $_SESSION['user']['id_users'],
        'colis_id' => $id_mouv,
        'action' => 'Signalement d\'un problème'
    ]);


    header('Location: /login');
}