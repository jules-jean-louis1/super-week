<?php
require_once __DIR__ . '/vendor/autoload.php';

$router = new AltoRouter();

$router->setBasePath("/super-week");

$router->map('GET', '/', function() {
    echo "Home";
}, 'home');
$router->map('GET', '/users/[i:id]', function($id) {
    echo "Hello utilisateurs $id";
}, 'user');
$router->map('GET', '/about', function() {
    echo 'About';
}, 'about');
$router->map('GET', '/contact', function() {
    echo 'Contact';
}, 'contact');

$match = $router->match();

if( $match && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    http_response_code(404);
    echo "404 Page Not Found";
}
