<?php
require_once '../model/UsuarioModel.php';
require_once '../model/Usuario.php';
class UsuarioController {

    function cargar() {
        $model = new UsuarioModel();
        return $model->getAll();
    }

    function registrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['nombre']) ||
                empty($_POST['correo']) ||
                empty($_POST['password'])) {
                    header('Location: ?view=signin&error=empty');
                    exit();
                }

            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setCorreo($_POST['correo']);
            $usuario->setPassword($_POST['password']);
            $usuario->setIdRol(3);

            $model = new UsuarioModel();
            $model->save($usuario);

            header('Location: ?view=login');
            exit();
        } else {
            header('Location: ?view=signin');
            exit();
        }
    }

    function iniciarSesion() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_POST['correo'];
            $password = $_POST['password'];

            if (empty($correo) || empty($password)) {
                header('Location: ?view=login&error=empty');
                exit();
            }

            $model = new UsuarioModel();
            $usuarioExistente = $model->getByEmailPass($correo, $password);

            if ($usuarioExistente) {
                $_SESSION['id_usuario'] = $usuarioExistente['id_usuario'];
                $_SESSION['nombre'] = $usuarioExistente['nombre'];
                $_SESSION['correo'] = $usuarioExistente['correo'];

                $rol = $usuarioExistente['id_rol'];
                switch ($rol) {
                    case 1:
                        $_SESSION['rol'] = 'admin';
                        break;
                    case 2:
                        $_SESSION['rol'] = 'empleado';
                        break;
                    case 3:
                        $_SESSION['rol'] = 'cliente';
                        break;
                }

                header('Location: ?view=home');
                exit();
            } else {
                header('Location: ?view=login&error=noExiste');
                exit();
            }
        } else {
            header('Location: ?view=login');
            exit();
        }
    }

    function cerrarSesion() {
        $_SESSION = [];
        session_destroy();
        header('Location: ?view=home');
        exit();
    }

}

?>