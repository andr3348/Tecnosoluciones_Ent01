<?php 
class DB {
    private $url='pgsql: host=localhost; port=5432; dbname=tecnosoluciones';
    private $user='postgres';
    private $password='123';

    function getConnection() {
        try {
            $cn = new PDO($this->url, $this->user, $this->password);
            return $cn;
        } catch (PDOException $e) {
            throw new Exception('No se puedo conectar a la base de datos:'.$e);
        }
    }
}

?>