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
    
    $id_mouv = $_POST['id_mouv'];
    $id_colis = $_POST['id_colis'];

    $query = "DELETE FROM log_trackable WHERE mouv_id = :id_mouv AND colis_id = :id_colis";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'id_mouv' => $id_mouv,
        'id_colis' => $id_colis
    ]);

    $query3 = "DELETE FROM colis WHERE id_colis = :id_colis"; 
    $stmt3 = $pdo->prepare($query3);
    $stmt3->execute(['id_colis' => $id_colis]);

    header('Location: /');
}
