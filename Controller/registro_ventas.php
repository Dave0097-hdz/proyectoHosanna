<?php

$db = new Database();
$con = $db->conectar();

$nombre= '';
$almacen='';
$id_usuario= $_SESSION["id_usuario"];


if (!empty($_POST["btncodigo"])){
    if (!empty($_POST["codigo"]) and !empty($_POST["cantidad"])) {
        $codigopost= $_POST["codigo"];
        $cantidad= $_POST["cantidad"];

        $resultado= revisa_producto($codigopost, $con);

        if ($resultado!==0) {
    
            foreach ($resultado as $row) {
        
                $foto=$row['imagen'];
                $id_producto= $row['id_producto'];
                $nombre= $row['nombre'];
                $nombre_corto= $row['nombre_corto'];
                $descripcion= $row['descripcion'];
                $tipo_categoria= $row['tipo_categoria'];
                $codigo= $row["codigo"];
                $precio= $row['precio'];
                $estado= $row['activo'];
                $almacen= $row['cantidad'];
                $total=$cantidad*$precio;
                $fecha = date('Y-m-d');
            }

        }else{
            echo "<div class='alert alert-danger'>Hay mas de un producto con el mismo codigo</div>";
        }

    }else{
        echo '<div class="alert alert-danger">El campo codigo y cantidad son necesarios</div>';
    }
}


if (!empty($_POST["btnventa"])){
    if (!empty($_POST["articulo"]) and !empty($_POST["precio"])
     and !empty($_POST["total"]) and !empty($_POST["codigo"]) and !empty($_POST["fecha"]) and !empty($_POST["cantidad"])){

        $codigopost= $_POST["codigo"];
        $cantidad= $_POST["cantidad"];

        $resultado= revisa_producto($codigopost, $con);
        
        if ($resultado!==0){

            foreach ($resultado as $row) {
        
                $almacen= $row['cantidad'];
                $id_producto= $row['id_producto'];

            }

            $nombre=$_POST["articulo"];
            $precio=$_POST["precio"];
            $total=$_POST["total"];
            $fecha=$_POST["fecha"];
            $codigo= $_POST["codigo"];
            $cantidad= $_POST["cantidad"];
            $totalfi= $precio * $cantidad;

            if ($almacen>= $cantidad) {
                
                if ($total==$totalfi) {
                    
                    $sql= $con->prepare("INSERT INTO ventas(id_usuario,id_producto,cantidad,precio,total,fecha_venta) VALUES 
                    ($id_usuario,
                    $id_producto,
                    $cantidad,
                    $precio,
                    $total,
                    '$fecha')");
    
                    $sql->execute();
                    $respuesta = $sql->rowCount();
    
                    if ($respuesta==1){
    
                            echo '<div class="alert alert-info">Vendido correctamente</div>';
                            
                    }else {
    
                        echo '<div class="alert alert-danger">Error al realizar la compra</div>';
                    }
                }else {
                    echo '<div class="alert alert-danger">Error en el precio</div>';
                }

            }else{
                echo '<div class="alert alert-danger">No hay suficientes productos para vender</div>';
            }

        }else{
            echo '<div class="alert alert-danger">El producto no esta ala venta</div>';
        }
            
    }else{
        echo '<div class="alert alert-danger">Todos los campos son requeridos</div>';
    }
}
if (!empty($_POST["btnpedidos"])){
    $id_usuario= $_SESSION['id_usuario'];
    $fecha = date('Y-m-d');

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

    if ($productos != null){
        foreach($productos as $clave => $cantidad) {
    
    
            $sql= $con->prepare("SELECT * FROM productos WHERE id_producto=? AND activo=1");
            $sql-> execute([$clave]);
            $row_prod= $sql->fetch(PDO::FETCH_ASSOC);

            $precio = $row_prod['precio'];
            $almacen = $row_prod['cantidad'];

            $sql_pedido= $con->prepare("INSERT INTO pedidos(id_usuario,id_producto,cantidad,total,fecha_pedido) VALUES (?,?,?,?,?)");
            $sql_pedido-> execute([$id_usuario, $clave, $cantidad, $precio, $fecha]);
        }
    }
    unset($_SESSION['carrito']);

 }