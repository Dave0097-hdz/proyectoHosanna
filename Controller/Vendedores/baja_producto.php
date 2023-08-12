<?php 
include '../../Config/conexion.php';


if (isset($_GET['id']) and isset($_GET['activo'])) {
    $id= $_GET['id'];
    $activo= $_GET['activo'];

    $db= new Database();
    $con = $db->conectar();

    $sql= $con->prepare("UPDATE productos 
    SET activo = $activo
    WHERE id_producto = $id");

    $sql->execute();
    $resultado = $sql->rowCount();

    if ($resultado==1) {
        if ($activo==1){
            header("Location: ../../Views/vendedores/inventario/panel_control.php");

            
        }elseif ($activo==0){
            header("Location: ../../Views/vendedores/inventario/baja_producto.php");
        }
        
    }else{
        echo "ERROR AL MODIFICAR EL PRODUCTO";
    }
}
?>