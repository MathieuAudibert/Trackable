<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/bdd.php';

function model_login(): void
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Validation des champs
        if (empty($email) || empty($password)) {
            throw new Exception("Tous les champs doivent être remplis.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse email est invalide.");
        }

        try {
            $db = Database::getConnection();

            // Rechercher l'utilisateur par email
            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                throw new Exception("Aucun compte trouvé pour cet email.");
            }

            // Vérifier le mot de passe
            if (!password_verify($password, $user['password'])) {
                throw new Exception("Le mot de passe est incorrect.");
            }

            // Définir une session utilisateur
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la connexion : " . $e->getMessage());
        }
    }
}
