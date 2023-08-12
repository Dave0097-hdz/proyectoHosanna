<?php
$db= new Database();
$con = $db->conectar();

$sql= $con->prepare("SELECT * FROM usuarios WHERE estado= 1 AND id_cargo<=2");
$sql-> execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

