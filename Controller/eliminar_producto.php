<?php 

if (isset($_GET['id']) && isset($_GET['eliminar'])) {
    $id= $_GET['id'];
    $eliminar= $_GET['eliminar'];

    if ($eliminar==0){
        
        $db= new Database();
        $con = $db->conectar();
    
        $sql= $con->prepare("DELETE FROM productos 
        WHERE id_producto = $id");
    
        $sql->execute();
        $resultado = $sql->rowCount();
    
        if ($resultado==1) {
            echo "<div class='alert alert-success alert-
                    dismissible fade show' role='alert'>Producto eliminado correctamente
                </div>";
    
        }else{
            echo '<div class="alert alert-danger">Ocurrio un error</div>';
        }

    }else{
        echo '<div class="alert alert-danger">Para elimiar un producto primero debe estar de baja</div>';
    }
        
}

?>