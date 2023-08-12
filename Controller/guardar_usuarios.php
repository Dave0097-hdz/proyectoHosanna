<?php
$db= new Database();
$con = $db->conectar();
$base_url = "http://localhost/proyectointegrador/";

$nombre="";
$apellido="";
$correo="";
$telefono="";
$direccion="";
$contraseña="";
$confirmar = "";
if (!empty($_POST["btn_guardar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"])
    and !empty($_POST["correo"]) and !empty($_POST["telefono"]) 
    and !empty($_POST["direccion"]) and !empty($_POST["contraseña"])
    and !empty($_POST["confirmar"])){
        
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $correo=$_POST["correo"];
        $telefono=$_POST["telefono"];
        $direccion=$_POST["direccion"];
        $contraseña=$_POST["contraseña"];
        $confirmar = $_POST["confirmar"];

        $vali_correo= validar_correo($correo, $con);

        if ($vali_correo== 1){
        
            if ($contraseña==$confirmar) {
                $db= new Database();
                $con = $db->conectar();

                $sql= $con->prepare("INSERT INTO usuarios(nombre,apellido,correo,telefono,direccion,contraseña,id_cargo) VALUES 
                ('$nombre',
                '$apellido',
                '$correo',
                $telefono,
                '$direccion',
                '$contraseña',
                2)");

                $sql->execute();
                $resultado = $sql->rowCount();

                if ($resultado==1) {
                    echo '<div class="alert alert-success">persona registrada correctamente</div>';
                }else{
                    echo '<div class="alert alert-danger">persona no registrada correctamente</div>';
                }
                
            }else {
                echo '<div class="alert alert-danger">Las contraseñas no coinsidan</div>';
            }
        }else {
            echo "<div class='alert alert-primary'>Ya existe una cuenta con el correo: $correo</div>";
        }

    }else{
        echo '<div class="alert alert-danger">Algunos campos estan vacios</div>';
    }
}
?>