<?php 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__, 1) . '/bdd.php';

if (empty($_POST)){
    header('Location: /creation-mouvement');
    exit();
} else {
    //gestion du posts
    $nom_colis = $_POST['nom-colis'];
    $date_dep = $_POST['datedep'];
    $date_arr = $_POST['datearr'];
    $adresse_dep = $_POST['adresse-dep'];
    $adresse_arr = $_POST['adresse-arr'];
    $etape = $_POST['etape'];
    $infos = $_POST['infos'];
    $problemes = $_POST['problemes'];
    $cle_entreprise = $_POST['cle-entreprise'];
    $agentcoord = $_POST['agentcoord-assigne'];
    $agentlivr = $_POST['agentlivr-assigne'];
    $plaque = $_POST['plaque'];
    

    $query = $db->prepare('INSERT INTO colis ( nom, date_dep, date_arr, informations, problemes, lieu_arrivee, lieu_depart, plaque, etape) VALUES (:nom, :date_dep, :date_arr, :informations, :problemes, :lieu_arrivee, :lieu_depart, :plaque, :etape)');
    $query->execute([
        'nom' => $nom_colis,
        'date_dep' => $date_dep,
        'date_arr' => $date_arr,
        'informations' => $infos,
        'problemes' => $problemes,
        'lieu_arrivee' => $adresse_arr,
        'lieu_depart' => $adresse_dep,
        'plaque' => $plaque,
        'etape' => $etape
    ]);
    $id_colis = $db->lastInsertId();
    
    $query2 = $db->prepare('INSERT INTO mouvement (colis_id, user_id) VALUES (:colis_id, :user_id)');
    $query2->execute([
        'colis_id' => $id_colis,
        'user_id' => $agentcoord
    ]);
    $id_mouv_coord = $db->lastInsertId();

    $query3 = $db->prepare('INSERT INTO log_trackable (mouv_id, user_id, colis_id, action, datelog) VALUES (:mouv_id, :user_id, :colis_id, :action, NOW())');
    $query3->execute([
        'mouv_id' => $id_mouv_coord,
        'user_id' => $_SESSION['user']['id_users'],
        'colis_id' => $id_colis,
        'action' => 'Creation d\'un mouvement agent coord'
    ]);

    $query4 = $db->prepare('INSERT INTO mouvement (colis_id, user_id) VALUES (:colis_id, :user_id)');
    $query4->execute([
        'colis_id' => $id_colis,
        'user_id' => $agentlivr
    ]);
    $id_mouv_livr = $db->lastInsertId();

    $query5 = $db->prepare('INSERT INTO log_trackable ( mouv_id, user_id, colis_id, action, datelog) VALUES ( :mouv_id, :user_id, :colis_id, :action, NOW())');
    $query5->execute([
        'mouv_id' => $id_mouv_livr,
        'user_id' => $_SESSION['user']['id_users'],
        'colis_id' => $id_colis,
        'action' => 'Creation d\'un mouvement agent livr'
    ]);

    header('Location: /form_success');
    exit();
}