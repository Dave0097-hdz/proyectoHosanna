<?php
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT pedidos.*, u.id_usuario, u.nombre, u.correo, u.telefono, p.id_producto, p.nombre AS nombre_producto, p.imagen 
FROM pedidos AS pedidos JOIN usuarios AS u ON pedidos.id_usuario = u.id_usuario JOIN productos AS p ON pedidos.id_producto = pedidos.id_producto 
WHERE u.id_usuario = 3
ORDER BY fecha_pedido DESC");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);