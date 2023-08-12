<?php
$base_url= "http://localhost/proyectointegrador/";


if(!empty($_POST["btn-validarAdmin"])){
   
    if (empty($_POST["correo"]) && empty($_POST["contraseña"])){
        echo '<div class="alert alert-danger">Los campos estan vacios</div>';
    }elseif(empty($_POST["correo"])){
        echo '<div class="alert alert-danger">Los campos estan vacios</div>';
    }elseif(empty($_POST["contraseña"])){
        echo '<div class="alert alert-danger">Los campos estan vacios</div>';
    }
    
    else{
        $correo=$_POST["correo"];
        $contraseña=$_POST["contraseña"];
        
        $db = new Database();
        $con = $db->conectar();

        $id_cargo= validar_admin($correo, $contraseña, $con);

        $sql= $con->prepare("SELECT * FROM usuarios WHERE correo = '$correo' and contraseña = '$contraseña' and id_cargo= $id_cargo and estado= 1 ");
        $sql->execute();
        $usuario = $sql->rowCount();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $row) {
            $email= $row['correo'];
            $nombre= $row['nombre'];
            $apellido= $row['apellido'];
            $telefono= $row['telefono'];
            $direccion= $row['direccion'];
            $id_usuario= $row['id_usuario'];
        }
        //print("No encontrados $usuario Usuarios.\n");

        if ($usuario==1) {
           // echo '<div class="alert alert-success">si valida</div>';
           if ($id_cargo==1) {

            $_SESSION["nombre"]=$nombre;
            $_SESSION["apellido"]=$apellido;
            $_SESSION["correo"]=$email;
            $_SESSION["id_usuario"]=$id_usuario;
            $_SESSION["direccion"]=$direccion;
            $_SESSION["telefono"]=$telefono;
            $_SESSION["id_cargo"]=$id_cargo;
            header("location:../../Views/admin/inventario/panel_control.php");
           }elseif($id_cargo==2){

            $_SESSION["nombre"]=$nombre;
            $_SESSION["apellido"]=$apellido;
            $_SESSION["correo"]=$email;
            $_SESSION["id_usuario"]=$id_usuario;
            $_SESSION["direccion"]=$direccion;
            $_SESSION["telefono"]=$telefono;
            $_SESSION["id_cargo"]=$id_cargo;
            header("location:../../Views/admin/inventario/panel_control.php");
           }elseif ($id_cargo==3){
            
            $_SESSION["nombre"]=$nombre;
            $_SESSION["apellido"]=$apellido;
            $_SESSION["correo"]=$email;
            $_SESSION["id_usuario"]=$id_usuario;
            $_SESSION["direccion"]=$direccion;
            $_SESSION["telefono"]=$telefono;
            header("location:../../index.php");
           }
           else{
            echo "<div class='alert alert-danger'>Usuario '$correo;' no encontrado</div>";
            }
           
        }else{
            echo "<div class='alert alert-danger'>Usuario '$correo' no existe</div>";
        }
    }
}
?>