<?php
require_once 'config/DB.php';
require_once 'model/Usuario.php';
class UsuarioModel {
    private $pdo;

    function __construct() {
        $db = new DB();
        $this->pdo = $db->getConnection();
    }

    function save(Usuario $usuario) {
        try {
            $sql = 'INSERT INTO usuario (nombre,correo,passw,id_rol)
                    VALUES (:nom,:correo,:passw,:id_rol)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $usuario->getNombre(),
                ':correo' => $usuario->getCorreo(),
                ':passw' => $usuario->getPassword(),
                ':id_rol' => $usuario->getIdRol()
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error al guardar el usuario: '.$e);
        }
    }

    function getAll() {
        try {
            $sql = 'SELECT id_usuario,nombre,correo,passw,id_rol FROM usuario';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error al obtener usuarios: '.$e);
        }
    }

    function update($id, Usuario $usuario) {
        try {
            $sql = 'UPDATE usuario 
                    SET nombre = :nom, correo = :correo, passw = :passw, id_rol = :id_rol
                    WHERE id_usuario = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $usuario->getNombre(),
                ':correo' => $usuario->getCorreo(),
                ':passw' => $usuario->getPassword(),
                ':id_rol' => $usuario->getIdRol(),
                ':id' => $id
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error al actualizar el usuario: '.$e);
        }
    }

    function delete($id) {
        try {
            $sql = 'DELETE FROM usuario WHERE id_usuario = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error al eliminar el usuario: '.$e);
        }
    }

    function getByEmailPass($correo, $password) {
        try {
            $sql = 'SELECT id_usuario,nombre,correo,id_rol
                    FROM usuario WHERE correo = :correo AND passw = :passw';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':correo' => $correo,
                ':passw' => $password
            ]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($usuario) return $usuario;
            return null;
        } catch (PDOException $e) {
            throw new Exception('Error al obtener el usuario por correo y contraseña: '.$e);
        }
    }

    function getEmpleados() {
        try {
            $sql = 'SELECT id_usuario,nombre,correo,id_rol 
                    FROM usuario WHERE id_rol = 2';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error al obtener usuarios que sean empleados: '.$e);
        }
    }
}
?>