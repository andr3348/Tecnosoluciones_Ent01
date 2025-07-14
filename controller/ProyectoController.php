<?php 
require_once 'model/ProyectoModel.php';
require_once 'model/Proyecto.php';
require_once 'model/UsuarioProyectoModel.php';
class ProyectoController {
    function cargar() {
        $model = new ProyectoModel();
        return $model->getAll();
    }

    function cargarProyectosDeUsuario($idUsuario) {
        $model = new ProyectoModel();
        return $model->getProyectosByUsuarioId($idUsuario);
    }

    function crearProyecto() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['titulo']) || empty($_POST['encargado'])) {
                header('Location: ?view=crear_proyecto&error=empty');
                exit();
            }

            $proyecto = new Proyecto();
            $proyecto->setTitulo($_POST['titulo']);
            $proyecto->setDescripcion($_POST['descripcion']);

            $proyectoModel = new ProyectoModel();
            $nuevoProyecto = $proyectoModel->save($proyecto);

            if (!$nuevoProyecto || !isset($nuevoProyecto['id_proyecto'])) {
                throw new Exception('Error al crear el proyecto. (CONTROLLER)');
            }

            $usuarioProyectoModel = new UsuarioProyectoModel();
            $usuarioProyectoModel->save($_SESSION['id_usuario'], $nuevoProyecto['id_proyecto']);

            header('Location: ?view=crear_proyecto&status=success');
            exit();
        } else {
            header('Location: ?view=crear_proyecto');
            exit();
        }
    }
}
?>