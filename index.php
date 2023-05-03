<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\MyController;
use App\Controller\AuthController;
use App\Model\MyModel;
use App\View\MyView;

$controller = new MyController();
$authController = new AuthController();
$model = new MyModel();

$router = new AltoRouter();

$router->setBasePath("/super-week");

$router->map('GET', '/', function() {
    echo "Home";
}, 'home');
$router->map('GET', '/users', function() {
    echo "Hello Users";
}, 'user');
$router->map('GET', '/about', function() {
    echo 'About';
}, 'about');
$router->map('GET', '/contact', function() {
    echo 'Contact';
}, 'contact');
// On affiche le formulaire d'inscription
$router->map('GET', '/register[/]?', function() use ($authController) {
    $authController->showRegisterForm();
}, 'register');
// On vérifie les champs du formulaire d'inscription
$router->map('POST', '/register[/]?', function() use ($authController) {
    $authController->register();
}, 'register_post');
// On affiche le formulaire de connexion
$router->map('GET', '/login[/]?', function() use ($authController) {
    $authController->showLoginForm();
}, 'login');
// On vérifie les champs du formulaire de connexion
$router->map('POST', '/login[/]?', function() use ($authController) {
    $authController->login();
}, 'login_post');
// On permet à l'utilisateur de se déconnecter
if (isset($_SESSION['user'])) {
    $router->map('GET', '/logout[/]?', function() use ($authController) {
        $authController->logout();
    }, 'logout');
}

// On affiche les informations selon l'id de l'utilisateur
$router->map('GET', '/user/[i:id]', function($id) use ($authController) {
    $authController->showUser($id);
}, 'user_id');

$match = $router->match();

if( $match && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    http_response_code(404);
    ?>
    <h1 class="text-center font-bold">404 Page Not Found</h1>
    <?php

}
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="src/styles/style.css">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Script JS -->
    <title></title>
</head>
<body>
