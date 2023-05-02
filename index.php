<?php
require __DIR__ . '/vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/super-week');

$router->map('GET', '/', function() {
    echo 'Hello World';
});
$router->map('GET', '/hello/[a:name]', function($name) {
    echo 'Hello ' . $name;
});

$match = $router->match();

if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
}
