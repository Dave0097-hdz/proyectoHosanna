<?php  
$db= new Database();
$con = $db->conectar();

$sqllista= $con->prepare("SELECT * FROM productos WHERE activo=1");
$sqllista-> execute();
$resultadolista = $sqllista->fetchAll(PDO::FETCH_ASSOC);