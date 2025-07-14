<?php 
session_start();
require_once 'controller/UsuarioController.php';
require_once 'controller/ProyectoController.php';

$view = $_GET['view'] ?? 'home';

switch ($view) {
    case 'home' :
        include_once 'view/home.php';
        break;
    case 'login' :
        include_once 'view/login.php';
        break;
    case 'signin' :
        include_once 'view/signin.php';
        break;
    case 'dashboard' :
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: ?view=login');
            exit();
        }
        include_once 'view/dashboard.php';
        break;
    case 'crear_proyecto' :
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: ?view=login');
            exit();
        }
        include_once 'view/crear_proyecto.php';
        break;;
}

$action = $_GET['action'] ?? null;

switch ($action) {
    case 'login' :
        $controller = new UsuarioController();
        $controller->iniciarSesion();
        break;
    case 'signin' :
        $controller = new UsuarioController();
        $controller->registrar();
        break;
    case 'logout' :
        $controller = new UsuarioController();
        $controller->cerrarSesion();
        break;
}
?>