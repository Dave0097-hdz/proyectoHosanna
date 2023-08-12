<?php 

if (isset($_GET['id']) && isset($_GET['eliminar'])) {
    $id= $_GET['id'];
    $eliminar= $_GET['eliminar'];

    if ($eliminar== 0){

        $db= new Database();
        $con = $db->conectar();
    
        $sql= $con->prepare("DELETE FROM usuarios 
        WHERE id_usuario = $id");
    
        $sql->execute();
        $resultado = $sql->rowCount();
    
        if ($resultado==1) {
            echo '<div class="alert alert-success">Datos Eliminados correctamente</div>';
    
        }else{
            echo '<div class="alert alert-success">Error al eliminar el usuario</div>';

        }
    }else {
        echo '<div class="alert alert-danger">Para elimiar a un usuario primero debe estar de baja</div>';
        
    }
        
}

?>