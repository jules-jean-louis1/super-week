<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\AuthController;
use App\Controller\UserController;
use App\Controller\BookController;
use App\Controller\HomeController;
use App\Model\MyModel;

$authController = new AuthController();
$userController = new UserController();
$bookController = new BookController();
$homeController = new HomeController();
$model = new MyModel();
$router = new AltoRouter();
$router->setBasePath("/super-week");

$router->map('GET', '/', function () use ($homeController) {
    $homeController->displayHead('Homepage');
    $homeController->displayHeader();
    $homeController->displayHomeBody();
    $homeController->displayFooter();
}, 'home');

$router->map('GET', '/users[/]', function () use ($userController) {
    $userController->displayPage();
}, 'users');
// Afficher tous les utilisateurs
$router->map('GET', '/users/all[/]', function () use ($userController) {
    $userController->getAllUsers();
}, 'users_all');
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
$router->map('GET', '/logout[/]?', function() use ($authController) {
    $authController->logout();
}, 'logout');
// On affiche le formulaire d'ajout d'utilisateur
$router->map('GET', '/user[/]?', function() use ($userController) {
    $userController->showUserPage();
}, 'user');
// On affiche les informations selon l'id de l'utilisateur
$router->map('GET', '/user/[i:id]', function($id) use ($userController) {
    $userController->getInfoById($id);
}, 'user_id');
// On affiche le formulaire d'ajout de livre
$router->map('GET', '/books/write[/]?', function() use ($bookController) {
    $bookController->showWriteForm();
}, 'write');
$router->map('POST', '/books/write[/]?', function() use ($bookController) {
    $bookController->addBook();
}, 'write_post');
// On affiche tous les livres
$router->map('GET', '/books[/]?', function() use ($bookController) {
    $bookController->displayBooks();
}, 'books');
$router->map('GET', '/books/all[/]?', function () use ($bookController) {
    $bookController->findAll();
}, 'books_all');
// On affiche les informations selon l'id du livre
$router->map('GET', '/book[/]?', function() use ($bookController) {
    $bookController->showBookPage();
}, 'book');
$router->map('GET', '/book/[i:id]', function($id) use ($bookController) {
    $bookController->getInfoById($id);
}, 'book_id');




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
