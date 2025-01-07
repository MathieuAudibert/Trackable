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

    $id_colis = $_POST['id_colis'];
    $id_mouv = $_POST['id_mouv'];
    $id_users = $_POST['id_users'];
    
    $nom_colis = $_POST['nom_colis'];
    $livreur = $_POST['livreur'];
    $coordination = $_POST['coordination'];
    $infos = $_POST['infos'];
    $problemes = $_POST['problemes'];
    $adresse_depart = $_POST['adresse_depart'];
    $etape = $_POST['etape'];
    $adresse_arrivee = $_POST['adresse_arrivee'];
    $date_dep = $_POST['date_dep'];
    $date_arr = $_POST['date_arr'];
    $plaque = $_POST['plaque'];


    $query = "UPDATE colis SET nom = :nom_colis, informations = :infos, problemes = :problemes, lieu_depart = :adresse_depart, etape = :etape, lieu_arrivee = :adresse_arrivee, date_dep = :date_dep, date_arr = :date_arr, plaque = :plaque WHERE id_colis = :id_colis";
    $query3 = "INSERT INTO log_trackable (mouv_id, user_id, colis_id, action, datelog) VALUES (:mouv_id, :user_id, :colis_id, :action, NOW())";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':nom_colis' => $nom_colis, 
        ':infos' => $infos,
        ':problemes' => $problemes,
        ':adresse_depart' => $adresse_depart,
        ':etape' => $etape,
        ':adresse_arrivee' => $adresse_arrivee,
        ':date_dep' => $date_dep,
        ':date_arr' => $date_arr,
        ':plaque' => $plaque,
        ':id_colis' => $id_colis
    ]);

    $stmt3 = $pdo->prepare($query3);
    $stmt3->execute([
        'mouv_id' => $id_mouv,
        'user_id' => $id_users,
        'colis_id' => $id_colis,
        'action' => 'Update d\'un mouvement'
    ]); 


    header('Location: /detail?id=' . $id_colis);
}