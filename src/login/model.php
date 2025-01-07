<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/bdd.php';

function model_login(): bool
{
    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $mdp = $_POST['mdp'] ?? '';
            $cle_entreprise = $_POST['cle_entreprise'] ?? '';
            
            $pdo = Database::getConnection(); 

            $query = 'SELECT * FROM users WHERE email = :email AND cle_entreprise = :cle_entreprise';
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cle_entreprise', $cle_entreprise);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);


            if ($user && (password_verify($mdp, $user['mdp']))) { // a modifier par password_verify($mdp, $user['mdp']) 
                session_start();
                $_SESSION['user']['email'] = $user['email'];
                $_SESSION['user']['cle_entreprise'] = $user['cle_entreprise'];
                $_SESSION['user']['nom'] = $user['nom'];
                $_SESSION['user']['prenom'] = $user['prenom'];
                $_SESSION['user']['role_user'] = $user['role_user'];
                $_SESSION['user']['id_users'] = $user['id_users'];
                $_SESSION['connecte'] = 'true';
                header('Location: /index.php'); 
                exit;
            } else {
                return false;
            }
        }
        return true;
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '../../utils/logs/errors.log');
        return false;
    }
}
?>
