<?php
const BASE_URL = "http://localhost/proyectointegrador/";
session_start();

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
function validar_admin($correo, $contraseña, $con){

    $sql= $con->prepare("SELECT * FROM usuarios WHERE correo= '$correo' AND contraseña= '$contraseña' ");
    $sql-> execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $row) {
    $id_cargo= $row['id_cargo'];
    return $id_cargo;
}
    return 0;
}

function revisa_producto($codigo, $con){

    $sql= $con->prepare("SELECT * FROM productos WHERE codigo= $codigo AND activo= 1");
    $sql-> execute();

    $respuesta = $sql->rowCount();
    if ($respuesta==1) {
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $resultado = 0;
    }
    
    return $resultado;
}
function validar_correo($correo, $con){

    $sql= $con->prepare("SELECT * FROM usuarios WHERE correo= '$correo' ");
    $sql-> execute();

    $respuesta = $sql->rowCount();
    if ($respuesta==0) {
        $resultado = 1;
    } else {
        $resultado = 0;
    }
    
    return $resultado;
}
