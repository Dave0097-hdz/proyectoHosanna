<?php 
include '../../Config/conexion.php';


if (isset($_GET['id'])) {
    $id= $_GET['id'];


    $db= new Database();
    $con = $db->conectar();

    $sql= $con->prepare("DELETE FROM productos 
    WHERE id_producto = $id");

    $sql->execute();
    $resultado = $sql->rowCount();

    if ($resultado==1) {
        echo '<div class="alert alert-success">Datos Eliminados correctamente</div>';
        header("Location: ../../Views/vendedores/inventario/gestor_inventario.php");

    }else{
        echo '<div class="alert alert-success">Error al eliminar</div>';
    }
        
}else{
        echo '<div class="alert alert-danger">Ocurrio un error</div>';
}

?>