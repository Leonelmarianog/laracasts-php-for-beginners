<?php

$routes = [
    '/' => 'Home',
    '/about' => 'About',
    '/contact' => 'Contact',
];

$routeStates = [
    'active' => 'text-white',
    'inactive' => 'text-pink-200',
];

function isRouteActive($route, $routeStates)
{
    return $_SERVER['REQUEST_URI'] === $route ? $routeStates['active'] : $routeStates['inactive'];
}

?>

<nav class="bg-gray-200 py-6 px-6 space-x-4 bg-pink-600">
    <?php foreach ($routes as $route => $name) : ?>
        <a href="<?= $route ?>" class="font-bold <?= isRouteActive($route, $routeStates) ?>"><?= $name ?></a>
    <?php endforeach ?>
</nav>