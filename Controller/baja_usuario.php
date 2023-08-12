<?php


if (isset($_GET['id']) and isset($_GET['estado'])) {
    $id= $_GET['id'];
    $estado= $_GET['estado'];

    $db= new Database();
    $con = $db->conectar();

    $sql= $con->prepare("UPDATE usuarios 
    SET estado = $estado
    WHERE id_usuario = $id");

    $sql->execute();
    $respuesta = $sql->rowCount();

    if ($respuesta==1) {
        if ($estado==1){
            echo "<div class='alert alert-success alert-
                    dismissible fade show' role='alert'>Usuario reactivado correctamente
                    <br> <a href='usuarios.php' class='btn btn-small btn-info'><i class='fa-solid fa-user-pen'></i>Ver</a>
                </div>";

            
        }elseif ($estado==0){
            echo "<div class='alert alert-success alert-
                    dismissible fade show' role='alert'>Usuario dado de baja correctamente
                    <br> <a href='lista_bajas_usuarios.php' class='btn btn-small btn-info'><i class='fa-solid fa-user-pen'></i>Ver</a>
                </div>";

        }
        
    }else{
        echo '<div class="alert alert-danger">Ocurrio un error</div>';
    }
}
?>