<?php

require_once './controllers/ventasControllers.php';

// Definimos la URL base del proyecto
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// Acción por defecto
$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Dividimos la acción por "/"
$params = explode('/', $action);

// Enrutamiento básico basado en la acción
switch ($params[0]) {
    case "home":
        $ventasControllers = new ventasControllers();
        $ventasControllers->showVentas();
        break;
    default:
        echo "Página no encontrada";
        break;
}
?>
