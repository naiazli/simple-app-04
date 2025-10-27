<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1); // or error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Auto-load classes
spl_autoload_register(function ($class) {
    $path = __DIR__ . '/../app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

// Route handling
$controller_name = $_GET['controller'] ?? 'auth';
$action = $_GET['action'] ?? 'login';
$id = $_GET['id'] ?? null;

$controller_class = ucfirst($controller_name) . 'Controller';
$controller_file = __DIR__ . '/../app/controllers/' . $controller_class . '.php';

if (file_exists($controller_file)) {
    require $controller_file;
    $controller = new $controller_class();
    if ($id && method_exists($controller, $action)) {
        $controller->{$action}($id);
    } else if (method_exists($controller, $action)) {
        $controller->{$action}();
    } else {
        header('Location: /');
    }
} else {
    require __DIR__ . '/../app/controllers/AuthController.php';
    $controller = new AuthController();
    $controller->login();
}
