<?php 
require_once 'config/DB.php';
require_once 'model/Proyecto.php';
class ProyectoModel {
    private $pdo;

    function __construct() {
        $db = new DB();
        $this->pdo = $db->getConnection();
    }

    function save(Proyecto $proyecto) {
        try {
            $sql = 'INSERT INTO proyecto (titulo,descripcion)
                    VALUES (:titulo,:descripcion)
                    RETURNING *';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':titulo' => $proyecto->getTitulo(),
                ':descripcion' => $proyecto->getDescripcion()
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error al guardar el proyecto: '.$e);
        }
    }

    function getAll() {
        try {
            $sql = 'SELECT id_proyecto, titulo, descripcion
                    FROM proyecto';
            $stmt = $this->pdo->prepare($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error al obtener proyectos: '.$e);
        }
    }

    function update($id, Proyecto $proyecto) {
        try {
            $sql = 'UPDATE proyecto
                    SET titulo = :titulo, descripcion = :descripcion
                    WHERE id_proyecto = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':titulo' => $proyecto->getTitulo(),
                ':descripcion' => $proyecto->getDescripcion(),
                ':id' => $id
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error al actualizar el proyecto: '.$e);
        }
    }

    function delete($id) {
        try {
            $sql = 'DELETE FROM proyecto WHERE id_proyecto = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error al eliminar el proyecto: '.$e);
        }
    }

    function getProyectosByUsuarioId($idUsuario) {
        try {
            $sql = 'SELECT p.id_proyecto, p.titulo, p.descripcion
                    FROM proyecto p
                    JOIN usuario_proyecto up ON p.id_proyecto = up.id_proyecto
                    WHERE up.id_usuario = :id_usuario';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id_usuario' => $idUsuario
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error al obtener los proyectos del usuario: '.$e);
        }
    }
}
?>