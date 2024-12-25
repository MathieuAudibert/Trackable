<?php 

require_once dirname(__DIR__, 1) . 'bdd.php';

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

    if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas";
        exit();
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = $db->prepare('INSERT INTO users (email, nom, prenom, role_user, mdp) VALUES (:email, :nom, :prenom, :role_user, :mdp)');
    $query->execute([
        'email' => $email,
        'nom' => $nom,
        'prenom' => $prenom,
        'role_user' => $role_user,
        'mdp' => $mdp
    ]);

    header('Location: /login');
    exit();
}