<?php

$route = $_SERVER['REQUEST_URI'];

$routes = [
    '/' => 'controllers/home.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

if (array_key_exists($route, $routes)) {
    require_once($routes[$route]);
} else {
    abort(404);
}

function abort($code)
{
    http_response_code($code);
    require_once("views/{$code}.view.php");
    die();
}