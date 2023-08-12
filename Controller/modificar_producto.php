<?php
$base="../../../";
$db= new Database();
$con = $db->conectar();

$sql= $con->prepare("SELECT * FROM productos WHERE id_producto=$id");
$sql-> execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultado as $row) {
    $nombre= $row['nombre'];
    $nombre_corto= $row['nombre_corto'];
    $descripcion= $row['descripcion'];
    $tipo_categoria= $row['tipo_categoria'];
    $cantidad= $row['cantidad'];
    $imagen= $row['imagen'];
    $precio= $row['precio'];
    $codigo= $row['codigo'];
}

$base_url = "http://localhost/proyectointegrador/";
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["nombre_corto"])
    and !empty($_POST["codigo"]) and !empty($_POST["categoria"])
    and !empty($_POST["precio"]) and !empty($_POST["descripcion"])
    and !empty($_POST["cantidad"])){
        
        $nombre=$_POST["nombre"];
        $nombre_corto=$_POST["nombre_corto"];
        $codigo=$_POST["codigo"];
        $categoria=$_POST["categoria"];
        $precio=$_POST["precio"];
        $descripcion=$_POST["descripcion"];
        $cantidad=$_POST["cantidad"];



        if (!empty($_FILES["foto"])){
            $file=$_FILES["foto"];
            $nombre_img=rand(1,100).$file["name"];
            $tipo=$file["type"];
            $ruta_defecto=$file["tmp_name"];
            $tamaño=$file["size"];
            $dimensiones=getimagesize($ruta_defecto);
            $width=$dimensiones[0];
            $height=$dimensiones[1];

            if ($categoria==1){
                $caperta= "Assets/img_categorias/p_musicales/";
            }elseif ($categoria==2) {
                $caperta= "Assets/img_categorias/mochilas/";
            }elseif ($categoria==3) {
                $caperta= "Assets/img_categorias/gorras/";
            }elseif ($categoria==4) {
                $caperta= "Assets/img_categorias/cinturones/";
            }elseif ($categoria==5) {
                $caperta= "Assets/img_categorias/bolsas/";
            }elseif ($categoria==6) {
                $caperta= "Assets/img_categorias/p_electronicos/";
            }
            
            $src= $base.$caperta.$nombre_img;
            move_uploaded_file($ruta_defecto, $src);
            $imagen=$caperta.$nombre_img;

        }else{
            $imagen = '';
        }

        $db= new Database();
        $con = $db->conectar();

        $sql= $con->prepare("UPDATE productos 
        SET nombre = '$nombre',
        nombre_corto = '$nombre_corto',
        descripcion = '$descripcion',
        tipo_categoria = $tipo_categoria,
        cantidad = $cantidad,
        imagen = '$imagen',
        precio = $precio,
        codigo = $codigo
        WHERE id_producto = $id");

        $sql->execute();
        $resultado = $sql->rowCount();

        if ($resultado==1) {
                echo '<div class="alert alert-success">Datos Modificados correctamente</div>';

        }else{
            echo '<div class="alert alert-danger">Error al Modificar los Datos</div>';
        }

    }else{
        echo '<div class="alert alert-danger">Algunos campos estan vacios</div>';
    }
}