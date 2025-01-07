<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__, 1) . '/bdd.php';

if (empty($_POST)){
    header('Location: /register');
    exit();
} else {
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $role = $_POST['role_user'];
    $password = $_POST['mdp'];
    $confirm_password = $_POST['confirm_password'];
    $cle_entreprise = $_POST['cle_entreprise'];

    /*if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas";
        exit();
    }*/

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = $db->prepare('INSERT INTO users (email, nom, prenom, role_user, mdp, cle_entreprise) VALUES (:email, :nom, :prenom, :role_user, :mdp, :cle_entreprise)');
    $query->execute([
        'email' => $email,
        'nom' => $nom,
        'prenom' => $prenom,
        'role_user' => $role,
        'mdp' => $password,
        'cle_entreprise' => $cle_entreprise
    ]);
    
    $query2 = $db->prepare('INSERT INTO log_trackable (user_id, action, datelog) VALUES (:user_id, :action, NOW())');
    $query2->execute([
        'user_id' => $id_users,
        'action' => 'Inscription'
    ]);
    header('Location: /login');
    exit();
}