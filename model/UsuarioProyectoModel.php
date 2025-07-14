<?php 
class UsuarioProyectoModel {
    private $pdo;

    function __construct() {
        $db = new DB();
        $this->pdo = $db->getConnection();
    }

    function save($idUsuario, $idProyecto) {
        try {
            $sql = 'INSERT INTO  usuario_proyecto (id_usuario,id_proyecto)
                    VALUES (:id_usuario,:id_proyecto)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id_usuario' => $idUsuario,
                ':id_proyecto' => $idProyecto
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error al guardar el usuario-proyecto: '.$e);
        }
    }

    function getAll() {
        try {
            $sql = 'SELECT id_usuario, id_proyecto
                    FROM usuario_proyecto';
            $stmt = $this->pdo->prepare($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error al obtener usuarios-proyectos: '.$e);
        }
    }

    function updateProyectoDeUsuario($idUsuario, $idProyecto) {
        try {
            $sql = 'UPDATE usuario_proyecto
                    SET id_proyecto = :id_proyecto
                    WHERE id_usuario = :id_usuario';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id_proyecto' => $idProyecto,
                ':id_usuario' => $idUsuario
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error al actualizar el proyecto del usuario: '.$e);
        }
    }

    function delete($idUsuario, $idProyecto) {
        try {
            $sql = 'DELETE FROM usuario_proyecto 
                    WHERE id_usuario = :id_usuario 
                    AND id_proyecto = :id_proyecto';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id_usuario' => $idUsuario,
                ':id_proyecto' => $idProyecto
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error al eliminar el usuario-proyecto: '.$e);
        }
    }
}
?>