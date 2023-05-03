<?php
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
    echo "Hello User";
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

$match = $router->match();

if( $match && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    http_response_code(404);
    echo "404 Page Not Found";
}

