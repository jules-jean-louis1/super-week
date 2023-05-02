<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\MyController;
use App\Model\MyModel;
use App\View\MyView;

$controller = new MyController();
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
$router->map('GET', '/register[/]?', function() {
    require_once __DIR__ . '/src/View/register.php';
}, 'register');
$router->map('POST', '/register[/]?', function() use ($controller) {
    $email = $_POST['Email'];
    $fName = $_POST['Fname'];
    $lName = $_POST['Lname'];
    $password = $_POST['Password'];
    $confirmPassword = $_POST['ConfirmPassword'];
    $controller->AuthContoller($email, $fName, $lName, $password, $confirmPassword);
}, 'register');

$match = $router->match();

if( $match && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    http_response_code(404);
    echo "404 Page Not Found";
}

