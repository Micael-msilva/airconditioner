<?php
require_once 'routers/web.php';

$route = $_GET['route'] ?? 'home';  // rota padrão é home

if (isset($routes[$route])) {
    [$controllerName, $method] = $routes[$route];
    require_once "controllers/{$controllerName}.php";
    $controller = new $controllerName();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->$method($_POST);
    } else {
        $controller->$method();
    }
} else {
    echo "404 - Página não encontrada";
}
