<?php
$db= new Database();
$con = $db->conectar();

$sql= $con->prepare("SELECT * FROM productos WHERE activo= 0");
$sql-> execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);