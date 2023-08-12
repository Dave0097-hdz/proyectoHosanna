<?php

$db = new Database();
$con = $db->conectar();

$nombre= '';
$fecha = date('Y-m-d');
$almacen=0;
$id_usuario= $_SESSION["id_usuario"];


if (!empty($_POST["btncodigo"])){
    if (!empty($_POST["codigo"]) and !empty($_POST["cantidad"])) {
        $codigo= $_POST["codigo"];
        $cantidad= $_POST["cantidad"];

        $sql= $con->prepare("SELECT * FROM productos WHERE codigo= $codigo AND activo= 1");
        $sql-> execute();

        $sql->execute();
        $respuesta = $sql->rowCount();

        if ($respuesta==1) {
            
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($resultado as $row) {
    
            $foto=$row['imagen'];
          
            $id= $row['id_producto'];
            $nombre= $row['nombre'];
            $nombre_corto= $row['nombre_corto'];
            $descripcion= $row['descripcion'];
            $tipo_categoria= $row['tipo_categoria'];
            $codigo= $row["codigo"];
            $precio= $row['precio'];
            $estado= $row['activo'];
            $almacen= $row['cantidad'];
            $total=$cantidad*$precio;
        }

        }else{
            echo '<div class="alert alert-danger">El producto no esta ala venta</div>';
        }

    }else{
        echo '<div class="alert alert-danger">El campo codigo y cantidad son necesarios</div>';
    }
}


if (!empty($_POST["btnventa"])){
    if (!empty($_POST["articulo"]) and !empty($_POST["precio"])
     and !empty($_POST["total"]) and !empty($_POST["codigo"]) and !empty($_POST["fecha"]) and !empty($_POST["cantidad"])){

        $codigo= $_POST["codigo"];
        $cantidad= $_POST["cantidad"];

        $sql= $con->prepare("SELECT * FROM productos WHERE codigo= $codigo AND activo= 1");
        $sql-> execute();

        $sql->execute();
        $respuesta = $sql->rowCount();

        if ($respuesta==1) {
            
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($resultado as $row) {
    
            $foto=$row['imagen'];
          
            $id= $row['id_producto'];
            $nombre= $row['nombre'];
            $nombre_corto= $row['nombre_corto'];
            $descripcion= $row['descripcion'];
            $tipo_categoria= $row['tipo_categoria'];
            $codigo= $row["codigo"];
            $precio= $row['precio'];
            $estado= $row['activo'];
            $almacen= $row['cantidad'];
            $total=$cantidad*$precio;
        }

        }else{
            echo '<div class="alert alert-danger">El producto no esta a la venta</div>';
        }

        $nombre=$_POST["articulo"];
        $precio=$_POST["precio"];
        $total=$_POST["total"];
        $fecha=$_POST["fecha"];
        $codigo= $_POST["codigo"];
        $cantidad= $_POST["cantidad"];
        $totalfi= $precio * $cantidad;


        if ($cantidad> $almacen) {
            echo '<div class="alert alert-danger">No hay suficientes productos para vender</div>';
        }else{

            $sql= $con->prepare("INSERT INTO ventas(id_usuario,id_producto,cantidad,precio,total,fecha_venta) VALUES 
            ($id_usuario,
            $id,
            $cantidad,
            $precio,
            $total,
            '$fecha')");

            $sql->execute();
            $respuesta = $sql->rowCount();

            if ($respuesta==1){
                echo '<div class="alert alert-info">Vendido correcta mente</div>';
            }else {
                echo '<div class="alert alert-danger">Error al realizar la compra</div>';
            }
        }
        
    }else{
        echo '<div class="alert alert-danger">Todos los campos son requeridos</div>';
    }
}