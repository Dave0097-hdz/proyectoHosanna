<?php
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT v.*, u.id_usuario, u.nombre, u.correo, u.telefono, p.id_producto, p.nombre AS nombre_producto, p.imagen 
FROM ventas AS v
JOIN usuarios AS u ON v.id_usuario = u.id_usuario
JOIN productos AS p ON v.id_producto = p.id_producto
ORDER BY v.fecha_venta DESC");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
