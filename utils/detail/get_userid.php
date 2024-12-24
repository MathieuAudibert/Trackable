<?php 

require_once __DIR__ . '/bdd.php';

function get_user_id(string $email): int
{
    $db = Database::getConnection();
    $stmt = $db->prepare("SELECT id_users FROM trackable.users WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['id_users'];
}
?>