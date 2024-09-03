<?php

$route = $_SERVER['REQUEST_URI'];

if ($route === '/') {
    require_once('controllers/home.php');
} elseif ($route === '/about') {
    require_once('controllers/about.php');
} elseif ($route === '/contact') {
    require_once('controllers/contact.php');
}
