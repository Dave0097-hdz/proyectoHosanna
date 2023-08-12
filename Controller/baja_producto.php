<?php 

if (isset($_GET['id']) and isset($_GET['activo'])){
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

            echo "<div class='alert alert-success alert-
                    dismissible fade show' role='alert'>Producto reactivado correctamente
                    <br> <a href='gestor_inventario.php' class='btn btn-small btn-info'><i class='fa-solid fa-user-pen'></i>Ver</a>
                </div>";

            
        }elseif ($activo==0){
            echo "<div class='alert alert-success alert-
                    dismissible fade show' role='alert'>Producto dado de baja correctamente
                    <br> <a href='baja_producto.php' class='btn btn-small btn-info'><i class='fa-solid fa-user-pen'></i>Ver</a>
                </div>";
        }
        
    }else{
        echo '<div class="alert alert-danger">Ocurrio un error</div>';
    }
}
?>