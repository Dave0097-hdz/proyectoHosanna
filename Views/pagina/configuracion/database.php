<?php
const BASE_URL = "http://localhost/proyectointegrador/";
class Database {

    private $hostname = "localhost";
    private $databases = "gestion_hosanna";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";

    function conectar ()
    {
        try{
        $conexion = "mysql:host=" .$this->hostname . "; dbname=" . $this->databases . "; charset=" .$this->charset;
        $options= [
            PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION,
            PDO:: ATTR_EMULATE_PREPARES=> false
        ];

        $pdo = new PDO($conexion, $this->username, $this->password, $options);

        return $pdo;
        } catch(PDOException $e){
            echo'error conexion:' .$e->getMessage();
            exit;
        }

    }

}


?>