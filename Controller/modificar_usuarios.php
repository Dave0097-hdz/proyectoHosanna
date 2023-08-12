<?php
$db= new Database();
$con = $db->conectar();

if (isset($id)){
    $id=$id;
}else{
    $id= $_SESSION['id_usuario'];
}
$sql= $con->prepare("SELECT * FROM usuarios WHERE id_usuario=$id");
$sql-> execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultado as $row) {
    $nombre= $row['nombre'];
    $apellido= $row['apellido'];
    $correo= $row['correo'];
    $telefono= $row['telefono'];
    $direccion= $row['direccion'];
    $contraseña= $row['contraseña'];
    $confirmar= $contraseña;
}
$base_url = "http://localhost/proyectointegrador/";
if (!empty($_POST["btn_modificar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"])
    and !empty($_POST["correo"]) and !empty($_POST["telefono"]) 
    and !empty($_POST["direccion"]) and !empty($_POST["contraseña"])
    and !empty($_POST["confirmar"])){
        
        if ($nombre==$_POST["nombre"] and $apellido==$_POST["apellido"] 
        and $correo==$_POST["correo"] and $telefono==$_POST["telefono"] 
        and $direccion==$_POST["direccion"] and $contraseña==$_POST["contraseña"] 
        and $confirmar == $_POST["confirmar"]){
            echo '<div class="alert alert-primary">Datos no modificados</div>';
        }else{

        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $correo=$_POST["correo"];
        $telefono=$_POST["telefono"];
        $direccion=$_POST["direccion"];
        $contraseña=$_POST["contraseña"];
        $confirmar = $_POST["confirmar"];

        
        if ($contraseña==$confirmar) {
            $db= new Database();
            $con = $db->conectar();

            $sql= $con->prepare("UPDATE usuarios 
            SET nombre = '$nombre',
            apellido = '$apellido',
            correo = '$correo',
            telefono = '$telefono',
            direccion = '$direccion',
            contraseña = '$contraseña'
            WHERE id_usuario = $id");

            $sql->execute();
            $resultado = $sql->rowCount();

            if ($resultado==1) {
                echo '<div class="alert alert-success">Datos Modificados correctamente</div>';
            }else{
                echo '<div class="alert alert-danger">Error al Modificar los Datos Vuelva a Intentarlo mas Tarde</div>';
            }
            
        }else {
            echo '<div class="alert alert-danger">Las contraseñas no coinsidan</div>';
        }
    }
    }else{
        echo '<div class="alert alert-danger">Algunos campos estan vacios</div>';
    }
}