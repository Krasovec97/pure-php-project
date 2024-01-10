<?php

$request = $_SERVER['REQUEST_URI'];
$viewsDir = '/views';

switch ($request) {
    case '/':
        require __DIR__ . $viewsDir . '/home.php';
        break;

    case '/form':
        require __DIR__ . $viewsDir . '/form.php';
        break;
}