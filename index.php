<?php 
session_start();
require_once 'controller/UsuarioController.php';

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