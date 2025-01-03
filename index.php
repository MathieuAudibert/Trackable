<?php
declare(strict_types=1);

session_start();
unset($_SESSION['connecte']);
if (!isset($_SESSION['connecte'])) {
    $_SESSION['connecte'] = 'true';
}   

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/src/accueil/controller.php';
require_once __DIR__ . '/src/detail/controller.php';
require_once __DIR__ . '/src/login/controller.php';
require_once __DIR__ . '/src/register/controller.php';
require_once __DIR__ . '/src/logout/controller.php';


function route_request(): void
{
    $uri = $_SERVER['REQUEST_URI'];

    try {
        switch ($uri) {
            case '/':
                controller_accueil();
                break;
            case '/index.php':
                controller_accueil();
                break;
            case '/login':
                controller_login();
                break;
            case '/register':
                controller_register();
                break;
            case '/detail':
                if ($_SESSION['connecte'] !== 'true') {
                    header('Location: /login');
                    exit();
                }
                controller_detail();
                break;
            case '/logout':
                if ($_SESSION['connecte'] !== 'true') {
                    header('Location: /login'); 
                    exit();
                }
                require('logout.php');
                break;
            default:
                controller_accueil();
                break;
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "Erreur serveur interne";
        error_log(message: "Erreur $uri: " . $e->getMessage(), message_type: 3, destination: '/utils/logs/errors.log');
    }
}

route_request();